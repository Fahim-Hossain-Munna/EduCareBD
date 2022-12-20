<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PhpQuestion;
use App\Models\StudentFeedback;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendMannageController extends Controller
{
    function index(){
        $categories = Category::all();
        $feedbacks = StudentFeedback::where('status','=', true)->get();
        return view('welcome' ,compact('categories','feedbacks'));
    }
    function registration_index(){
        return view('frontend_files.student_registration');
    }
    function contact(){
        return view('frontend_files.contact');
    }
    function service(){
        $categories = Category::all();
        return view('frontend_files.service', compact('categories'));
    }
    function service_details($id){
       $category = Category::findOrFail($id);
       $related_data = PhpQuestion::where('subject_category_id', $category->id)->get();

       return view('frontend_files.service_details', compact('related_data' , 'category'));
    }
}
