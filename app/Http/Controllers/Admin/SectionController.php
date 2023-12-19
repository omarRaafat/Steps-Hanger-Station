<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $sections = Section::all();
        return view('admin.sections.index' , compact('sections'));
    }

    public function create(){
        return view('admin.sections.create');
    }

    public function store(Request $request){
        $request->validate([
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
            'desc_ar' => 'required',
            'desc_en' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg'   
        ]);

        $sections = new Section();
        $sections->title_ar = $request->input('title_ar');
        $sections->title_en = $request->input('title_en');
        $sections->desc_ar = $request->input('desc_ar');
        $sections->desc_en = $request->input('desc_en');

        $file = $request->file('image');
        $destinationPath = public_path(). '/uploads/';
        $filename = uniqid() . '.' .  $file->extension();
        $file->move($destinationPath, $filename);
        $sections->image = $filename;

        $sections->save();
        // return redirect()->route('admin.sections');
        return response()->json($sections);
    }

    public function edit($language , $id){
        $sections = Section::find($id);
        return view('admin.sections.edit' , ['language' => $language , 'sections' => $sections]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
            'desc_ar' => 'required',
            'desc_en' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg'   
        ]);

        $sections = Section::find($request->id);
        $sections->title_ar = $request->input('title_ar');
        $sections->title_en = $request->input('title_en');
        $sections->desc_ar = $request->input('desc_ar');
        $sections->desc_en = $request->input('desc_en');

        if($request->has('image')){
            unlink(public_path() . '/uploads/' . $sections->image);
            $file = $request->file('image');
            $destinationPath = public_path(). '/uploads/';
            $filename = uniqid() . '.' .  $file->extension();
            $file->move($destinationPath, $filename);
            $sections->image = $filename;
        }

        $sections->save();

        // return redirect()->route('sections.index' , app()->getLocale());
        return response()->json($sections);
    }

    public function delete($language , $id){
        $sections = Section::find($id);
        $file_path = public_path() . '/uploads/' . $sections->image;
        $sections->delete();
        unlink($file_path);
        return redirect()->route('sections.index' , app()->getLocale());
    }
}
