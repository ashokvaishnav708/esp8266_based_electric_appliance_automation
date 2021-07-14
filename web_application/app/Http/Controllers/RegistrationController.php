<?php

namespace App\Http\Controllers;
use Faker\Factory;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use Mail;
use App\User;

class RegistrationController extends Controller
{
    public function register() {
       if(User::all()->count() > 0) {
            $id=User::orderBy('id', 'desc')->first()->id+1;
        }
        else {
            $id = 1;
        }
        $faker = Factory::create();
        $user_id = $faker->unique()->bothify('??##').$id.$faker->unique()->bothify('??##');
    	return view('auth.register')->with('user_id', $user_id); 
    }

    public function postregister(Request $request) {
    	$user = Sentinel::register($request->all());
    	$activation = Activation::create($user);
    	$role = Sentinel::findRoleBySlug('user');
    	$role->users()->attach($user);
    	$this->sendMail($user, $activation->code);
    	return redirect('/')->with('success','Activation Mail has been sent.');
    }
    private function sendMail($user, $code) {
    	Mail::send('admin.email', [ 'user' => $user, 'code' => $code ], function($message) use ($user) {
    		$message->to($user->email);
    		$message->subject("Hello $user->first_name, Activate Your Account");
    	});
    }
}
