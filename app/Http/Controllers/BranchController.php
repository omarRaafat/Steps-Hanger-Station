<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(){
        $branches = Branch::all();
        return view('admin.branches.index' , compact('branches'));
    }

    public function create(){
        return view('admin.branches.create');
    }

    public function store(Request $request){
        $request->validate([
            'branch_name_ar' => 'required|max:255',
            'branch_name_en' => 'required|max:255',
            'branch_description_ar' => 'required',
            'branch_description_en' => 'required',
            'country' => 'required',
            'city' => 'required',
            'branch_location' => 'required',
            'working_hours_from' => 'required',
            'working_hours_to' => 'required|after:working_hours_from',
            'working_days' => 'required',
        ]);

        $branches = new Branch();
        $branches->branch_name_ar = $request->input('branch_name_ar');
        $branches->branch_name_en = $request->input('branch_name_en');
        $branches->branch_description_ar = $request->input('branch_description_ar');
        $branches->branch_description_en = $request->input('branch_description_en');
        $branches->country = $request->input('country');
        $branches->city = $request->input('city');
        $branches->branch_location = $request->input('branch_location');
        $branches->working_hours_from = $request->input('working_hours_from');
        $branches->working_hours_to = $request->input('working_hours_to');
        $branches->working_days = $request->input('working_days');

        $branches->save();
        return redirect()->route('branches.index');
    }

    public function edit($id){
        $branches = Branch::find($id);
        return view('admin.branches.edit' , compact('branches'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'branch_name_ar' => 'required|max:255',
            'branch_name_en' => 'required|max:255',
            'branch_description_ar' => 'required',
            'branch_description_en' => 'required',
            'country' => 'required',
            'city' => 'required',
            'branch_location' => 'required',
            'working_hours_from' => 'required',
            'working_hours_to' => 'required|after:working_hours_from',
            'working_days' => 'required',
        ]);

        $branches = Branch::find($id);
        $branches->branch_name_ar = $request->input('branch_name_ar');
        $branches->branch_name_en = $request->input('branch_name_en');
        $branches->branch_description_ar = $request->input('branch_description_ar');
        $branches->branch_description_en = $request->input('branch_description_en');
        $branches->country = $request->input('country');
        $branches->city = $request->input('city');
        $branches->branch_location = $request->input('branch_location');
        $branches->working_hours_from = $request->input('working_hours_from');
        $branches->working_hours_to = $request->input('working_hours_to');
        $branches->working_days = $request->input('working_days');

        $branches->save();
        return redirect()->route('branches.index');
    }

    public function delete($id){
        Branch::find($id)->delete();
        return redirect()->route('branches.index');
    }
}
