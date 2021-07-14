<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class welcomeController extends Controller
{
    public function main() {
    	if(Sentinel::check()) {
    		$slug = Sentinel::getUser()->roles()->first()->slug;
    		if($slug == "admin")
                return redirect('admin');
            else
                return redirect('user');
    	}
    	else {
    		return view('welcome');
    	}
    }
}
