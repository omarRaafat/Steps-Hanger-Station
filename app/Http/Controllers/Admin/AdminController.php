<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Notification;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin.home');
    }

    public function getAdmins(){
        $allAdmins = Admin::all();
        return view('admin.admins.index' , ['allAdmins' => $allAdmins]);
    }

    public function create(){
        return view('admin.admins.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email"unique:admins',
            'password' => 'required|min:8'
        ]);

        $admins = new Admin();
        $admins->name = $request->input('name');
        $admins->email = $request->input('email');
        $admins->password = Hash::make($request->input('password'));

        $admins->save();

        // return redirect()->route('admin.getAdmins' , app()->getLocale());
        return response()->json($admins);
    }

    public function edit($language , $id){
        $admins = Admin::find($id);
        return view('admin.admins.edit' , ['admins' => $admins , 'language' => $language]);
    }

    public function update(Request $request , $id){
        // dd($request->id);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $admins = Admin::find($request->id);
        $admins->name = $request->input('name');
        $admins->email = $request->input('email');
        $admins->password = Hash::make($request->input('password'));

        $admins->save();

        // return redirect()->route('admin.getAdmins' , app()->getLocale());
        return response()->json($admins);
    }
}
