<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SubService;
use Illuminate\Http\Request;

class SubServicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $sub_services = SubService::all();
        return view('admin.sub_services.index' , compact('sub_services'));
    }

    public function create(){
        return view('admin.sub_services.create');
    }

    public function store(Request $request){
        $request->validate([
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg'    
        ]);

        $sub_services = new SubService();
        $sub_services->title_ar = $request->input('title_ar');
        $sub_services->title_en = $request->input('title_en');

        $file = $request->file('image');
        $destinationPath = public_path(). '/uploads/';
        $filename = uniqid() . '.' .  $file->extension();
        $file->move($destinationPath, $filename);
        $sub_services->image = $filename;

        $sub_services->save();
        // return redirect()->route('admin.sub_services');
        return response()->json($sub_services);
    }

    public function edit($language , $id){
        $sub_services = SubService::find($id);
        return view('admin.sub_services.edit' , ['language' => $language , 'sub_services' => $sub_services]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
            'image' => 'image|mimes:png,jpg,jpeg,svg'
        ]);

        $sub_services = SubService::find($request->id);
        $sub_services->title_ar = $request->input('title_ar');
        $sub_services->title_en = $request->input('title_en');

        if($request->has('image')){
            unlink(public_path() . '/uploads/' . $sub_services->image);
            $file = $request->file('image');
            $destinationPath = public_path(). '/uploads/';
            $filename = uniqid() . '.' .  $file->extension();
            $file->move($destinationPath, $filename);
            $sub_services->image = $filename;
        }

        $sub_services->save();

        // return redirect()->route('benifits.index' , app()->getLocale());
        return response()->json($sub_services);
    }

    public function delete($language , $id){
        $sub_services = SubService::find($id);
        $file_path = public_path() . '/uploads/' . $sub_services->image;
        $sub_services->delete();
        unlink($file_path);
        return redirect()->route('sub_services.index' , app()->getLocale());
    }
}
