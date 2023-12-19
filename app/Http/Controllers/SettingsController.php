<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Page;
use App\Models\Restaurant;
use App\Models\Setting;
use App\Models\Slider;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isJson;

class SettingsController extends Controller
{
    public function index1(Request $request){

        if ($request->isMethod('POST')){

            $settings = Setting::first();
            $returned_days = json_decode($request->opening_days);
            if(!is_array($returned_days))
            $days =  explode("," , $request->opening_days);
            else
             $days = $returned_days;
            $request_array = $request->all();

             $request_array['opening_days'] = json_encode($days);
            if ($request->hasFile('logo')){
                $path  =  Storage::disk('s3')->put('assets',$request->file('logo'),'public');
                $request_array['logo'] = basename($path);
//                File::delete($setting/s->logo);
            }

            if ($request->hasFile('icon')){

                $path  =  Storage::disk('s3')->put('assets',$request->file('icon'),'public');
                $request_array['icon'] = basename($path);
//                File::delete($settings->icon);
            }

            if ($request->hasFile('header_logo')){

                $path  =  Storage::disk('s3')->put('assets',$request->file('header_logo'),'public');
                $request_array['header_logo'] = basename($path);
//                File::delete($settings->header_logo);
            }

            if ($request->hasFile('footer_logo')){
                $path  =  Storage::disk('s3')->put('assets',$request->file('footer_logo'),'public');
                $request_array['footer_logo'] = basename($path);
//                File::delete($settings->footer_logo);
            }

            $settings->update($request_array);
            return redirect()->back()->with('message' , 'success updated');
        }else{

            return view('admin.settings.index1' )->with(['settings' => Setting::select(['theme_colour','text_colour','logo','opening_days','opening_hours','location_ar','location_en'])->first()]);
        }
    }




    public function index2(Request $request){
        if ($request->isMethod('POST')){
            Setting::first()->update($request->all());
            return redirect()->back()->with('message' , 'success updated');
        }else{

            return view('admin.settings.index2' )->with(['settings' =>Setting::select(['email','phone','facebook','instagram','twitter','youtube'])->first()]);
        }
    }

    public function index3(Request $request){
        if ($request->isMethod('POST')){
            $settings = Setting::first();
            $request_array = $request->all();
            if ($request->hasFile('about_image')){
                $path  =  Storage::disk('s3')->put('assets',$request->file('about_image'),'public');
                $request_array['about_image'] = basename($path);
//                File::delete($settings->about_image);
            }
            $settings->update($request_array);
            return redirect()->back()->with('message' , 'success updated');
        }else{

            return view('admin.settings.index3' )->with(['settings' =>Setting::select(['id','restaurant_name_ar','restaurant_name_en','restaurant_description_ar','restaurant_description_en','about_image'])->first()]);
        }
    }

    public function slider(Request $request){
        if ($request->isMethod('POST')){
            $slider_ids = $request->id;
            $images = $request->file('image');


            $titles_ar = $request->title_ar;
            $titles_en = $request->title_en;
            $descriptions_ar = $request->description_ar;
            $descriptions_en = $request->description_en;



            if (Slider::count() == 0){

                foreach ($images as $key=>$image){
                    $path  =  Storage::disk('s3')->put('sliders',$image,'public');
                    $title_ar = $titles_ar[$key];
                    $title_en = $titles_en[$key];
                    $description_ar = $descriptions_ar[$key];
                    $description_en = $descriptions_en[$key];

                    Slider::create([
                        "image" => basename($path),
                        "title_ar" => $title_ar,
                        "title_en" => $title_en,
                        "description_ar" => $description_ar,
                        "description_en" => $description_en
                    ]);
                }
                return response()->json(['message' => 'success created !']);
            }else{
                foreach ($titles_ar as $key=>$title_ar){
                    $title_ar = $titles_ar[$key];
                    $title_en = $titles_en[$key];
                    $description_ar = $descriptions_ar[$key];
                    $description_en = $descriptions_en[$key];
                    $slider = Slider::find($slider_ids[$key]);
                    $slider->update([
                        "title_ar" => $title_ar,
                        "title_en" => $title_en,
                        "description_ar" => $description_ar,
                        "description_en" => $description_en
                    ]);
                }

                return response()->json(['message' => 'success updated !']);
            }




        }else{

            return view('admin.settings.slider' )->with(['sliders' =>Slider::latest()->get()]);
        }
    }

    public function sliderImageUploader(Request $request,$id){

        $path  =  Storage::disk('s3')->put('sliders', $request->file('single_image_'.$id),'public');
        $slider = Slider::find($id);
//        File::delete($slider->image);
        $slider->update([
            "image" =>basename($path)
        ]);
         return 1;

    }


    public function sectionImage(Request $request){
        if ($request->isMethod('POST')){
            $path  =  Storage::disk('s3')->put('images', $request->image,'public');

//            $path = Storage::disk('s3')->url($path);
//            return $path;
//            $path = $request->file('image')->store('images', 's3');


            $page = Page::find($request->section_id);
//            Storage::delete($page->image);
            $page->update([
                "image" =>basename($path)
            ]);
//            return $page->image;
//            return Storage::disk('s3')->get("https://steps-client-clowd-storage.s3-website-us-east-1.amazonaws.com/".$path);

//            return Storage::disk('s3')->response('images/'.$page->image);
            return redirect()->route('section')->with('message' , 'success updated');
        }else{

            return view('admin.settings.section_images' )->with(['sections' =>Page::latest()->get()]);
        }
    }

    public function sectionImageEdit($id){
        return view('admin.settings.section_image_update')->with('section' , Page::find($id));

    }


public function sectionCategory(Request $request , $id=null){
    if ($request->isMethod('POST')){

        $settings = Setting::first()->update($request->all());
        return response()->json(['message' => __('menu.category success updated') , 'cat_title_'.app()->getLocale().'_'.$id => Setting::value('cat_title_'.app()->getLocale().'_'.$id) ]);
    }else{

        return view('admin.settings.categories' )->with(['settings' =>Setting::first()->first()]);
    }
}

public function sectionCategoryCustom($cat_num){
        $switch = null;
        if (Setting::first()->value('cat_'.$cat_num) ==0){
            $switch = 1;
            $message = 'success added to List';
        }


        else{
            $switch = 0;
            $message = 'success removed from List';
        }

    Setting::first()->update(['cat_'.$cat_num => $switch ]);

    return response()->json(['message' => $message]);

}


}
