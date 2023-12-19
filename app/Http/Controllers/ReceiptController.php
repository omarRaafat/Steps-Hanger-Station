<?php


namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\Loyality;
use App\Models\Order;

use App\Models\Setting;
use App\Models\User;
use App\Models\Vat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ReceiptController extends Controller
{


    public function pastOrderDetails($order_id){

        $order = Order::find($order_id);
        $orderDetails = Cart::whereIn('id' , json_decode($order->cart_ids))->get();
        $orderDetails->each(function ($orderDetail ) use (&$total_price){
            $orderDetail->name = $orderDetail->meal->mealName();
            $total_price += $orderDetail->total_prcie;
        });

        return $orderDetails;
    }


    public function receipt($order_id){

        $order = Order::find($order_id);
        if ($order){
            $order_invoice = Invoice::where('order_id' , $order_id)->first();
            $vat_value = $order->subtotal * $order_invoice->vat/100;
            $total_price_after_vat = $order->subtotal + $vat_value;
            if (Auth::guard('web')->check())
                $customer_phone = Auth::guard('web')->user()->phone;
            else
                $customer_phone = $order->user->phone;
            return view('receipt')->with([
                "order_id" => $order_id,
                "invoice_id" =>$order_invoice->id,
                "order_date" => $order->date,
                "order_time" => date('h:i' , strtotime($order->created_at)),
                "customer_phone" => $customer_phone,
                "total_price" => $order->subtotal ,
                "vat_value" => $vat_value,
                "vat" =>$order_invoice->vat,
                "total_price_after_vat" =>$order->total_after_tax,
                "orderDetails" => $this->pastOrderDetails($order_id),
                'receipt_logo' => Setting::value('logo'),
                "settings" => Setting::first(),
                'order_status' => $order->Status(),
                "loyality" => Loyality::first()
            ]);
        }else{
            return view('receipt_empty');
        }

    }


}
