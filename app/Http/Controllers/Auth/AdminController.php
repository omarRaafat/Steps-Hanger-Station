<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin' , ['except' => ['logout']]);
    }

    public function showLoginForm(){


        return view('admin.login');
    }



    public function login(Request $request){
        // dd($request);
        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')])){
            return redirect()->intended(route('admin.dashboard' , app()->getLocale()));
        }
        // return back()->with('msg' , 'the username or password is invalid');
        return redirect()->back()->withInput($request->only('email' , 'remember'));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login' , app()->getLocale());
    }
}
