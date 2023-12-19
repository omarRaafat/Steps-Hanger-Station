<?php

namespace App\Http\Controllers;

use App\Models\Menu_Category;
use App\Models\Menu_Meal;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function GetMealsStatistics(){
        $meals = Menu_Meal::with('images')->get();
        return view('admin.reports.meals' , compact('meals'));
    }

    public function GetOrdersStatistics(){
        $orders = Order::all();
        return view('admin.reports.orders' , compact('orders'));
    }

    public function GetUsersStatistics(){
        $users = User::all();
        return view('admin.reports.users' , compact('users'));
    }

    //search Meals
    public function searchByName(Request $request){
        if($request->ajax()){
            $output="";
            $meals = Menu_Meal::with('images')
            ->where('meal_name_ar','LIKE','%'.$request->search."%")
            ->get();
            if(count($meals) > 0){
                foreach ($meals as $key => $meal) {
                $output.='<tr>'.
                    '<td>'.$meal->meal_name_ar.'</td>'.
                    '<td><img src="/uploads/'. $meal->images[0]->meal_images.'" alt="people"></td>'.
                    '<td>'.$meal->meal_price.'</td>'.
                    '<td>'.$meal->quantity.'</td>'.
                    '<td>'.$meal->carts->sum('quantity').'</td>'.
                    '<td>'.Menu_Category::find($meal->meal_category_id)->category_name_ar.'</td>'.
                    '<td>'.$meal->status.'</td>'.
                    '</tr>';
                }
                return Response($output);
            }else{
                $output = '<tr><td colspan="7" class="text-center">No Meals Here</td></tr>';
                return response()->json($output);
            }
        }
    }
    
    public function getSearchByDate(Request $request){
        if($request->ajax()){
            $output="";
            $meals = Menu_Meal::with('images')
            ->whereDate('created_at', '=' , $request->meal_date)
            ->get();
            if(count($meals) > 0){
                foreach ($meals as $key => $meal) {
                $output.='<tr>'.
                    '<td>'.$meal->meal_name_ar.'</td>'.
                    '<td><img src="/uploads/'. $meal->images[0]->meal_images.'" alt="people"></td>'.
                    '<td>'.$meal->meal_price.'</td>'.
                    '<td>'.$meal->quantity.'</td>'.
                    '<td>'.$meal->carts->sum('quantity').'</td>'.
                    '<td>'.Menu_Category::find($meal->meal_category_id)->category_name_ar.'</td>'.
                    '<td>'.$meal->status.'</td>'.
                    '</tr>';
                }
                return Response($output);
            }else{
                $output = '<tr><td colspan="7" class="text-center">No Meals Here</td></tr>';
                return response()->json($output);
            }
        }
    }

    //search orders
    public function getSearchByOrderDate(Request $request){
        if($request->ajax()){
            $output="";
            $orders = Order::where('date', '=' , $request->searchDate)
            ->get();
            if(count($orders) > 0){
                foreach ($orders as $key => $orders) {
                $output.='<tr>'.
                    '<td>'.$orders->id.'</td>'.
                    '<td>'.$orders->date.'</td>'.
                    '<td>'.$orders->subtotal.'</td>'.
                    '<td>'.$orders->total_after_tax.'</td>'.
                    '<td>'.User::find($orders->user_id)->username.'</td>'.
                    '<td>'.$orders->status.'</td>'.
                    '</tr>';
                }
                return Response($output);
            }else{
                $output = '<tr><td colspan="7" class="text-center">No Orders Here</td></tr>';
                return response()->json($output);
            }
        }
    }

    public function getSearchByOrderStatus(Request $request){
        if($request->ajax()){
            $output="";
            $orders = Order::where('status', '=' , $request->orderStatus)
            ->get();
            if(count($orders) > 0){
                foreach ($orders as $key => $orders) {
                $output.='<tr>'.
                    '<td>'.$orders->id.'</td>'.
                    '<td>'.$orders->date.'</td>'.
                    '<td>'.$orders->subtotal.'</td>'.
                    '<td>'.$orders->total_after_tax.'</td>'.
                    '<td>'.User::find($orders->user_id)->username.'</td>'.
                    '<td>'.$orders->status.'</td>'.
                    '</tr>';
                }
                return Response($output);
            }else{
                $output = '<tr><td colspan="7" class="text-center">No Orders Here</td></tr>';
                return response()->json($output);
            }
        }
    }

    //search username
    public function getSearchByUsername(Request $request){
        if($request->ajax()){
            $output="";
            $users = User::where('username','LIKE','%'.$request->search."%")
            ->get();
            if(count($users) > 0){
                foreach ($users as $key => $user) {
                $output.='<tr>'.
                    '<td>'.$user->username.'</td>'.
                    '<td>'.$user->email.'</td>'.
                    '<td>'.$user->phone.'</td>'.
                    '<td>'.$user->city.'</td>'.
                    '<td>'.$user->address.'</td>'.
                    '</tr>';
                }
                return Response($output);
            }else{
                $output = '<tr><td colspan="7" class="text-center">No Users Here</td></tr>';
                return response()->json($output);
            }
        }
    }

    public function getSearchByUserDate(Request $request){
        if($request->ajax()){
            $output="";
            $users = User::whereDate('created_at', '=' , $request->order_date)
            ->get();
            if(count($users) > 0){
                foreach ($users as $key => $user) {
                $output.='<tr>'.
                    '<td>'.$user->username.'</td>'.
                    '<td>'.$user->email.'</td>'.
                    '<td>'.$user->phone.'</td>'.
                    '<td>'.$user->city.'</td>'.
                    '<td>'.$user->address.'</td>'.
                    '</tr>';
                }
                return Response($output);
            }else{
                $output = '<tr><td colspan="7" class="text-center">No Users Here</td></tr>';
                return response()->json($output);
            }
        }
    }
}
