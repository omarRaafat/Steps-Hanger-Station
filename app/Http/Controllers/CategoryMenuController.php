<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category_Branch;
use App\Models\Menu_Category;
use App\Models\Restaurant;
use App\Models\Restaurant_Category;
use DB;
use Illuminate\Http\Request;

class CategoryMenuController extends Controller
{
    public function index(){
        $category = Menu_Category::all();
        return view ('admin.category_menu.index' , ['category' => $category]);
    }

    public function create(){
        $branches = Branch::all();
        return view ('admin.category_menu.create' , ['branches' => $branches]);
    }

    public function store(Request $request){
        DB::transaction(function () use ($request) {
            $request->validate([
                'category_name_en' => 'required|max:255|unique:menu_category',
                'category_name_ar' => 'required|max:255|unique:menu_category',
                'branch_id' => 'required'
            ]);

            $category = new Menu_Category();
            $category->category_name_en = $request->input('category_name_en');
            $category->category_name_ar = $request->input('category_name_ar');

            $category->save();

            foreach($request->input('branch_id') as $res){
                Category_Branch::create([
                    'branch_id' => $res,
                    'menu_category_id' => $category->id
                ]);
            }
        });

        // return redirect()->route('category.index');
        return response()->json(['message' => 'Category Stored Successfully']);
    }

    public function edit($id){
        $category = Menu_Category::find($id);
        $branches = Branch::all();
        $branches_categories = Category_Branch::where('menu_category_id' , '=' , $id)->get();
        return view('admin.category_menu.edit' , ['category' => $category , 'branches' => $branches , 'branches_categories' => $branches_categories]);
    }

    public function update(Request $request , $id){
        DB::transaction(function () use ($request , $id) {
            $request->validate([
                'category_name_en' => 'required|max:255',
                'category_name_ar' => 'required|max:255',
                'branch_id' => 'required'
            ]);

            $category = Menu_Category::find($id);
            $category->category_name_en = $request->input('category_name_en');
            $category->category_name_ar = $request->input('category_name_ar');

            $category->save();

            if($request->has('branch_id')){
                Category_Branch::where('menu_category_id' , '=' , $id)->delete();
                foreach($request->input('branch_id') as $res){
                    Category_Branch::create([
                        'branch_id' => $res,
                        'menu_category_id' => $category->id
                    ]);
                }
            }
        });
        // return redirect()->route('category.index');
        return response()->json(['message' => 'Category Updated Successfully']);
    }

    public function delete($id){
        $category = Menu_Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
