<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('admin.contacts.index' , compact('contacts'));
    }

    public function show($id){
        $contacts = Contact::find($id);
        return view('admin.contacts.show' , compact('contacts'));
    }

    public function delete($id){
        Contact::find($id)->delete();
        return redirect()->route('contacts.index');
    }

}
