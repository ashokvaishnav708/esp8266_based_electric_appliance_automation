<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Reminder;
use App\User;
use Mail;

class ForgetPasswordController extends Controller
{
    public function forgetpassword() {
    	return view('auth.forgetpassword'); 
    }
    public function postforgetpassword(Request $request) {
    	$user = User::whereEmail($request->email)->first();
    	if(count($user) == 0)
    	{
    		return redirect()->back()->with(['success' => 'Reset code has been sent to above Mail Id']);
    	}
    	$reminder = Reminder::exists($user) ?: Reminder::create($user);
    	$this->sendMail($user, $reminder->code);
    	return redirect()->back()->with(['success' => 'Reset code has been sent to above Mail Id']);
    }
    public function resetpassword($email, $resetCode) {
    	$user = User::whereEmail($email)->first();
    	if($user == NULL) {
    		abort(404);
    	}
	    if($reminder = Reminder::exists($user)) {
	   		if($resetCode == $reminder->code) {
	   			return view('auth.newpass');
	   		}
	   		else {
	   			return redirect('/');
	   		}
	   	}
	   	else {
	   		return redirct('/');
    	}
    	
    }
    public function postresetpassword(Request $request, $email, $resetCode) {
    	$this->validate($request, [
    		'password' => 'confirmed|required|min:5|max:10',
    		'password_confirmation' => 'required|min:5|max:10'
    		]);
    	$user = User::whereEmail($email)->first();
    	if($user == NULL) {
    		abort(404);
    	}
	    if($reminder = Reminder::exists($user)) {
	   		if($resetCode == $reminder->code) {
	   			Reminder::complete($user, $resetCode, $request->password);
	   			return redirect('login')->with('success', 'Please Login with Your New Password');
	   		}
	   		else { return 'A';
	   			//return redirect('/');
	   		}
	   	
	   	}
	   	else { return 'B';
	   		//return redirct('/');
    	}
    }
    private function sendMail($user, $code) {
    	Mail::send('admin.passwordreset', [ 'user' => $user, 'code' => $code ], function($message) use ($user) {
    		$message->to($user->email);
    		$message->subject("Hello $user->first_name, Reset Your Password");
    	});
    }
}
