<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public function login() {
    	return view('auth.login');
    }
    public function postlogin(Request $request) {
        try{
            $rememberMe = false;
            if(isset($request->remember_me))
                $rememberMe = true;
        	if(Sentinel::authenticate($request->all(), $rememberMe))
            {
                $slug = Sentinel::getUser()->roles()->first()->slug;
                if($slug == "admin")
                    return redirect('admin');
                else
                    return redirect('user');
            }
            else 
            {
                $error = 'Wrong Credentials';
                return redirect()->back()->with(['error' => $error]);
            }
        }
        catch (ThrottlingException $e){
            $delay = $e->getDelay();
            $error = 'You are banned for '.$delay.' Seconds';
            return redirect()->back()->with(['error' => $error]);
        }
        catch (NotActivatedException $e) {
            $error = 'Your Account is not Activated Yet';
            return redirect()->back()->with(['error' => $error]);
        }

    	
    }
    public function logout()
    {
    	Sentinel::logout();
    	return redirect('login');
    }
}
