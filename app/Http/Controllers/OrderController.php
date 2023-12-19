<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use App\Http\Controllers\InvoiceController;

class OrderController extends Controller
{


    public function orders()
    {
        return view('admin.orders' , ["orders" => Order::latest()->paginate(10)]);
    }


  public function invoiceDetail($order_id){
      $invoices = Invoice::where('order_id' , $order_id)->first();
      $order = Order::find($order_id);
      $carts_data = array();
      foreach(json_decode($order->cart_ids) as $cart){

         array_push($carts_data , Cart::find($cart));
      }
      return view('admin.invoices.show' , compact('invoices' , 'carts_data'));
  }

  public function changeOrderStatus($status , $order_id){
        Order::find($order_id)->update(['status' => $status]);
        return redirect()->route('orders');
  }
}
