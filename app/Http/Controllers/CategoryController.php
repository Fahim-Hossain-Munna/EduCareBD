<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function category_insert(Request $request){
        $request->validate([
            'category_name' => 'required',
            'category_picture' => 'required|image',
            'category_description' => 'required'
        ]);
        $new_name = auth()->user()->name.'_'.$request->category_name.'_'. Carbon::now()->format('d-m-Y') . '.' .$request->file('category_picture')->getClientOriginalExtension();
        $img = Image::make($request->file('category_picture'))->resize(1024, 538);
        $img->save(base_path('public/backend/uploads/category_photo/' . $new_name), 80, 'jpg');
        Category::insert([
            'user_id' => auth()->id(),
            'category_name' => $request->category_name,
            'category_picture' => $new_name,
            'category_description' => $request->category_description,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('category_upload_msg' , 'Category upload Successfully');
    }

    public function category_edit($id){
        $edits_data = Category::findOrFail($id);
        return view('dashboard_files.category_edit',compact('edits_data'));
    }
    public function category_edit_post(Request $request , $id){
        if($request->category_name){
            Category::findOrFail($id)->update([
                'category_name' => $request->category_name,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('category.index')->with('category_file__name_update' , 'Cetegory Name Update Successfully');
        }
        if($request->category_description){
            Category::findOrFail($id)->update([
                'category_description' => $request->category_description,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('category.index')->with('category_file_description_update' , 'Cetegory Description Update Successfully');
        }

        if($request->file('category_picture')){
            $delete_image = Category::findOrFail($id);
            unlink(public_path('backend/uploads/category_photo/'. $delete_image->category_picture));
            $new_name = auth()->user()->name.'_'.$request->category_name.'_'. Carbon::now()->format('d-m-Y') . '.' .$request->file('category_picture')->getClientOriginalExtension();
            $img = Image::make($request->file('category_picture'))->resize(1024, 538);
            $img->save(base_path('public/backend/uploads/category_photo/' . $new_name), 80, 'jpg');
            Category::findOrFail($id)->update([
                'category_picture' => $new_name,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('category.index')->with('category_file_image_update' , 'Cetegory Photo Update Successfully');
        }else{
           return redirect()->route('category.index')->with('category_file_not_uploaded' , 'Sorry Please Select Images!');
        }
    }

    public function category_delete_post($id){
        $find_id = Category::findOrFail($id);

        $find_id->delete();

        return back()->with('category_file_delete', 'Category Delete Successfully');
    }
}
