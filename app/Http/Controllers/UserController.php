<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){
        $users  = User::all();
        return view('admin.users.index' , compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $users = new User();
        $users->username = $request->input('username');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->phone = '+966' . $request->input('phone');
        $users->address = $request->input('address');
        $users->city = $request->input('city');
        $users->country = $request->input('country');
        $users->loyality_order_No = 0;
        $users->status = 0;

        $users->save();
        return redirect()->route('users.index');
    }

    public function edit($id){
        $users = User::find($id);
        return view ('admin.users.edit' , compact('users'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $users = User::find($id);
        $users->username = $request->input('username');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->phone = $request->input('phone');
        $users->address = $request->input('address');
        $users->city = $request->input('city');
        $users->country = $request->input('country');
        // $users->loyality_order_No = 0;
        $users->status = 0;

        $users->save();
        return redirect()->route('users.index');
    }

    public function delete($id){
        User::find($id)->delete();
        return redirect()->route('users.index');
    }

    public function userVerify(Request $request){
        $digit_1 = $request->code_1;
        $digit_2 = $request->code_2;
        $digit_3 = $request->code_3;
        $digit_4 = $request->code_4;
        $codeRequest = $digit_1 . $digit_2 . $digit_3 . $digit_4;
//        return $codeRequest . "|" . $request->generated_code;
        if ($codeRequest == $request->generated_code){

            $user = User::where("phone" , "+966".$request->phone)->first();
            $user->update(['status'=>1]);
//            return $user_id;

     Auth::login($user);


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
}
