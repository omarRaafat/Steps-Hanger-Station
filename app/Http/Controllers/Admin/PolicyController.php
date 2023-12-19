<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $policies = Policy::all();
        return view('admin.policies.index' , compact('policies'));
    }

    public function edit($language , $id){
        $policies = Policy::find($id);
        return view ('admin.policies.edit' , ['language' => $language , 'policies' => $policies]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'policy_ar' => 'required',
            'policy_en' => 'required'
        ]);

        $policies = Policy::find($request->id);
        $policies->policy_ar = $request->input('policy_ar');
        $policies->policy_en = $request->input('policy_en');

        $policies->save();
        // return redirect()->route('policies.index' , app()->getLocale());
        return response()->json($policies);
    }

    public function delete($language , $id){
        $policies = Policy::find($id);
        $policies->delete();
        return redirect()->route('policies.index' , app()->getLocale());
    }
}
