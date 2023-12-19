<?php


namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Loyality;
use App\Models\Order;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function myaccount(){

        return view('myaccount')->with(["pastOrders" => $this->pastOrders() , "coupons" => Coupon::latest()->get() , "loyality" => Loyality::first(),"settings" =>Setting::first()]);
    }

    public function pastOrders(){
        if (Auth::guard('web')->check())
        return Order::where("user_id" , Auth::guard('web')->user()->id)->latest()->get();
    }



    public function updatePassword(Request $request){
        $user = User::find(Auth::guard('web')->user()->id);
        if ($request->cur_password ) {
            if (Hash::check($request->cur_password, $user->password)) {
                if ($request->new_password && $request->conf_password) {
                    if ($request->new_password == $request->conf_password){
                        $user->update(["password" => Hash::make($request->new_password)]);
                        return response()->json([
                            "status" => 1,
                            "message" => " new password updated "
                        ]);
                    }

                    else
                        return response()->json([
                            "status" => 2,
                            "message" => "Passwords Not Matches Each Others"]);
                } else {
                    return response()->json([
                        "status" => 2,
                        "message" => "Please Choose Strong Password"]);
                }

            } else {
                return response()->json([
                    "status" => 0,
                    "message" => "Wrong Password"]);
            }
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Please Enter Your Current Password"]);
        }
    }



    public function updateInfo(Request $request){
        $user = User::find(Auth::guard('web')->user()->id);
        $user->update($request->all());
        return response()->json([
            "user" =>$user,
                "message" => "SUCCESS UPDATE"
            ]
        );
    }
}
