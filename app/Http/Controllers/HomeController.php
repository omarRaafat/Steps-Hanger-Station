<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Loyality;
use App\Models\Menu_Category;
use App\Models\Menu_Meal;
use App\Models\Page;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
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
    public function index()
    {
    //   return  app()->getLocale();
        return view('welcome')->with(["meals" =>Menu_Meal::latest()->get() , "menuCategories" => Menu_Category::latest()->get() , "branches" => Branch::latest()->get()  , 'restaurant' => Restaurant::first() ,'settings'=>Setting::first(),'sliders' =>Slider::latest()->get(), 'pages' => Page::get()]);
    }

    public function menu(){
        return view('menu');
    }

    public function reservation(Request $request){
        if ($request->isMethod('POST')){

            $request_array = $request->all();
             $request_array['phone'] = "+966".$request->phone;
            $request_array['date'] = $request->reservation_date;

            Reservation::create($request_array);
            return response()->json(['message' => 'reservation sent to restaurant ']);
        }else{

            return view('reservation')->with([ "branches" => Branch::latest()->get() ,'settings'=>Setting::first(),'pages' => Page::get()]);
        }
    }

    public function contact(Request $request){
        if ($request->isMethod('POST')){
            Contact::create($request->all());
            return response()->json(['message' => 'message sent to support team !']);
        }else{

            return view('contact')->with([ 'settings'=>Setting::first()]);
        }
    }



    public function checkout(){
        return view('checkout');
    }

    public function cart(){
        return view('cart');
    }

    public function langLocalization(){
        if ( App::isLocale('en')){
             session()->put('locale', 'ar');
             App::setlocale(session()->get('locale'));
             return   app()->getLocale();
        }
        else {
            session()->put('locale', 'en');
            App::setlocale(session()->get('locale'));
            return   app()->getLocale();
        }

    }
    public function getLoyalitiesOfUser(){
        $loyalities = Loyality::first();
        $customer = Customer::where('user_id' , '=' , 3)->first();
        return view('couponsUser' , compact('loyalities' , 'customer'));
    }

//    public function registerPasswordsCheck(Request $request){
//        if($request->password == $request->password_confirm){
//            return response()->json(['message' => 'passwords does not matches each other']);
//        }else{
//            return response()->json(['message' => '']);
//        }
//    }
}
