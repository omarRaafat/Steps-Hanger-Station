<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Notification;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $contacts = Contact::orderBy('id' , 'desc')->get();
        return view('admin.contacts.index' , ['contacts' => $contacts]);
    }

    public function edit($language , $id){
        $contacts = Contact::find($id);
        Notification::where('contact_id' , '=' , $id)->update(['viewed' => 1]);
        return view('admin.contacts.edit' , ['contacts' => $contacts , 'language' => $language]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'address' => 'required|max:255',
            'help' => 'required'
        ]);

        $contacts = Contact::find($request->id);
        $contacts->name = $request->input('name');
        $contacts->email = $request->input('email');
        $contacts->phone = $request->input('phone');
        $contacts->address = $request->input('address');
        $contacts->help = $request->input('help');

        $contacts->save();

        // return redirect()->route('contacts.index' , app()->getLocale());
        return response()->json($contacts);
    }

    public function delete($language , $id){
        $contacts = Contact::find($id);
        $contacts->delete();
        return redirect()->route('contacts.index' , app()->getLocale());
    }
}
