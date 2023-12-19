<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        $invoices = Invoice::with('orders')->get();
        return view('admin.invoices.index' , compact('invoices'));
    }

    public function show($id){
        $invoices = Invoice::with('orders')->where('id' , '=' , $id)->first();
        $invoicesWithCart = Invoice::with('orders')->where('id' , '=' , $id)->get();
        $carts_data = array();
        foreach($invoicesWithCart as $card){
            $cart_ids = json_decode($card->orders->cart_ids);
            for($i = 0 ; $i < count($cart_ids) ; $i++){
                $carts = Cart::find($cart_ids[$i]);
                array_push($carts_data , $carts);
            }
        }
        return view('admin.invoices.show' , compact('invoices' , 'carts_data'));
    }

    public function delete($id){
        Invoice::find($id)->delete();
        return redirect()->route('invoices.index');
    }
}
