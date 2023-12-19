<?php

use App\Models\Branch;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Menu_Branch;
use App\Models\Menu_Meal;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

function getTotalOrder($order_id){
    $invoicesWithCart = Invoice::with('orders')->where('id' , '=' , $order_id)->get();
    $net_total = [];
    foreach($invoicesWithCart as $card){
        $cart_ids = json_decode($card->orders->cart_ids);
        for($i = 0 ; $i < count($cart_ids) ; $i++){
            $carts = Cart::where('id' , '=' , $cart_ids[$i])->get();
            foreach($carts as $c){
                array_push($net_total , $c->total_price);
            }
        }
    }
    if (count($net_total) > 0)
        return array_sum($net_total);
    else
        return $net_total;


}

function getSumQuantity(){
    $invoices = Invoice::with('orders')->get();
    $all_quantity = [];
    foreach($invoices as $invoice){
        $decode_array = json_decode($invoice->orders->cart_ids);
        foreach($decode_array as $decode){
            $quantity = Cart::where('id' , '=' , $decode)->value('quantity');
            array_push($all_quantity , str_split($quantity));
        }
    }
    if (count($all_quantity) > 0)
        return $all_quantity;
    else
        return $all_quantity;


}

function generateCodeForLoyality($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = 'LOY';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getBranchOfSandwich($id){
    $invoicesWithCart = Invoice::with('orders')->where('id' , '=' , $id)->get();
    $branch_id = '';
    $branch = '';
        foreach($invoicesWithCart as $card){
            $cart_ids = json_decode($card->orders->cart_ids);
            for($i = 0 ; $i < count($cart_ids) ; $i++){
                $carts = Cart::where('id' , '=' , $cart_ids[$i])->get();
                foreach($carts as $cart_meal){
                    $branch_id = Menu_Branch::where('menu_meal_id'  , '=' , $cart_meal->meal_id)->value('branch_id');
                }
            }
        }
    $branch = Branch::find($branch_id)->branch_name_en;
    return $branch;
}

function getTotalMeals(){
    $count = Menu_Meal::whereMonth('created_at', Carbon::now()->month)
    ->count();
    if($count == 0){
        $count = 0;
    }else{
        return $count;
    }
}

function getNewUsers(){
    $count = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    if($count == 0){
        return 0;
    }else{
        return $count;
    }
}

function getTotalOrders(){
    $count = Order::whereMonth('created_at', Carbon::now()->month)
    ->count();
    if($count == 0){
       return 0;
    }else{
        return $count;
    }
}

function getTotalOrdersInChart(){
    $count = Order::count();
    if($count == 0){
       return 0;
    }else{
        return $count;
    }
}

function getTotalSales(){
    $count = '';
    $invoices = Invoice::with('orders')
    ->whereMonth('created_at', Carbon::now()->month)
    ->get();
    if(count($invoices) > 0){
        foreach($invoices as $invoice){
            $carts_ids =  json_decode($invoice->orders->cart_ids);
            for($i = 0 ; $i < count($carts_ids) ; $i++){
                $carts = Cart::sum('quantity');
                $count = $carts;
            }
        }

        return $count;
    }else{
        return 0;
    }
}

//for reminder Don't delete it

// function getMealsPercentage(){
//     $mealsDoneArray = [];
//     $invoices = Invoice::with('orders')->get();
//     foreach($invoices as $invoice){
//         $carts_ids =  json_decode($invoice->orders->cart_ids);
//         for($i = 0 ; $i < count($carts_ids) ; $i++){
//             $carts = DB::table('cart')
//             ->join('menu' , 'cart.meal_id' , 'menu.id')
//             ->join('meals_images' , 'menu.id' , 'meals_images.menu_meal_id')
//             ->select('menu.meal_name_en' , DB::raw('sum(cart.quantity) AS quantityPercentage') , 'meals_images.meal_images')
//             ->groupBy('cart.meal_id')
//             ->get();
//             array_push($mealsDoneArray , $carts);
//         }
//     }
//     return $mealsDoneArray[0];
// }

function getMealsPercentage(){
    $mealsDoneArray = [];
    $invoices = Invoice::with('orders')->take(4)->get();

    foreach($invoices as $invoice){
        $carts_ids =  json_decode($invoice->orders->cart_ids);
        for($i = 0 ; $i < count($carts_ids) ; $i++){
            $carts = DB::table('cart')
            ->join('menu' , 'cart.meal_id' , 'menu.id')
            ->select('menu.id' , 'menu.meal_name_en' , 'menu.meal_price')
            ->groupBy('cart.meal_id')
            ->get();
            array_push($mealsDoneArray , $carts);
        }
    }
    if (count($mealsDoneArray) > 0)
        return $mealsDoneArray[0];
    else
        return $mealsDoneArray;

}

function getSalesExample(){




    $sales = Menu_Meal::with('carts')->take(5)->get();


    return $sales;
}

function geCountOrdersOfMeal($meal_id){
    $num_of_orders = 0;
    $num_of_orders = Invoice::with('orders')->take(4)->get();

    return $meal_id;
}

function getNewOrders(){
    $count = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    if($count == 0){
        return 0;
    }else{
        return $count;
    }
}

function getCanceledOrders(){
    $count = Order::where('status' , '=' , 2)->count();
    if($count == null){
        return 0;
    }else{
        return $count;
    }
}

function getEarningsTodayOrders(){
    $Earnings = 0;
    $invoicesToday = Invoice::with('orders')->whereDate('created_at', Carbon::today())->get();
    foreach($invoicesToday as $invoice){
        $order = $invoice->orders->whereDate('created_at', Carbon::today())->sum('total_after_tax');
        $Earnings = $order;
    }
    return $Earnings;
}

function getEarningsYesterdayOrders(){
    $Earnings = 0;
    $invoicesYesterday = Invoice::with('orders')->whereDate('created_at', Carbon::yesterday())->get();
    foreach($invoicesYesterday as $invoice){
        $order = $invoice->orders->whereDate('created_at', Carbon::yesterday())->sum('total_after_tax');
        $Earnings = $order;
    }
    return $Earnings;
}

function getWeeklyOrders($month){
    $first_week = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
    ->whereMonth('created_at' , '=' , $month)
    ->count();

    $second_week = date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d'))));
    $third_week = date('Y-m-d', strtotime('+14 days', strtotime(date('Y-m-d'))));
    $fourth_week = date('Y-m-d', strtotime('+21 days', strtotime(date('Y-m-d'))));

    $orders_second_week = Order::orderby('created_at', 'desc')
    ->whereBetween( DB::raw('date(created_at)'), [$second_week, date('Y-m-d')] )
    ->whereMonth('created_at' , '=' , $month)
    ->count();

    $orders_third_week = Order::orderby('created_at', 'desc')
    ->whereBetween( DB::raw('date(created_at)'), [$third_week, date('Y-m-d')] )
    ->whereMonth('created_at' , '=' , $month)
    ->count();

    $orders_fourth_week = Order::orderby('created_at', 'desc')
    ->whereBetween( DB::raw('date(created_at)'), [$fourth_week, date('Y-m-d')] )
    ->whereMonth('created_at' , '=' , $month)
    ->count();

    dd($fourth_week);

    return $orders_second_week;
}

function getBranchesSandwich(){
    $branch = DB::table('menu_branches')
    ->join('branches' , 'branches.id' , 'menu_branches.branch_id')
    ->join('menu' , 'menu.id' , 'menu_branches.menu_meal_id')
    ->join('cart' , 'cart.meal_id' , 'menu.id')
    ->select('branches.branch_name_en' , DB::raw('count(cart.meal_id) AS orders') , DB::raw('sum(cart.quantity) AS quantityPercentage') , 'menu.id as meal_id')
    ->groupBy('branches.id')
    ->get();

    return $branch;
}

function getDays($date){
    $branch = DB::table('menu_branches')
    ->join('branches' , 'branches.id' , 'menu_branches.branch_id')
    ->join('menu' , 'menu.id' , 'menu_branches.menu_meal_id')
    ->join('cart' , 'cart.meal_id' , 'menu.id')
    ->select('branches.branch_name_en' , DB::raw('count(cart.meal_id) AS orders') , DB::raw('sum(cart.quantity) AS quantityPercentage') , 'menu.id as meal_id')
    ->whereDate('cart.created_at' , '=' , $date)
    ->groupBy('branches.id')
    ->get();

    return $branch;
}
