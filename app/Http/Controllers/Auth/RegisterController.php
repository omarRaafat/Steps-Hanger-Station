<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Setting;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
//        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function RegisterUser(Request $request)
    {
        if ($request->isMethod('POST')){
            $random_code = rand(1000,9999);
//            return   $phone= (int)("966".$request->phone);;
            if ( $user = User::where("phone" ,"+966".$request->phone)->first()) {

                if (Auth::attempt(["phone" => "+966".$request->phone, "password" => $request->password])){
                    if ($user->status == 1){
                        $user = Auth::user();
                    }else{

                        Auth::logout();
                        try {
                            $phone= (int)("966".$request->phone);
                            \Unifonic::send($phone, " أدخل رمز التحقق التالى  : " ."'$random_code'",  $senderID = "Steps-sa");
                        }catch (\Exception $ex){}


                        return response()->json( ["message" =>__('menu.PLEASE ACTIVATE YOUR ACCOUNT TO PROCEED YOUR ORDER'),
                            "status" => 3,
                            "code" =>$random_code,

                        ]);
                    }
                } else
                    return response()->json([
                        "message" =>__('menu.PHONE IS REGISTERED BEFORE BUT WRONG PASSORD , RE-ENTER PASSWORD AGAIN'),
                        "status" => 2
                    ]);


            } else{

                try {
                    $phone= (int)("966".$request->phone);
                    \Unifonic::send($phone, " أدخل رمز التحقق التالى  : " ."'$random_code'",  $senderID = "Steps-sa");
                }catch (\Exception $ex){}
                User::create([
                    'username' => $request['username'],
                    'email' => $request['email'],
                    'phone' => "+966".$request['phone'],
                    'password' => Hash::make($request['password']),
                ]);

                return response()->json( ["message" =>__('menu.PLEASE ACTIVATE YOUR ACCOUNT TO PROCEED YOUR ORDER'),
                    "status" => 3,
                    "code" =>$random_code
                ]);
            }
            return redirect()->route("login");
        }else{

            return view('auth.register')->with(['settings'=>Setting::first() , 'pages' => Page::get()]);
        }


    }
}
