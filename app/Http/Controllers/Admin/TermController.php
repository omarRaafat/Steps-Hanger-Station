<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $terms = Term::all();
        return view('admin.terms.index' , compact('terms'));
    }

    public function edit($language , $id){
        $terms = Term::find($id);
        return view ('admin.terms.edit' , ['language' => $language , 'terms' => $terms]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'term_ar' => 'required',
            'term_en' => 'required'
        ]);

        $terms = Term::find($request->id);
        $terms->term_ar = $request->input('term_ar');
        $terms->term_en = $request->input('term_en');

        $terms->save();
        // return redirect()->route('terms.index' , app()->getLocale());
        return response()->json($terms);
    }

    public function delete($language , $id){
        $terms = Term::find($id);
        $terms->delete();
        return redirect()->route('terms.index' , app()->getLocale());
    }
}
