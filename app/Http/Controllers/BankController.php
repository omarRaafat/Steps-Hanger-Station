<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index(){
        $banks = Bank::all();
        return view('admin.banks.index' , compact('banks'));
    }

    public function edit($id){
        $banks = Bank::find($id);
        return view('admin.banks.edit' , compact('banks'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'IBAN' => 'required'
        ]);

        $banks = Bank::find($id);

        $banks->bank_name = $request->input('bank_name');
        $banks->account_number = $request->input('account_number');
        $banks->IBAN = $request->input('IBAN');

        $banks->save();
        return redirect()->route('banks.index');
    }
}
