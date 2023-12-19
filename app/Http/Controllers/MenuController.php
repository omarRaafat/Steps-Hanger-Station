<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu_Category;
use App\Models\Menu_Meal;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function menu()
    {

    //   return  app()->getLocale();
        return view('menu')->with(["menuMeals" => Menu_Meal::latest()->get() ,"menuCategories" => Menu_Category::latest()->get()]);
    }




    public function addToCart(Request $request ){

        $USER_IP_ADDRESS = \Request::ip();
        $USER_SESSION_ID =  Auth::guard('web')->user();
/*        AUTHENTICATED USER REQUEST
 *
 *
 */
        if (Auth::guard('web')->check()){

            if ($cart = Cart::where(["user_id" =>$USER_SESSION_ID->id , "meal_id" => $request->meal['id'] ,'status'=>0 ])->first()){
                if ($request->type == 'minus'){
                    $cart->quantity -= 1;
                }else{
                    $cart->quantity += 1;
                }

                $cart->total_price = $cart->price * $cart->quantity;
                $cart->save();
                $cartItems = Cart::where(["user_id" => $USER_SESSION_ID->id , 'status'=>0])->latest()->get();
                $checkout_total_price = 0;
                foreach ($cartItems as $cartItem){
                    $cartItem->meal_name = $cartItem->meal->mealName();
                    $cartItem->meal_image = $cartItem->meal->meal_image;
                    $checkout_total_price += $cartItem->total_price;
                }
                $cartItems->checkout_total_price = $checkout_total_price;
                return response()->json( $cartItems);
            }else{
                if(
                Cart::create([
                    "user_id" => $USER_SESSION_ID->id,
                    "meal_id" => $request->meal['id'],
                    "price" => $request->meal['meal_price'],
                    "total_price" => $request->meal['meal_price']


                ])){


                    $cartItems = Cart::where(["user_id" => $USER_SESSION_ID->id ,"status"=>0])->latest()->get();
                    $checkout_total_price = 0;
                    foreach ($cartItems as $cartItem){
                        $cartItem->meal_name = $cartItem->meal->mealName();
                        $cartItem->meal_image = $cartItem->meal->meal_image;
                        $checkout_total_price += $cartItem->total_price;
                    }
                    $cartItems->checkout_total_price = $checkout_total_price;
                    return response()->json( $cartItems);
                }

                else{
                    return response()->json( "error occured , try again");
                }
            }

            /* GUEST  REQUEST
             *
             *
             */
        }else{

            if ($cart = Cart::where(["meal_id" => $request->meal['id'] , "IP_ADDRESS" => $USER_IP_ADDRESS ,"status"=>0])->first()){
                if ($request->type == 'minus'){
                    $cart->quantity -= 1;
                }else{
                    $cart->quantity += 1;
                }
                $cart->total_price = $cart->price * $cart->quantity;
                $cart->save();
                $cartItems = Cart::where(["IP_ADDRESS" => $USER_IP_ADDRESS, "status"=>0])->latest()->get();
                $checkout_total_price = 0;
                foreach ($cartItems as $cartItem){
                    $cartItem->meal_name = $cartItem->meal->mealName();
                    $cartItem->meal_image = $cartItem->meal->meal_image;
                    $checkout_total_price += $cartItem->total_price;
                }
                $cartItems->checkout_total_price = $checkout_total_price;

                return response()->json( $cartItems);
            }else{
                if (
                Cart::create([
                    "IP_ADDRESS" => $USER_IP_ADDRESS,
                    "meal_id" => $request->meal['id'],
                    "price" => $request->meal['meal_price'],
                    "total_price" => $request->meal['meal_price']


                ])){
                    $cartItems = Cart::where(["IP_ADDRESS" => $USER_IP_ADDRESS , "status" =>0])->latest()->get();
                    $checkout_total_price = 0;
                    foreach ($cartItems as $cartItem){
                        $cartItem->meal_name = $cartItem->meal->mealName();
                        $cartItem->meal_image = $cartItem->meal->meal_image;

                    }

                    return response()->json($cartItems );
                }
                else{
                    return response()->json( "error occured , try again");
                }
            }

        }

//

    }

    public function mealDetail($meal_id){
        if (Auth::guard('web')->check()){
            $review = Review::where(["user_id" => Auth::guard('web')->user()->id , "meal_id" =>$meal_id])->first();
        }else{
            $review = 0;
        }
        return view('meal_detail')->with(["meal" => Menu_Meal::find($meal_id) , "recommended_meals" => Menu_Meal::latest()->take(3)->get() , 'reviews' => Review::where("meal_id" , $meal_id)->latest()->get() , "isReviewed" =>$review]);
    }

    public function rate($meal_id , $rate){
          return Menu_Meal::find($meal_id)->update(["rate" => $rate]);
    }

    public function review(Request $request){
        Review::create([
            "meal_id"=>$request->meal_id,
            "user_id"=>$request->user_id,
            "review" => $request->review
    ]);
       $reviews =  Review::where("meal_id" , $request->meal_id)->latest()->get();
       $reviews->each(function ($review){
           $review->username = $review->user->username;
           $review->date = $review->created_at->diffForHumans();
       });
        return response()->json([
            "reviews" => $reviews,
            "message" => "your review added "
        ]);
    }

    public function reviewRemove($meal_id , $user_id){
        Review::where(["meal_id" => $meal_id , "user_id" =>$user_id])->delete();
        $reviews =  Review::where("meal_id" , $meal_id)->latest()->get();
        $reviews->each(function ($review){
            $review->username = $review->user->username;
            $review->date = $review->created_at->diffForHumans();
        });
        return response()->json([
            "reviews" => $reviews,
            "isReviewed" => 0,
            "message" => "your review removed "
        ]);
    }
}
