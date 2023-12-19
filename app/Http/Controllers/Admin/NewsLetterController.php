<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsLetter;

class NewsLetterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $newsletters = NewsLetter::all();
        return view('admin.newsletters.index' , ['newsletters' => $newsletters]);
    }

    public function edit($language , $id){
        $newsletters = NewsLetter::find($id);
        return view('admin.newsletters.edit' , ['language' => $language , 'newsletters' => $newsletters]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'email' => 'required|max:255|email',
        ]);

        $newsletters = NewsLetter::find($request->id);
        $newsletters->email = $request->input('email');

        $newsletters->save();

        // return redirect()->route('newsletters.index' , app()->getLocale());
        return response()->json($newsletters);
    }

    public function delete($language , $id){
        $newsletters = NewsLetter::find($id);
        $newsletters->delete();
        return redirect()->route('newsletters.index' , app()->getLocale());
    }
}
