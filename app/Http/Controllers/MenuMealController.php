<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Meal_Image;
use App\Models\Menu_Branch;
use App\Models\Menu_Category;
use App\Models\Menu_Meal;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MenuMealController extends Controller
{
    public function index(){
        $meals = Menu_Meal::with('images')->get();
        QrCode::size(300)

            ->generate($_SERVER['HTTP_HOST'].'/menu' , public_path('/uploads/qrcode.svg'));
        return view('admin.menus.index' , ['meals' => $meals]);
    }

    public function create(){
        $category = Menu_Category::all();
        $branches = Branch::all();
        return view('admin.menus.create' , ['category' => $category , 'branches' => $branches]);
    }

    public function store(Request $request){
        // dd($request->all());
        DB::transaction(function () use ($request) {
            $request->validate([
                'meal_name_ar' => 'required|max:255',
                'meal_name_en' => 'required|max:255',
                'meal_description_en' => 'required',
                'meal_description_ar' => 'required',
                'meal_price' => 'required',
                'quantity_type' => 'required',
                'quantity' => 'required',
                'meal_images' => 'required|max:3',
                'meal_images.*' => 'image|mimes:jpg,png,jpeg|max:500000',
                'meal_category_id' => 'required',
                'branch_id' => 'required'
            ]);

            $meals = new Menu_Meal();
            $meals->meal_name_ar = $request->input('meal_name_ar');
            $meals->meal_name_en = $request->input('meal_name_en');
            $meals->meal_description_ar = $request->input('meal_description_ar');
            $meals->meal_description_en = $request->input('meal_description_en');
            $meals->meal_price = $request->input('meal_price');
            $meals->quantity_type = $request->input('quantity_type');
            $meals->quantity = $request->input('quantity');
            $meals->meal_category_id = $request->input('meal_category_id');
            $meals->sku_number = $request->input('sku_number');
            if($request->has('status')){
                $meals->status = $request->input('status');
            }else{
                $meals->status = 0;
            }
            $meals->save();

            if (is_array($request->file('meal_images')) || is_object($request->file('meal_images'))){
                foreach($request->file('meal_images') as $file){
                    $path = Storage::disk('s3')->put("meals" , $file ,'public');
//                    $destinationPath = public_path(). '/uploads/meals/';
//                    $filename = uniqid() . '.' .  $file->extension();
//                    $file->move($destinationPath, $filename);

                    Meal_Image::create([
                        'meal_images' => basename($path),
                        'menu_meal_id'=> $meals->id,
                    ]);
                    Menu_Meal::find($meals->id)->update(['meal_image' => basename($path)]);
                }
            }

            foreach($request->input('branch_id') as $res){
                Menu_Branch::create([
                    'branch_id' => $res,
                    'menu_meal_id' => $meals->id
                ]);
            }
        });
        // return redirect()->route('meals.index');
        return response()->json(['message' => 'Meal Stored Successfully']);
    }

    public function edit($id){
        $meals = Menu_Meal::find($id);
        $category = Menu_Category::all();
        $branches = Branch::all();
        $menu_branches = Menu_Branch::where('menu_meal_id' , '=' , $id)->get();
        $menu_images = Meal_Image::where('menu_meal_id' , '=' , $id)->get();
        return view('admin.menus.edit' , ['meals' => $meals , 'category' => $category , 'branches' => $branches , 'menu_branches' => $menu_branches , 'menu_images' => $menu_images]);
    }

    public function update(Request $request , $id){
        // dd($request->all());
        DB::transaction(function () use ($request , $id) {
            $request->validate([
                'meal_name_ar' => 'required|max:255',
                'meal_name_en' => 'required|max:255',
                'meal_description_en' => 'required',
                'meal_description_ar' => 'required',
                'meal_price' => 'required',
                'meal_images' => 'max:3',
                'meal_images.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500000',
                'quantity_type' => 'required',
                'meal_category_id' => 'required',
                'branch_id' => 'required'
            ]);

            $meals = Menu_Meal::find($id);
            $meals->meal_name_ar = $request->input('meal_name_ar');
            $meals->meal_name_en = $request->input('meal_name_en');
            $meals->meal_description_ar = $request->input('meal_description_ar');
            $meals->meal_description_en = $request->input('meal_description_en');
            $meals->meal_price = $request->input('meal_price');
            $meals->quantity_type = $request->input('quantity_type');
            $meals->quantity = $request->input('quantity')?$request->input('quantity'):$request->input('quantity_type');
            $meals->meal_category_id = $request->input('meal_category_id');
            $meals->sku_number = $request->input('sku_number');

            if($request->has('status')){
                $meals->status = $request->input('status');
            }
            $meals->save();

            if($request->has('meal_images')){

//                if (is_array($request->file('meal_images')) || is_object($request->file('meal_images'))){
//                    $imagesDeleted = Meal_Image::where('menu_meal_id' , '=' , $id)->get();
//                    foreach($imagesDeleted as $image){
//                        $file_path = public_path() . '/uploads/meals/' . $image->meal_images;
//                        unlink($file_path);
//                        $image->delete();
//                    }
                    foreach($request->file('meal_images') as $file){
                        $path = Storage::disk('s3')->put("meals" , $file ,'public');

                        Meal_Image::create([
                            'meal_images' => basename($path),
                            'menu_meal_id'=> $meals->id,
                        ]);
                        Menu_Meal::find($meals->id)->update(['meal_image' => basename($path)]);
                    }
                }
//            }

            if($request->has('branch_id')){
                Menu_Branch::where('menu_meal_id' , '=' , $id)->delete();
                foreach($request->input('branch_id') as $res){
                    Menu_Branch::create([
                        'branch_id' => $res,
                        'menu_meal_id' => $meals->id
                    ]);
                }
            }

        });
        // return redirect()->route('meals.index');
        return response()->json(['message' => 'Meal Updated Successfully']);

    }

    public function delete($id){
        $meals = Menu_Meal::find($id);
//        $imagesDeleted = Meal_Image::where('menu_meal_id' , '=' , $id)->get();
//        foreach($imagesDeleted as $image){
//            $file_path = public_path() . '/uploads/meals/' . $image->meal_images;
//            unlink($file_path);
//        }
        $meals->delete();
        return redirect()->route('meals.index');
    }
}
