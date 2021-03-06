<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Activation;
use App\User;
use Sentinel;

class ActivationController extends Controller
{
    public function activate($email, $activationCode) {
    	$user = User::whereEmail($email)->first();
    	$sentinelUser = Sentinel::findById($user->id);
    	if(Activation::complete($sentinelUser, $activationCode)) {
    		return redirect('/login');
    	}
    	else {

    	}
    }
}
