<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::all();
        return view('admin.coupons.index' , compact('coupons'));
    }

    public function create(){
        return view('admin.coupons.create');
    }

    public function store(Request $request){
        $request->validate([
            'coupon_code' => 'required|max:255',
            'coupon_discount' => 'required|max:255',
            'coupon_validity' => 'required',
            'coupon_type' => 'required',
            'fromDate' => 'required|date',
            'toDate' => 'required|date|after:fromDate'
        ]);

        $coupons = new Coupon();
        $coupons->coupon_code = $request->input('coupon_code');
        $coupons->coupon_discount = $request->input('coupon_discount');
        $coupons->coupon_validity = $request->input('coupon_validity');
        $coupons->coupon_type = $request->input('coupon_type');
        $coupons->fromDate = $request->input('fromDate');
        $coupons->toDate = $request->input('toDate');

        $coupons->save();
        // return redirect()->route('coupons.index');
        return response()->json($coupons);
    }

    public function edit($id){
        $coupons = Coupon::find($id);
        return view('admin.coupons.edit' , compact('coupons'));
    }

    public function update(Request $request , $id){
        // dd($request->all());
        $request->validate([
            'coupon_code' => 'required|max:255',
            'coupon_discount' => 'required|max:255',
            'coupon_validity' => 'required',
            'coupon_type' => 'required',
            'fromDate' => 'required|date',
            'toDate' => 'required|date|after:fromDate'
        ]);

        $coupons = Coupon::find($id);
        $coupons->coupon_code = $request->input('coupon_code');
        $coupons->coupon_discount = $request->input('coupon_discount');
        $coupons->coupon_validity = $request->input('coupon_validity');
        $coupons->coupon_type = $request->input('coupon_type');
        $coupons->fromDate = $request->input('fromDate');
        $coupons->toDate = $request->input('toDate');

        $coupons->save();
        // return redirect()->route('coupons.index');
        return response()->json($coupons);
    }

    public function delete($id){
        Coupon::find($id)->delete();
        return redirect()->route('coupons.index');
    }
}
