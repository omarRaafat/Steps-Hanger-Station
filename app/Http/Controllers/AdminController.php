<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;

class AdminController extends Controller
{

    public function dashboardAccess()
    {
        $year = ['1','2','3','4','5','6','7','8','9','10','11','12'];

        $total_orders = [];
        $new_orders = [];
        $cancel_orders = [];
        foreach ($year as $key => $value) {
            $total_orders[] = Order::where(DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->count();
            $new_orders[] = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->count();
            $cancel_orders[] = Order::where('status', '=' , 1)->where(DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->count();
        }

         $total_sales = Order::sum('total_after_tax');
         $total_sales_before_tax = Order::sum('subtotal');
        \App\Models\Restaurant::first()->update(['total_sales' => $total_sales]);
        \App\Models\Restaurant::first()->update(['total_sales_before_tax' => $total_sales_before_tax]);
//        session()->put('locale', 'ar');
//        App::setlocale(session()->get('locale'));
        return view('admin.dashboard')->with("total_sales" , $total_sales)->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('totla_orders',json_encode($total_orders,JSON_NUMERIC_CHECK))->with('new_orders',json_encode($new_orders,JSON_NUMERIC_CHECK))->with('cancel_orders',json_encode($cancel_orders,JSON_NUMERIC_CHECK));
    }


    public function meals()
    {
        return view('admin.meals');
    }


    public function mealCreation(Request $request)
    {
        return view('admin.addMeal');
    }


    public function mealDetails()
    {
        return view('admin.mealDetail');
    }


    public function orders()
    {
        return view('admin.orders' , ["orders" => Order::latest()->paginate(10)]);
    }


    public function invoices()
    {
        return view('admin.invoices');
    }


    public function invoiceDetail()
    {
        return view('admin.invoicedetail');
    }

    public function customers(){
        return view('admin.customers');
    }

    public function customersReviews(){
        return view('admin.customersReview');
    }

    public function sales(){
        $sales = DB::table('cart')
        ->join('menu' , 'cart.meal_id' , 'menu.id')
        ->select('menu.id as menuID' , 'menu.meal_name_ar' , DB::raw('sum(cart.quantity) AS quantity') , 'menu.meal_price' , 'menu.status as status' , DB::raw('(sum(cart.total_price)) AS total_price'))
        ->groupBy('cart.meal_id')
        ->get();
        return view('admin.sales' , compact('sales'));
    }

    public function getFirstWeeklyOrdersPerMonth($month){
        $orders_first_week = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->whereMonth('created_at' , '=' , $month)
        ->count();

        return response()->json($orders_first_week);
    }

    public function getSecondWeeklyOrdersPerMonth($month){
        $second_week = date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d'))));

        $orders_second_week = Order::orderby('created_at', 'desc')
        ->whereBetween( DB::raw('date(created_at)'), [$second_week, date('Y-m-d')] )
        ->whereMonth('created_at' , '=' , $month)
        ->count();

        return response()->json($orders_second_week);
    }

    public function getThirdWeeklyOrdersPerMonth($month){
        $third_week = date('Y-m-d', strtotime('+14 days', strtotime(date('Y-m-d'))));

        $orders_third_week = Order::orderby('created_at', 'desc')
        ->whereBetween( DB::raw('date(created_at)'), [$third_week, date('Y-m-d')] )
        ->whereMonth('created_at' , '=' , $month)
        ->count();

        return response()->json($orders_third_week);
    }

    public function getFourthWeeklyOrdersPerMonth($month){
        $fourth_week = date('Y-m-d', strtotime('+21 days', strtotime(date('Y-m-d'))));

        $orders_fourth_week = Order::orderby('created_at', 'desc')
        ->whereBetween( DB::raw('date(created_at)'), [$fourth_week, date('Y-m-d')] )
        ->whereMonth('created_at' , '=' , $month)
        ->count();

        return response()->json($orders_fourth_week);
    }

    public function getDateByName(){
        $d = new DateTime();
        if($d->format('l') == "Monday"){
            $day = "Monday";
        }elseif($d->format('l') == "Tuesday"){
            $day = "Tuesday";
        }elseif($d->format('l') == "Wednesday"){
            $day = "Wednesday";
        }elseif($d->format('l') == "Thursday"){
            $day = "Thursday";
        }elseif($d->format('l') == "Friday"){
            $day = "Friday";
        }elseif($d->format('l') == "Saturday"){
            $day = "Saturday";
        }else{
            $day = "Sunday";
        }
        return response()->json($day);
    }

    public function getBranchesWithTheirOrders($date){
        $branch = DB::table('menu_branches')
        ->join('branches' , 'branches.id' , 'menu_branches.branch_id')
        ->join('menu' , 'menu.id' , 'menu_branches.menu_meal_id')
        ->join('cart' , 'cart.meal_id' , 'menu.id')
        ->select('branches.branch_name_en' , DB::raw('count(cart.meal_id) AS orders') , DB::raw('sum(cart.quantity) AS quantityPercentage') , 'menu.id as meal_id')
        ->whereDate('cart.created_at' , '=' , $date)
        ->groupBy('branches.id')
        ->get();

        return response()->json($branch);
    }

    public function adminDashboardLang($lange){

            session::put("locale" , $lange);
            App::setLocale(session::get("locale"));

        return response()->json(app()->getLocale());
    }
}
