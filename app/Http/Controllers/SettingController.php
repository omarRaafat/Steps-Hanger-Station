<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Benifit;
use App\Common;
use App\Contact;
use App\Events\MyEvent;
use App\NewsLetter;
use App\Notification;
use App\PackagesServices;
use App\Policy;
use App\Section;
use App\Subscripe;
use App\SubService;
use App\Term;
use App\WhySteps;
use DB;
//app('currentD-CONNECTION');

class SettingController extends Controller
{

    public function index(){
        $settings = DB::connection('D-CONNECTION')->table('officialSite.settings')->get();
//        $settings = Setting::all();
        return response()->json($settings);
    }

    public function getBenifits(){
        $benifits = DB::connection('D-CONNECTION')->table('officialSite.benifits')->get();
        return response()->json($benifits);
    }

    public function getWhySteps(){
        $why =DB::connection('D-CONNECTION')->table('officialSite.whysteps')->get();
        return response()->json($why);
    }

    public function getFAQs(){
        $faqs = DB::connection('D-CONNECTION')->table('officialSite.common')->get();
        return response()->json($faqs);
    }

    public function storeContactUs(Request $request){
        DB::transaction(function () use ($request) {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email',
                'address' => 'required',
                'help' => 'required'
            ]);

            $contact = new Contact();
//            Contact::create($request->all());
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->phone = $request->input('phone');
            $contact->address = $request->input('address');
            $contact->help = $request->input('help');

            $contact->save();

            $notifications = new Notification();
            $notifications->contact_id = $contact->id;
            $notifications->viewed = 0;

            $notifications->save();
            event(new MyEvent($notifications));

        return response()->json($contact);
        });
    }

    public function storNewsLetters(Request $request){
        $request->validate([
            'email' => 'required|email|unique:newsletters',
        ]);
        return DB::connection('D-CONNECTION')->table('officialSite.newsletters')->insert([
            "email" => $request->input('email')

        ]);

    }

    public function getServicesFromPackage(){
        $package_service = DB::connection('D-CONNECTION')->table('officialSite.packages_services')->get();
        return response()->json($package_service);
    }

    public function storeSubscriptions(Request $request){
        DB::transaction(function () use ($request) {
            $request->validate([
                'store_name' => 'required|max:255',
                'store_link' => 'required',
                'company_kind' => 'required',
                'manager' => 'required|max:255',
                'phone' => 'required',
                'email' => 'required|max:255|email|unique:subscriptions',
                'password' => 'required',
            ]);
            
            $subscribe = DB::connection('D-CONNECTION')->table('officialSite.subscriptions')->insertGetId([
                'store_name' => $request->input('store_name'),
                'store_link' => 'steps-sa.co/' . $request->input('store_link'),
                'company_kind' => $request->input('company_kind'),
                'manager' => $request->input('manager'),
                'phone' => '+966' . $request->input('phone'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);




            $notifications = new Notification();
            $notifications->subscripe_id = $subscribe;
            $notifications->viewed = 0;

            $notifications->save();
            event(new MyEvent($notifications));
        });
    }

    public function getSubServices(){
        $sub_services = DB::connection('D-CONNECTION')->table('officialSite.sub_services')->get();
        return response()->json($sub_services);
    }

    public function getSections(){
        $sections = DB::connection('D-CONNECTION')->table('officialSite.sections')->get();
        return response()->json($sections);
    }

    public function getTerms(){
        $terms = DB::connection('D-CONNECTION')->table('officialSite.terms')->get();
        return response()->json($terms);
    }

    public function getPolicies(){
        $policies = DB::connection('D-CONNECTION')->table('officialSite.policies')->get();
        return response()->json($policies);
    }
}
