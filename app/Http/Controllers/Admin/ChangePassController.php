<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class ChangePassController extends Controller
{
    public function CPassword(){
    	return view('admin.change_password');
    }

    public function UpdatePassword(Request $request){
    	$validateData = $request->validate([
    		'oldpassword' => 'required',
    		'password' => 'required|confirmed'
    	]);

    	$hashedPassword = Auth::user()->password;

    	if(Hash::check($request->oldpassword, $hashedPassword)){
    		$user = User::find(Auth::user()->id);
    		$user->password = Hash::make($request->password);
    		$user->save();
    		Auth::logout();
    		return redirect()->route('login')->with('success', 'Password is change successfuly!');
    	}else{
    		return redirect()->back()->with('error', 'Current password is Invalid!');
    	}
    }
}
