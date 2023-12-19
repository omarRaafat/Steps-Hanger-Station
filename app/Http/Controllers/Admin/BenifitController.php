<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Benifit;

class BenifitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $benifits = Benifit::all();
        return view('admin.benifits.index' , ['benifits' => $benifits]);
    }

    public function create(){
        return view('admin.benifits.create');
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255'
        ]);

        $benifits = new Benifit();
        $benifits->title_ar = $request->input('title_ar');
        $benifits->title_en = $request->input('title_en');

        // $path = $request->file('image')->store('admin_images', 'public');
        // $benifits->image = $path;

            $file = $request->file('image');
            $destinationPath = public_path(). '/uploads/';
            $filename = uniqid() . '.' .  $file->extension();
            $file->move($destinationPath, $filename);
            $benifits->image = $filename;

        $benifits->save();

        // return redirect()->route('benifits.index' , app()->getLocale());
        return response()->json($benifits);
    }

    public function edit($language , $id){
        $benifits = Benifit::find($id);
        return view('admin.benifits.edit' , ['language' => $language , 'benifits' => $benifits]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,svg',
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255'
        ]);

        $benifits = Benifit::find($request->id);
        $benifits->title_ar = $request->input('title_ar');
        $benifits->title_en = $request->input('title_en');

        if($request->has('image')){
            unlink(public_path() . '/uploads/' . $benifits->image);
            $file = $request->file('image');
            $destinationPath = public_path(). '/uploads/';
            $filename = uniqid() . '.' .  $file->extension();
            $file->move($destinationPath, $filename);
            $benifits->image = $filename;
        }

        $benifits->save();

        // return redirect()->route('benifits.index' , app()->getLocale());
        return response()->json($benifits);
    }

    public function delete($language , $id){
        $benifits = Benifit::find($id);
        $file_path = public_path() . '/uploads/' . $benifits->image;
        $benifits->delete();
        unlink($file_path);
        return redirect()->route('benifits.index' , app()->getLocale());
    }
}
