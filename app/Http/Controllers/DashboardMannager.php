<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminSuccessMail;
use App\Models\PhpQuestion;
use Image;

class DashboardMannager extends Controller
{
    function dashboard_index(){
        if(auth()->user()->role == 'student'){
            return view('welcome');
        }else{
            $admins = User::where('role' , 'admin')->paginate(2);
            $users = User::where('role' , 'student')->paginate(5);
            $categories = Category::paginate(6);
            return view('dashboard',compact('admins','users' , "categories"));
        }
    }
    function dashboard_admin_create(Request $request){
        $request->validate([
            '*' => 'required'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ,
            'created_at' => Carbon::now(),
            'role' => 'admin'
        ]);
        Mail::to($request->email)->send(new AdminSuccessMail($request->except('_token')));

        return back()->with('admin_create_msg' ,'Admin Created Successfully Done');
    }
    public function dashboard_user_remove($id){
        $remove_user = User::findOrFail($id);

        $remove_user->delete();

        return back()->with('user_remove_msg','User Remove Succesfully');
    }

    function profile_update(){
        return view('dashboard_files.profile');
    }
    function profile_update_info(Request $request){
        if($request->name){
            User::find(auth()->id())->update([
                'name' => $request->name,
                'created_at' => Carbon::now()
            ]);
            return back()->with('profile_update_info_success_msg' , 'Your User Name Update SuccessFully');
        }else{
            return back()->with('profile_update_info_empty_msg' , 'please fill your input first');
        }
        if($request->email){

            User::find(auth()->id())->update([
                'email' => $request->email,
                'created_at' => Carbon::now()
            ]);
            return back()->with('profile_update_info_success_msg' , 'Your Email Address Update SuccessFully');
        }else{
            return back()->with('profile_update_info_empty_msg' , 'please fill your input first');
        }
        if($request->address){

            User::find(auth()->id())->update([
                'address' => $request->address,
                'created_at' => Carbon::now()
            ]);
            return back()->with('profile_update_info_success_msg' , 'Your Home Address Update SuccessFully');
        }else{
            return back()->with('profile_update_info_empty_msg' , 'please fill your input first');
        }

    }
    function update_password(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        if(Hash::check($request->current_password , auth()->user()->password)){

            User::find(auth()->id())->update([
                'password' => bcrypt($request->password),
                'created_at' => Carbon::now()
            ]);
            return back()->with('profile_update_info_success_msg' , 'Your Password Update SuccessFully');

        }else{
            return back()->with('profile_update_info_empty_msg','Your given password does not match with old password');
        }
    }

    function update_image(Request $request){
        $request->validate([
            'user_photo' => 'required|image',
        ]);
            if(auth()->user()->user_photo){
                unlink(public_path('backend/uploads/user_photo/') . auth()->user()->user_photo);
            }else{

                $new_name = auth()->id().'_'.auth()->user()->name .'_'.Carbon::now()->format('d-m-Y').".".$request->file('user_photo')->getClientOriginalExtension();
                $img = Image::make($request->file('user_photo'))->resize(500, 500);
                $img->save(base_path('public/backend/uploads/user_photo/'. $new_name), 80, 'jpg');

                User::find(auth()->id())->update([
                    'user_photo' => $new_name,
                    'created_at' => Carbon::now()
                ]);
                return back()->with('profile_update_info_success_msg' , 'Your Photo Update SuccessFully');
            }
    }
    public function category_index(){
        $categories = Category::paginate(10);
        return view('dashboard_files.category',compact('categories'));
    }
}


