<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPanelController extends Controller
{
    public function index(){
        $admins = Admin::all();
        return view('admin.admins.index' , ['admins' => $admins]);
    }

    public function create(){
        return view('admin.admins.create');
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|max:255|email|unique:admins',
            'password' => 'required|min:8'
        ],
        [
            'password.min' => 'The password must be at least 8 characters or numbers.'
        ]);

        $admins = new Admin();
        $admins->username = $request->input('username');
        $admins->email = $request->input('email');
        $admins->password = Hash::make($request->input('password'));

        $admins->save();
        // return redirect()->route('admins.index');
        return response()->json($admins);
    }

    public function edit($id){
        $admins = Admin::find($id);
        return view('admin.admins.edit' , ['admins' => $admins]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|min:8'
        ],
        [
            'password.min' => 'The password must be at least 8 characters or numbers.'
        ]);

        $admins = Admin::find($id);
        $admins->username = $request->input('username');
        $admins->email = $request->input('email');
        $admins->password = Hash::make($request->input('password'));

        $admins->save();
        return redirect()->route('admins.index');
    }

    public function delete($id){
        Admin::find($id)->delete();
        return redirect()->route('admins.index');
    }
}
