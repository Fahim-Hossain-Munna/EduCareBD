<?php

namespace App\Http\Controllers;

use App\Models\StudentComment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentCommentController extends Controller
{
    public function contact_submit(Request $request){
        $request->validate([
            '*' => 'required'
        ]);
        StudentComment::insert([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('info_success_msg' , 'Thank Your sir , For Your Valueable Comment');

    }

    public function comment_view(){
        $comments = StudentComment::all();
        return view('dashboard_files.student_comment_show',compact('comments'));
    }
    public function comment_active($id){
        $data = StudentComment::findOrFail($id);
            if($data->status == 0){
                $data->status = 1;
            }
            $data->save();
            return back()->with('comment_active_msg' , 'Comment Successfully Actived');
    }
    public function comment_reject($id){
        $data = StudentComment::findOrFail($id);
            if($data->status == 1){
                $data->status = 0;
            }
            $data->save();
            return back()->with('comment_reject_msg' , 'Comment Successfully Deactived');
    }
    public function comment_delete($id){
        $data = StudentComment::findOrFail($id);
        $data->delete();
        return back()->with('comment_delete_msg' , 'Comment Successfully deleted');
    }

}
