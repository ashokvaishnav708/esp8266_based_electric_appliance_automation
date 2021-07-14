<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Device;
use Response;
use File;

class ManagerController extends Controller
{
    public function user_page() {
    	return view('user.userpage');
    }
    public function user_device() {
    	return view('user.activate_device');
    }
    public function activate_user_device(Request $request) {
    	$devices = Device::where('device_Id', '=', $request->device_Id)->get();
    	if($devices->count() > 0) {
            $flag = 0;
            foreach ($devices as $device) {
                if($device->pin_number == $request->pin_number) {
            		$device->device_name = $request->device_name;
            		$device->user_Id = $request->user_Id;
            		$device->active = true;
            		$device->save();
                    $flag=1;	
                }
            }
            if($flag == 1)
                return redirect()->route('user')->with('success', 'Created Device');
            else 
                return redirect()->back()->with('error', 'Please Enter Valid Pin Number');
    	}
    	else {
    		return redirect()->back()->with('error', 'Please Enter Valid Device ID');
    	}
    }

    public function mydevice($device_Id) {
    	$devices = Device::where('device_Id', '=', $device_Id)->get();
        $statuses = [];
        $i=0;
        foreach ($devices as $device) {
            $statuses[$i] = $device->pin_number.":".$device->pin_status; 
            $i++;
        } 
        //return $statuses;
    	return view('user.status')->with('statuses', $statuses);
    }
    public function ajax($device_Id, $pin_number, $status) {
    	$device = Device::where([['device_Id', '=', $device_Id], ['pin_number', '=', $pin_number]])->first();
    	$device->pin_status = $status;
    	$device->save();
    	return Response::json();
    }
}
