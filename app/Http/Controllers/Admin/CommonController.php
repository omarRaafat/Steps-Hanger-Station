<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Common;

class CommonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $common = Common::all();
        return view('admin.common.index' , ['common' => $common]);
    }

    public function create(){
        return view('admin.common.create');
    }

    public function store(Request $request){
        $request->validate([
            'question_ar' => 'required|max:255',
            'question_en' => 'required|max:255',
            'answer_ar' => 'required|max:255',
            'answer_en' => 'required|max:255',
        ]);

        $common = new Common();
        $common->question_ar = $request->input('question_ar');
        $common->question_en = $request->input('question_en');
        $common->answer_ar = $request->input('answer_ar');
        $common->answer_en = $request->input('answer_en');

        $common->save();

        // return redirect()->route('common.index' , app()->getLocale());
        return response()->json($common);
    }

    public function edit($language , $id){
        $common = Common::find($id);
        return view('admin.common.edit' , ['language' => $language , 'common' => $common]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'question_ar' => 'required|max:255',
            'question_en' => 'required|max:255',
            'answer_ar' => 'required|max:255',
            'answer_en' => 'required|max:255',
        ]);

        $common = Common::find($request->id);
        $common->question_ar = $request->input('question_ar');
        $common->question_en = $request->input('question_en');
        $common->answer_ar = $request->input('answer_ar');
        $common->answer_en = $request->input('answer_en');

        $common->save();

        // return redirect()->route('common.index' , app()->getLocale());
        return response()->json($common);
    }

    public function delete($language , $id){
        $common = Common::find($id);
        $common->delete();
        return redirect()->route('common.index' , app()->getLocale());
    }
}
