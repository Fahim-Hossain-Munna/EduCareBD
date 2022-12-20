<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PhpQuestion;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionMannageController extends Controller
{
    public function php_view($id){
        $category = Category::findOrFail($id);
        $related_data = PhpQuestion::where('subject_category_id' , $category->id)->latest()->get();

        return view('dashboard_files.phpquestionview', compact('related_data','category'));
    }
}
