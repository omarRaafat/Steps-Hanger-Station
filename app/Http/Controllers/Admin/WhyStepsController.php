<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WhySteps;

class WhyStepsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $why = WhySteps::all();
        return view('admin.why.index' , ['why' => $why]);
    }

    public function create(){
        return view('admin.why.create');
    }

    public function store(Request $request){
        $request->validate([
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
            'desc_ar' => 'required',
            'desc_en' => 'required'
        ]);

        $why = new WhySteps();
        $why->title_ar = $request->input('title_ar');
        $why->title_en = $request->input('title_en');
        $why->desc_ar = $request->input('desc_ar');
        $why->desc_en = $request->input('desc_en');
        

        $why->save();

        // return redirect()->route('why.index' , app()->getLocale());
        return response()->json($why);
    }

    public function edit($language , $id){
        $why = WhySteps::find($id);
        return view('admin.why.edit' , ['language' => $language , 'why' => $why]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
            'desc_ar' => 'required',
            'desc_en' => 'required'
        ]);

        $why = WhySteps::find($request->id);
        $why->title_ar = $request->input('title_ar');
        $why->title_en = $request->input('title_en');
        $why->desc_ar = $request->input('desc_ar');
        $why->desc_en = $request->input('desc_en');

        $why->save();

        // return redirect()->route('why.index' , app()->getLocale());
        return response()->json($why);
    }

    public function delete($language , $id){
        WhySteps::find($id)->delete();
        return redirect()->route('why.index' , app()->getLocale());
    }
}
