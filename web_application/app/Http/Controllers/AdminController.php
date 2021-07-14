<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\User;

class AdminController extends Controller
{
    public function admin_page () {
    	return view('admin.adminpage');
    }
    public function new_device_page () {
    	return view('admin.admin_device');
    }
    public function post_new_device (Request $request) {
        for($i=1; $i<=10; $i++) {
            $device= new Device;
            $device->device_Id = $request->device_Id;
            $device->device_name = 'Switch';
            $device->pin_number = "$i";
            $device->pin_status = 'OFF';
            $device->active = false;
            $device->save();
        }
        return redirect()->back()->with('success','Device Added Successfully');
		
    }
    public function deleteUser() {
        return view('admin.delete_user');
    }
    public function delUser(Request $request) {
        $user = User::where('email', '=', $request->email)->first();
        if($user != NULL) {
            $devices = Device::where('user_Id', '=', $user->user_Id)->get();
            $user->delete();
            if($devices != NULL) {
                foreach ($devices as $device) {
                    $device->device_name = 'Switch';
                    $device->pin_status = 'OFF';
                    $device->user_Id = 'NULL';
                    $device->active = false;
                    $device->save();      
                }
            }
            return redirect()->back()->with('success', 'User Deleted Successfully');
        }
        else {
            return redirect()->back()->with('error', 'User Not Found');
        }
    }
    public function deleteDevice() {
        return view('admin.delete_device');
    }
    public function delDevice(Request $request) {
        $devices = Device::where('device_Id', '=', $request->device_Id)->get();
        if($devices != NULL) {
            foreach ($devices as $device) {
                $device->delete();
            }
            return redirect()->back()->with('success', 'Device Deleted');
        }
        else {
            return redirect()->back()->with('error', 'No Device Found');
        }
    }
}
