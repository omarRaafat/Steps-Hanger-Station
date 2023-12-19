<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PackagesServices;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $services = PackagesServices::paginate(10);
        return view('admin.services.index' , ['services' => $services]);
    }

    public function create(){
        return view('admin.services.create');
    }

    public function store(Request $request){
        $request->validate([
            'service_ar' => 'required|max:255',
            'service_en' => 'required|max:255',
        ]);

        $services = new PackagesServices();
        $services->service_ar = $request->input('service_ar');
        $services->service_en = $request->input('service_en');

        $services->save();

        // return redirect()->route('services.index' , app()->getLocale());
        return response()->json($services);
    }

    public function edit($language , $id){
        $services = PackagesServices::find($id);
        return view('admin.services.edit' , ['language' => $language , 'services' => $services]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'service_ar' => 'required|max:255',
            'service_en' => 'required|max:255',
        ]);

        $services = PackagesServices::find($request->id);
        $services->service_ar = $request->input('service_ar');
        $services->service_en = $request->input('service_en');

        $services->save();

        // return redirect()->route('services.index' , app()->getLocale());
        return response()->json($services);
    }

    public function delete($language , $id){
        PackagesServices::find($id)->delete();
        return redirect()->route('services.index' , app()->getLocale());
    }
}
