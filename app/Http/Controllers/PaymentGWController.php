<?php

namespace App\Http\Controllers;

use App\Billing\HyperPayBilling;
use App\Models\Bank;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\Loyality;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use App\Models\Vat;
use Carbon\Carbon;
use Devinweb\LaravelHyperpay\Facades\LaravelHyperpay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
$cartController = new CartController;
class PaymentGWController extends Controller
{


    public function paymentCheckOut($user_id , Request $request){

        $returnedItems = App::call('\App\Http\controllers\CartController@cartCalculation');
        $vat = Vat::value('value');
        $items = [];
//        return $returnedItems['cartItems'];
        foreach ($returnedItems['cartItems'] as $item){
           array_push($items ,[
               "product_id" =>  $item['meal_id'],
               "quantity" =>  $item['quantity']
           ]);
        }


        $vat_value = (float)$returnedItems['checkout_total_price'] * $vat/100;
//return $vat_value;
        $checkout_total_price_after_vat =  (float)$returnedItems['checkout_total_price'] + $vat_value;
//return $returnedItems['checkout_total_price'];
        if (!Session::has("total_before_vat") && !Session::has("vat") && !Session::has("total_after_vat") ){
            Session::put("total_before_vat" , $returnedItems['checkout_total_price']);
            Session::put("vat" , $vat_value);
            Session::put("total_after_vat" , $checkout_total_price_after_vat);
        }

        $user =User::find($user_id);

        $amount = $checkout_total_price_after_vat;

        $brand = Session::get('payment_method'); // MASTER OR MADA
        $id = Str::random('34');
//return $amount;
        $response =  LaravelHyperpay::addMerchantTransactionId($id)->addBilling(new HyperPayBilling())->checkout($items, $user, (int)$amount, $brand ,$request)->original;

        return view('paymentGW')->with(['payment' =>$response , 'user_id' => $user , 'cartItems' => $returnedItems ,

            "settings"=>Setting::first(),
        ]);
    }



    public function paymentStatus(Request $request)
    {
//        return $request->get('user_id');
        $resourcePath = $request->get('resourcePath');
        $checkout_id = $request->get('id');
        $response =  LaravelHyperpay::paymentStatus($resourcePath, $checkout_id)->original;
//        return $response;
        $returnedItems = App::call('\App\Http\controllers\CartController@cartCalculation');

        $cart_ids = [];
        foreach ( $returnedItems['cartItems'] as $cartItem){
            array_push($cart_ids , $cartItem->id);
        }
        if ($response['status'] == 200){

            Auth::login(Session::get('user'));
            if ($order = $this->orderCreation($cart_ids , $returnedItems , Session::get('user')->id, Session::get('type') , Session::get('time') )){

                Cart::whereIn('id' , $cart_ids)->update(["status" => 1]);
                    event(new \App\Events\NotificationEvent('you have got new order' , $order->created_at->diffForHumans()));

                Session::forget("user");
                Session::forget("type");
                Session::forget("time");
                Session::forget('payment_method');

                return redirect()->intended(url('/receipt/'.$order->id))->with(['message' =>  $response['status']]);
            }

        }else
            return redirect()->intended(route('cart'))->with(['message' =>  $response['status']]);
    }

    public function orderCreation($cart_ids , $returnedItems , $user ,$type , $time ){
        date_default_timezone_set("Asia/Riyadh");

        $order =  Order::create([
            "date" => date("Y-m-d"),
            "cart_ids" => json_encode($cart_ids),
            "subtotal" =>$returnedItems['checkout_total_price'] ,
            "total_after_tax" =>Session::has('total_after_discount')?Session::get('total_after_discount') :($returnedItems['checkout_total_price'] + ($returnedItems['checkout_total_price'] * (25/100))) ,
            "user_id" => $user,
            "type"    => $type,
            "time" =>$time,
            "notes"    => Session::get('notes'),
        ]);


        // ABD EL RAHMAN CODE

        Invoice::create([
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'vat' => Vat::value('value')
//            "branch_id" =>
        ]);
        //increment loyality_order_No
        // ERROR IF NOT LOGGED IN
        if(Auth::guard("web")->check()){
            User::find(auth()->user()->id)->increment('loyality_order_No');
            $user = User::find(auth()->user()->id);
            $loyality = Loyality::first();

            if($user->loyality_order_No == $loyality->loyality_No){
                $generated_code = $this->generateCodeForLoyality(4);
                Coupon::create([
                    'coupon_code' => $generated_code,
                    'coupon_discount' => $loyality->coupon_discount,
                    'coupon_validity' => 1,
                    'coupon_type' => 0,
                    'fromDate' => Carbon::now(),
                    'toDate' => Carbon::now()->addDays(7)
                ]);
                $user->update(['loyality_order_No' => 0]);

            }else{
                //any msg or leave it
            }
        }else{
            //any msg or leave it
        }
        return $order;
    }

    public function generateCodeForLoyality($length) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = 'LOY';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
