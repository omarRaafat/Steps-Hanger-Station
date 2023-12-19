<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Loyality;
use App\Models\User;
use Illuminate\Http\Request;

class LoyalityController extends Controller
{
    public function index(){
        $presents = Loyality::all();
        return view('admin.loyality.index' , compact('presents'));
    }

    public function create(){
        return view('admin.loyality.create');
    }

    public function store(Request $request){
        $request->validate([
            'loyality_No' => 'required',
            'icon' => 'required',
            'coupon_code' => 'required',
            'coupon_discount' => 'required'
        ]);

        $presents = new Loyality();
        $presents->loyality_No = $request->input('loyality_No');
        $presents->icon = $request->input('icon');
        $presents->coupon_code = $request->input('coupon_code');
        $presents->coupon_discount = $request->input('coupon_discount');

        $presents->save();
        return redirect()->route('loyality.index');
    }

    public function edit($id){
        $presents = Loyality::find($id);
        return view('admin.loyality.edit' , compact('presents'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'loyality_No' => 'required',
            'icon' => 'required',
            'coupon_discount' => 'required'
        ]);

        $presents = Loyality::find($id);
        $presents->loyality_No = $request->input('loyality_No');

        if($request->has('icon')){
            $presents->icon = $request->input('icon');
        }
        
        $presents->coupon_discount = $request->input('coupon_discount');

        $presents->save();
        return redirect()->route('loyality.index');
    }

    public function delete($id){
        Loyality::find($id)->delete();
        return redirect()->route('loyality.index');
    }
}
