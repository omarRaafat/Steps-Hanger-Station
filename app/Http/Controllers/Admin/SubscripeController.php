<?php

namespace App\Http\Controllers\Admin;

use App\ExtraPackage;
use App\Http\Controllers\Controller;
use App\Mail\SESMAILDRIVER;
use App\Models\Order;
use App\Notification;
use App\Reckoning;
use Illuminate\Http\Request;
use App\Subscripe;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class SubscripeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $subscripes = Subscripe::where('status' , 0)->orderBy('id' , 'desc')->get();
        return view('admin.subscripes.index' , ['subscripes' => $subscripes]);
    }

    public function show($language , $id){
        $subscripes = Subscripe::find($id);
        return view('admin.subscripes.show' , ['language' => $language , 'subscripes' => $subscripes]);
    }

    public function accept($language , $id){


        $subscribe = Subscripe::find($id);

        $subscribe->update(['status' => 1]);
        INNODB_CONNECTION_WIZARD_TUBE($subscribe);


//
        $client = App::make('aws')->createClient('Route53');

        $result = $client->changeResourceRecordSets(array(
            'HostedZoneId' => 'Z03027762L6SPCGP0U0PT',
            'ChangeBatch' => array(
                'Comment' => 'subdomain record',
                'Changes' => array(
                    array(
                        'Action' => 'CREATE',
                        'ResourceRecordSet' => array(
                            'Name' => "$subscribe->store_name.steps-sa.co",
                            'Type' => 'CNAME',
                            'TTL' => 600,
                            'ResourceRecords' => array(
                                array(
                                    'Value' => 'eightythree.us-east-1.elasticbeanstalk.com',//my AWS IP address
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ));

        DB::connection('D-CONNECTION')->table('landlord.tenants')->insert([
            "name" => $subscribe->store_name,
            "domain" => $subscribe->store_name.".steps-sa.co" ,
            "database" => $subscribe->store_name
        ]);


        try {
            Mail::to($subscribe->email)->send(new SESMAILDRIVER( $subscribe->manager , $subscribe->password ,$subscribe->store_name.".steps-sa.co" , $subscribe->store_name.".steps-sa.co/admin/login"));
            return "SUCCESS";
        }catch (\Exception $exception){
            return $exception;
        }

//        return redirect()->route('subscripes.index' , app()->getLocale());
    }

    public function edit($language , $id){
        $subscripes = Subscripe::find($id);
        Notification::where('subscripe_id' , '=' , $id)->update(['viewed' => 1]);
        return view('admin.subscripes.edit' , ['language' => $language , 'subscripes' => $subscripes]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'store_name' => 'required|max:255',
            'store_link' => 'required',
            'company_kind' => 'required',
            'manager' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|max:255|email',
            'password' => 'required',
        ]);

        $subscripes = Subscripe::find($request->id);
        $subscripes->store_name = $request->input('store_name');
        $subscripes->store_link = $request->input('store_link');
        $subscripes->company_kind = $request->input('company_kind');
        $subscripes->manager = $request->input('manager');
        $subscripes->phone = $request->input('phone');
        $subscripes->email = $request->input('email');
        $subscripes->password = $request->input('password');
        $subscripes->order_percentage = $request->input('order_percentage');

        $subscripes->save();

        return redirect()->route('subscripes.index' , app()->getLocale());
    }

    public function delete($language , $id){
        Subscripe::find($id)->delete();
        return redirect()->route('subscripes.index' , app()->getLocale());
    }

    public function getNotifications(){
        $notifications = Notification::with('subscriptions')->with('contacts')->orderBy('id' , 'desc')->get();
        $html = View::make('admin.subscripes.notifications', ['notifications' => $notifications])->render();
        return response()->json($html);
    }


    public function getNumberNotification(){
        $count = Notification::where("viewed" , "=" , 0)->count();
        return response()->json($count);
    }

    public function sales(){

        $subscripes = Subscripe::where('status' , 1)->orderBy('id' , 'desc')->get();
        $subscripes->each(function ($sub){
            $sub->logo =  DB::connection('D-CONNECTION')->table($sub->store_name.'.settings')->value('logo');
        });
        return view('admin.sales' , ['subscripes' => $subscripes ]);
    }

    public function showSales($language , $id){
        $subscripes = Subscripe::find($id);
        $last_transaction =   DB::connection('D-CONNECTION')->table($subscripes->store_name.'.transactions')->latest()->first();
        $orders  =  DB::connection('D-CONNECTION')->table($subscripes->store_name.'.orders')->where('status' , 3)->get();
        $total_sales_before_tax = $orders->sum('subtotal');
        $total_sales_after_tax  = $orders->sum('total_after_tax');

        $steps_fee = $total_sales_before_tax*$subscripes->	order_percentage/100;
        $profit = $total_sales_before_tax - $steps_fee;
        $statistics = [
            "total_sales" =>$total_sales_after_tax,
            "total_sales_before_tax" => $total_sales_before_tax,
            "steps_fee" => $steps_fee,
            "profit" => $profit,
            "orders_count" => $orders->count(),
            "last_transaction_date" =>  date('Y-m-d' , strtotime($last_transaction->created_at)),
            "bank"      => DB::connection('D-CONNECTION')->table($subscripes->store_name.'.banks')->first(),
        ];





        return view('admin.showSales' , ['language' => $language , 'statistics' => $statistics , 'subscripes' => $subscripes]);
    }

    public function accountants(){

        $subscripes = Subscripe::where('status' , 1)->orderBy('id' , 'desc')->get();
        $subscripes->each(function ($sub){
            $sub->logo =  DB::connection('D-CONNECTION')->table($sub->store_name.'.settings')->value('logo');
            $sub->orders_unpaid  =  DB::connection('D-CONNECTION')->table($sub->store_name.'.orders')->where([['status' , 3],['steps_paid' , 0]])->count();
            $sub->orders_paid  =  DB::connection('D-CONNECTION')->table($sub->store_name.'.orders')->where([['status' , 3],['steps_paid' , 1]])->count();
            $sub->total_sales =  DB::connection('D-CONNECTION')->table($sub->store_name.'.orders')->where('status' , 3)->sum('total_after_tax');
            $sub->vendor_profits = Reckoning::where('subscribe_id' , $sub->id)->sum('vendor_profit');
            $sub->steps_profits = Reckoning::where('subscribe_id' , $sub->id)->sum('steps_fee');
        });

        return view('admin.accountants' , ['subscripes' => $subscripes ]);
    }

    public function showAccountant($language , $id){
        $subscripes = Subscripe::find($id);
        $last_transaction =   DB::connection('D-CONNECTION')->table($subscripes->store_name.'.transactions')->latest()->first();
        $orders  =  DB::connection('D-CONNECTION')->table($subscripes->store_name.'.orders')->where([['status' , 3],['steps_paid' , 0]])->get();
        $total_sales_before_tax = $orders->sum('subtotal');
        $total_sales_after_tax  = $orders->sum('total_after_tax');
        $steps_fee = $total_sales_before_tax*$subscripes->	order_percentage/100;
        $profit = $total_sales_before_tax - $steps_fee;
        $statistics = [
            "total_sales" =>$total_sales_after_tax,
            "total_sales_before_tax" => $total_sales_before_tax,
            "steps_fee" => $steps_fee,
            "profit" => $profit,
            "orders_count" => $orders->count(),
            "last_transaction_date" =>  date('Y-m-d' , strtotime($last_transaction->created_at)),
            "bank"      => DB::connection('D-CONNECTION')->table($subscripes->store_name.'.banks')->first(),
            "reckoning" => Reckoning::where('subscribe_id' , $id)->latest()->first()
        ];



        return view('admin.showAccountants' , ['language' => $language , 'statistics' => $statistics , 'subscripes' => $subscripes]);
    }

    public function accountantReckoning(Request $request){
        $subscripes = Subscripe::find($request->sub_id) ;
        $orders  =  DB::connection('D-CONNECTION')->table($subscripes->store_name.'.orders')->where([['status' , 3],['steps_paid' , 0]])->get();
        $account_number  =  DB::connection('D-CONNECTION')->table($subscripes->store_name.'.banks')->value('account_number');
        $total_sales_before_tax = $orders->sum('subtotal');
        $steps_fee = $total_sales_before_tax*$subscripes->	order_percentage/100;
        $profit = $total_sales_before_tax - $steps_fee;

        Reckoning::create([
            'total_sales_excluded_tax' => $total_sales_before_tax,
            'steps_fee' => $steps_fee,
            'vendor_profit' => $profit,
            'orders' =>$orders->count(),
            'subscribe_id' => $request->sub_id,
            'reference_number' => rand(100000000000000000,999999999999999999 ),
            'account_number' => $account_number
        ]);
        $orders  =  DB::connection('D-CONNECTION')->table($subscripes->store_name.'.orders')->where([['status' , 3],['steps_paid' , 0]])->update(['steps_paid' => 1]);
        return 1;

    }

    public function reckonings(){
        $reckonings  = Reckoning::latest()->get();
        return view('admin.reckonings' , ['reckonings' => $reckonings]);
    }
}
