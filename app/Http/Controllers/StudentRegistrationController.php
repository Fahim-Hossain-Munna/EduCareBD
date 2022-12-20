<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccessMail;

class StudentRegistrationController extends Controller
{
    function student_registration(Request $request){
        $request->validate([
            '*' => 'required',
        ]);
        User::insert([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role' => 'student',
            'created_at' => Carbon::now()
        ]);
        Mail::to($request->email)->send(new RegistrationSuccessMail($request->except('_token')));

        return back()->with('registration_success_msg' , 'Registration Successfully Complete');
    }
    function student_login(Request $request){
        $request->validate([
            '*' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index');
        }else{
            return abort(404);
        }
    }
}
