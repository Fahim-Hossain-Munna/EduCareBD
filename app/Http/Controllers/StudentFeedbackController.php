<?php

namespace App\Http\Controllers;

use App\Models\StudentFeedback;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StudentFeedbackController extends Controller
{
    public function student_feedback(Request $request){
        $request->validate([
            '*' => 'required',
            'photo' => 'required|image'
        ]);

        $new_name = auth()->user()->name . '_' . Carbon::now()->format('d-m-Y') . '.' . $request->file('photo')->getClientOriginalExtension();
        $img = Image::make($request->file('photo'))->resize(100, 100);
        $img->save(base_path('public/frontend/uploads/feedback_image/' . $new_name), 80, 'jpg');

        StudentFeedback::insert([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $new_name,
            'category' => $request->category,
            'comment' => $request->comment,
            'created_at' => Carbon::now()
        ]);
        return back()->with('feedback_send_msg' , 'Your Valueable Massage Recive Admin Successfully');
    }


    public function student_feedback_show(){

        $feedbacks = StudentFeedback::all();
        return view('dashboard_files.student_feedback_show',compact('feedbacks'));
    }

    public function student_feedback_active($id){
        $data = StudentFeedback::findOrFail($id);
        if($data->status == 0){
            $data->status = 1;
        }
        $data->save();

        return back()->with('feedback_active_msg' , 'Massage Actived Successfully Done');
    }
    public function student_feedback_reject($id){
        $data = StudentFeedback::findOrFail($id);
        if($data->status == 1){
            $data->status = 0;
        }
        $data->save();

        return back()->with('feedback_reject_msg' , 'Massage Deactived Successfully Done');
    }
    public function student_feedback_delete($id){
        $data = StudentFeedback::findOrFail($id);

        $data->delete();

        return back()->with('feedback_delete_msg' , 'Massage Delete Successfully Done');
    }
}
