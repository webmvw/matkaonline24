<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserListController extends Controller
{
    public function view(){
    	$data['allUser'] = User::where('role_id', '2')->orderBy('id', 'desc')->get();
        return view('admin.pages.user.view-userlist', $data);
    }
    
    public function active($id){
    	$active_user = user::find($id);
    	$active_user->status = 1;
    	$active_user->save();
    	return back()->with("success", "User Active Success");
    }

    public function suspend($id){
    	$suspend_user = user::find($id);
    	$suspend_user->status = 0;
    	$suspend_user->save();
    	return back()->with("success", "User Suspend Success");
    }


    public function edit($id){
        $getUser = user::find($id);
        return view('admin.pages.user.edit-userlist', compact('getUser'));
    }

    public function update(Request $request, $id){
        $getUser = user::find($id);
        $getUser->balance = $request->balance;
        $getUser->save();
        return back()->with("success", "User Balance update Success");
    }


}
