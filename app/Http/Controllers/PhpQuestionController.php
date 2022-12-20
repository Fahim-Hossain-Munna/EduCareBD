<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PhpQuestion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PhpQuestionController extends Controller
{
    public function php(){
        $questions = PhpQuestion::paginate(20);
        $categories = Category::get(['id' , 'category_name']);
        return view('dashboard_files.php_questions.index' , compact('categories' , 'questions'));
    }
    public function php_insert(Request $request){
        $request->validate([
            '*' => 'required',
        ]);
        PhpQuestion::insert([
            'user_id' => auth()->id(),
            'Subject_name' => $request->subject_name,
            'subject_category_id' => $request->subject_category_id,
            'subject_question' => $request->subject_question,
            'subject_ans' => $request->subject_ans,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('questions_insert_msg' , 'Your Question Insert Database Successfull');
    }
    public function php_delete($id){
        $questions_delete = PhpQuestion::findOrFail($id);
        $questions_delete->delete();
        return back()->with('questions_delete_msg' , 'Your Question Delete Successfull');
    }
    public function php_edit_view($id){
        $questions_edit = PhpQuestion::findOrFail($id);
        $categories = Category::get(['id' , 'category_name']);
        return view('dashboard_files.php_questions.edit' , compact('questions_edit' , 'categories'));
    }
    public function php_edit(Request $request,$id){
        $request->validate([
            '*' => 'required'
        ]);

        PhpQuestion::find($id)->update([
            'user_id' => auth()->id(),
            'Subject_name' => $request->subject_name,
            'subject_category_id' => $request->subject_category_id,
            'subject_question' => $request->subject_question,
            'subject_ans' => $request->subject_ans,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('php.question.view')->with('questions_update_msg' , 'Your Question Update Database Successfull');

    }
}
