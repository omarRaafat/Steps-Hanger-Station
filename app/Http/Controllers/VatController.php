<?php

namespace App\Http\Controllers;

use App\Models\Vat;
use Illuminate\Http\Request;

class VatController extends Controller
{
    public function index(){
        $vats = Vat::all();
        return view('admin.vats.index' , compact('vats'));
    }

    public function edit($id){
        $vats = Vat::find($id);
        return view('admin.vats.edit' , compact('vats'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'vat_number' => 'required|max:255',
            'value' => 'required|max:255'
        ]);

        $vats = Vat::find($id);
        $vats->vat_number = $request->input('vat_number');
        $vats->value = $request->input('value');
        
        $vats->save();
        return redirect()->route('vats.index');
    }
}
