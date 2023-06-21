<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use File;

class UserController extends Controller
{
    public function index(){
    	return view('user.index');
    }

    public function editProfile(){
    	return view('user.edit-profile');
    }

    public function updateProfile(Request $request){
    	$request->validate([
    		'address' => 'required',
    		'bank_account_number' => ['required', 'unique:users'],
    	]);

    	$user_id = Auth::user()->id;
    	$user = User::find($user_id);
    	$user->address = strip_tags($request->address);
    	$user->bank_account_number = strip_tags($request->bank_account_number);
        $user->profile_verified = 1;
    	$user->save();
    	return redirect()->route('user.dashboard')->with('success', 'Profile Update Successfully!!');
    }



}
