<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\sendMailable;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function userLogin(Request $request)
    {
        if ($request->isMethod('POST')){
            if (Auth::attempt(["phone" => "+966".$request->phone , "password" => $request->password])){

                return redirect()->intended(route('menu'));
            }else{
                return redirect()->back()->with(['message' => __('menu.wrong phone or password')]);
            }
        }else{

            return view('auth.login')->with(['settings'=>Setting::first() , 'pages' => Page::get()]);
        }

    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route("userLogin");
    }

    public function adminLogin(Request $request)
    {

        if ($request->isMethod('POST')){
             $remember_me = $request->remember_me? true : false;

            if (Auth::guard('admin')->attempt(["username" => $request->username_email , "password" => $request->password] , $remember_me)
              ||
                Auth::guard('admin')->attempt(["email" => $request->username_email , "password" => $request->password] ,  $remember_me)
            ){
                return redirect()->intended(route('adminAccess'));
            }else{
                return redirect()->back()->with("error" , 'Wrong Username / Email OR Password');
            }
        }else{
            if (!Auth::guard('admin')->check())
            return view('auth.admin.login');
            else
                return redirect()->back();
        }

    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route("get.admin.login");
    }

    public function forgetWizard(Request $request){
        if ($request->isMethod('POST')){
            if (Admin::where("email" , $request->email)->first()){
                try {
                    Mail::to($request->email)->send(new sendMailable( "http://".$_SERVER['HTTP_HOST'].'/admin/reset/mail/password'));
                    return redirect()->back()->with("message" , "success mail send to ".$request->email);
                }catch (\Exception $exception){
                    return redirect()->back()->with("error" , 'error occured please try again later');
                }

            }else{
                return redirect()->back()->with("error" , 'error occured please check that email requested is yours');
            }



        }else{
            if (!Auth::guard('admin')->check())
                return view('auth.admin.forget');
            else
                return redirect()->back();
        }
    }

    public function RESETWizard(Request $request){
        if ($request->isMethod('POST')){
            if ($admin = Admin::where("email" , $request->email)->first()){
                if ($request->new_password && $request->conf_password) {
                    if ($request->new_password == $request->conf_password){
                        $admin->update(["password" => Hash::make($request->new_password)]);
                        return redirect()->back()->with("message" , "success password updated");
                    }

                    else
                        return redirect()->back()->with("error" , 'Passwords Not Matches Each Others');

                } else {
                    return redirect()->back()->with("error" , 'please enter matched passwords');
                }

            }else{
                return redirect()->back()->with("error" , 'Wrong email entered , please enter your admin account mail');
            }




        }else{
            if (!Auth::guard('admin')->check())
                return view('auth.admin.reset');
            else
                return redirect()->back();
        }
    }

    public function userPasswordReset(Request $request){
        if ($request->isMethod('POST')){
            if (User::where("phone" , "+966".$request->phone)->first()){
//                $base_url = "https://".$_SERVER['HTTP_HOST'].'/user/reset/password' ;
                $random_code = rand(1000,9999);
                try {
                    $phone= (int)("966".$request->phone);
//                    \Unifonic::send($phone, " أدخل رمز التحقق التالى  : " ."'$random_code'",  $senderID = "Steps-sa");
                    return response()->json(["message" => __('menu.success otp sent to verify your identity') , "status" => 1 , 'code' => $random_code,'phone' => $request->phone]);
                }catch (\Exception $ex){
                    return response()->json(["message" => __('menu.something went wrong'), "status" => 0]);
                }

            }else{
                return response()->json(["message" => __('menu.error occurred please check that phone requested is yours'), "status" => 0]);
            }




        }else{

            if (!Auth::guard('web')->check())

                return view('auth.reset')->with(['settings'=>Setting::first(),'pages' => Page::get()]);
            else
                return redirect()->back();
        }
    }

    public function userVerify2(Request $request){
        $digit_1 = $request->code_1;
        $digit_2 = $request->code_2;
        $digit_3 = $request->code_3;
        $digit_4 = $request->code_4;
        $codeRequest = $digit_1 . $digit_2 . $digit_3 . $digit_4;
//return $request->generated_code;
        if ($codeRequest == $request->generated_code){

            \Session::put('phone' , $request->phone);
            return response()->json([
                "status" => 1,
                "message" => '/user/reset/password',

            ]);
        }
        else{
            return response()->json([
                "status" => 0,
                "message" => "invalid verification code !"
            ]);
        }
    }
    public function RESETWizard2(Request $request){
        if ($request->isMethod('POST')){

            if ($user = User::where("phone" , '+966'.\Session::get('phone'))->first()){
                if ($request->new_password && $request->conf_password) {
                    if ($request->new_password == $request->conf_password){
                        $user->update(["password" => Hash::make($request->new_password)]);
                        \Session::forget('phone');
                        return redirect()->back()->with("message" , "success password updated");
                    }

                    else
                        return redirect()->back()->with("error" , 'Passwords Not Matches Each Others');

                } else {
                    return redirect()->back()->with("error" , 'please enter matched passwords');
                }

            }else{
                return redirect()->back()->with("error" , 'Wrong phone entered , please enter your phone number');
            }




        }else{
            if (!Auth::guard('web')->check())
                return view('auth.reset_password')->with(['settings'=>Setting::first(),'pages' => Page::get()]);
            else
                return redirect()->back();
        }
    }


}
