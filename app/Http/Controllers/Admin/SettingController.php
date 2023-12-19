<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Routing\RedirectController;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $settings = Setting::all();
        return view('admin.settings.index' , ['settings' => $settings]);
    }

    public function edit($language , $id){
        $settings = Setting::find($id);
        return view('admin.settings.edit' , ['language' => $language , 'settings' => $settings]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'breif_ar' => 'required',
            'breif_en' => 'required',
            'about_us_ar' => 'required',
            'about_us_en' => 'required',
            'about_us_image' => 'image|mimes:png,jpg,jpeg,svg',
            'why_steps_image' => 'image|mimes:png,jpg,jpeg,svg',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'address' => 'required|max:255',
            'twitter' => 'required|max:255',
            'facebook' => 'required|max:255',
            'instagram' => 'required|max:255'
        ]);

        $settings = Setting::find($request->id);

        $settings->breif_ar = $request->input('breif_ar');
        $settings->breif_en = $request->input('breif_en');
        $settings->about_us_ar = $request->input('about_us_ar');
        $settings->about_us_en = $request->input('about_us_en');

        if($request->has('about_us_image')){
            unlink(public_path() . '/uploads/' . $settings->about_us_image);
            $file = $request->file('about_us_image');
            $destinationPath = public_path(). '/uploads/';
            $filename = uniqid() . '.' .  $file->extension();
            $file->move($destinationPath, $filename);
            $settings->about_us_image = $filename;
        }

        if($request->has('why_steps_image')){
            unlink(public_path() . '/uploads/' . $settings->why_steps_image);
            $file = $request->file('why_steps_image');
            $destinationPath = public_path(). '/uploads/';
            $filename = uniqid() . '.' .  $file->extension();
            $file->move($destinationPath, $filename);
            $settings->why_steps_image = $filename;
        }

        $settings->email = $request->input('email');
        $settings->phone = $request->input('phone');
        $settings->address = $request->input('address');
        $settings->twitter = $request->input('twitter');
        $settings->facebook = $request->input('facebook');
        $settings->instagram = $request->input('instagram');

        $settings->save();

        // return redirect()->route('settings.index' , app()->getLocale());
        return response()->json($settings);
    }
}
