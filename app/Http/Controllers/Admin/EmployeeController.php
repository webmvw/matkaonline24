<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    public function view(){
    	$data['allEmployee'] = User::where('role_id', '3')->orderBy('id', 'desc')->get();
        return view('admin.pages.employee.view-employee', $data);
    }

    public function add(){
    	return view('admin.pages.employee.add-employee');
    }

    public function store(Request $request){

        $request->validate([
        	'name' => 'required',
            'email' => 'required|unique:users',
        ]);

        // start insert Employee data in user model
        $user = new User;
        $code = rand(00000000, 99999999);
        $user->name = strip_tags($request->name);
        $user->email = strip_tags($request->email);
        $user->password = bcrypt($code);
        $user->code = $code;
        $user->role_id = '3';
        $user->status = '1';
        $user->save();
        // end insert Employee data in user model

        return redirect()->route('admin.employee.view')->with('success', 'Employee Registration Successfully!!');
    }


    public function delete($id){
    	$getEmployee = User::find($id);
    	$getEmployee->delete();
    	return redirect()->route('admin.employee.view')->with("success", "Employee deleted Successfully!!");
    }


}
