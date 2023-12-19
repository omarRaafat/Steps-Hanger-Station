<?php

namespace App\Http\Controllers;

use App\Billing\HyperPayBilling;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\Loyality;
use App\Models\Menu_Meal;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use App\Models\Vat;
use Carbon\Carbon;
use Devinweb\LaravelHyperpay\Facades\LaravelHyperpay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageFactoryInterface;

class CartController extends Controller
{



    public function cartCalculation(){
        if (Auth::guard('web')->check()){
            $cartItems = Cart::where(["user_id"=>Auth::guard('web')->user()->id ,"status" => 0])->latest()->get();
        }


        else{
            $cartItems = Cart::where(["IP_ADDRESS"=>\Request::ip() , 'status' => 0])->latest()->get();
        }


          $checkout_total_price=0;
        foreach ($cartItems as $cartItem){

            $cartItem->meal_image = $cartItem->meal->meal_image;
            $cartItem->meal_name = $cartItem->meal->mealName();
            $checkout_total_price += $cartItem->total_price;
        }
        return   [
            "cartItems" =>$cartItems,
            "checkout_total_price" =>$checkout_total_price
        ];
    }


    public function cart()
    {

        Session::forget("total_before_vat");
        Session::forget("total_after_vat");
        Session::forget("vat");
        $returnedItems =  $this->cartCalculation();
//          Cart::where([["IP_ADDRESS" , '!=' , '' ],[ "user_id" , '!=' , '']])->count();
        return view('cart')->with(["cartItems" => $returnedItems['cartItems'],'checkout_total_price'=>$returnedItems['checkout_total_price'] , 'vat' =>Vat::select('value')->first() , "settings" => Setting::first()]);
    }

    public function mealDelete($cart_row_id){
        if(Cart::find($cart_row_id)->delete()){
            $returnedItems = $this->cartCalculation();
            return response()->json($returnedItems);
        }else{
            return response()->json("error occured");
        }
    }




    public function checkout(Request  $request ,$notes = null){

        $returnedItems = $this->cartCalculation();

        if ($request->isMethod("POST")){

            $cart_ids = [];
            foreach ($returnedItems['cartItems'] as $cartItem){
              array_push($cart_ids , $cartItem->id);
            }

            if(Auth::guest()){
                $random_code = rand(1000,9999);

                $phone= (int)("966".$request->phone);
//return $request->password;
                if ( $user = User::where("phone" ,'like' ,"+966".$request->phone)->first()) {

                        if (Auth::attempt(["phone" => "+966".$request->phone, "password" => $request->password])){
                            Auth::logout();
                            if ($user->status != 1){

                                try {

                                    \Unifonic::send($phone, " أدخل رمز التحقق التالى  : " ."'$random_code'",  $senderID = "Steps-sa");
                                }catch (\Exception $ex){}
                                return response()->json( ["message" =>__('menu.PLEASE ACTIVATE YOUR ACCOUNT TO PROCEED YOUR ORDER'),
                                    "status" => 3,
                                    "code" =>$random_code
                                ]);
                            }
                        } else
                            return response()->json([
                                "message" =>__('menu.PHONE IS REGISTERED BEFORE BUT WRONG PASSORD , RE-ENTER PASSWORD AGAIN'),
                                "status" => 2
                            ]);


                    } else{
                    $user = User::create([
                        "phone" => "+966".$request->phone,
                        "password" => Hash::make($request->password)
                    ]);
                    try {

                        \Unifonic::send($phone, " أدخل رمز التحقق التالى  : " ."'$random_code'",  $senderID = "Steps-sa");
                    }catch (\Exception $ex){}
                    return response()->json( ["message" =>__('menu.PLEASE ACTIVATE YOUR ACCOUNT TO PROCEED YOUR ORDER'),
                        "status" => 3,
                        "code" =>$random_code
                    ]);
                }
            }
            else{

                $user = Auth::guard('web')->user();
            }
//             Cart::where('IP_ADDRESS' ,\Request::ip())->update(['user_id' => $user->id]);


            Session::put('user' , $user);
            Session::put('type' , $request->type);
            Session::put('payment_method' , $request->payment_method);
            Session::put('time' , $request->time);


            return response()->json(["message"=>"/checkout/payment/".$user->id,
                 "status" => 1
                ]);

        }else{
            Session::forget("total_before_vat");
            Session::forget("total_after_vat");
            Session::forget("vat");
            return view("checkout")->with(["checkout_total_price" =>  $returnedItems['checkout_total_price'], 'vat' =>Vat::select('value')->first(),"settings" =>Setting::first()]);
        }


    }





    public function checkoutView(Request $request){
        Session::put('notes' , $request->notes);

    }


    public function verify(Request $request){
        $digit_1 = $request->code_1;
        $digit_2 = $request->code_2;
        $digit_3 = $request->code_3;
        $digit_4 = $request->code_4;
        $codeRequest = $digit_1 . $digit_2 . $digit_3 . $digit_4;
//        return $codeRequest . "|" . $request->generated_code;
        if ($codeRequest == $request->generated_code){
            $returnedItems = $this->cartCalculation();
            $cart_ids = [];
            foreach ($returnedItems['cartItems'] as $cartItem){
                array_push($cart_ids , $cartItem->id);
            }
            $user = User::where("phone" ,'like' , "+966".$request->phone)->first();
            $user->update(['status'=>1]);
//            return $user_id;




            return response()->json([
                "status" => 1,
                "message" => "success verified !",

            ]);
        }
        else{
            return response()->json([
                "status" => 0,
                "message" => "invalid verification code !"
            ]);
        }
    }



     public function couponsForUser($coupon_code){
         $coupon = Coupon::where('coupon_code' , '=' , $coupon_code)->where('coupon_validity' , '=' , 1)->first();
         if(Auth::guard("web")->check()){
            $user_id = auth()->user()->id;
         }
         $users = (array)@json_decode($coupon->users);

         if(empty($coupon)){
             return 0;
         }elseif(Coupon::where('coupon_code' , '=' , $coupon_code)->whereNotIn('fromDate' , [Carbon::today()->toDateString()])->whereNotIn('toDate', [Carbon::today()->toDateString()])->first()){
             return 3;
         }elseif(in_array($user_id, $users)){
             return 2;
         }else{
             $users[] = $user_id;
             $coupon->users = @json_encode($users);
             $coupon->save();

             return $coupon;
         }
     }

     public function couponCheck(Request $request){
         Session::forget("total_before_vat");
         Session::forget("total_after_vat");
         Session::forget("vat");
        $total = null;
        $vat = Vat::value('value');
        if ($request->coupon != ''){
            if ($coupon = Coupon::where(["coupon_code" => $request->coupon , "coupon_validity" => 1])->first()){

                $message = "COUPON ACTIVATED !";
                $value = 1;
                $total_before_vat = $request->total_before_vat - ($request->total_before_vat * $coupon->coupon_discount / 100);
                $vat_value = ($total_before_vat * $vat/100);
                $total_after_vat =$total_before_vat + $vat_value;
                Session::put("total_before_vat" , $total_before_vat);
                Session::put("vat" , $vat_value);
                Session::put("total_after_vat" , $total_after_vat);
            }
            else{


                $message = "WRONG COUPON VALUE OR EXPIRED !";
                $value = 0;
            }

                return response()->json([
                    "message" => $message,
                    "value" => $value,
                    "total_before_vat" => $total_before_vat,
                    "vat"   => $vat_value,
                    "total_after_vat" => $total_after_vat
                ]);
        }else{
            return response()->json([
                "message" => "enter coupon first !",
                "value" => $request->coupon
            ]);
        }

     }

}
