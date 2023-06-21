<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bazar;

class BazarController extends Controller
{
    public function view(){
        $data['allBazar'] = Bazar::orderBy('id', 'desc')->get();
        return view('admin.pages.bazar.view-bazar', $data);
    }

    public function add(){
        return view('admin.pages.bazar.add-bazar');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $data = Bazar::insert([
            'name' => strip_tags($request->name),
        ]);
        return redirect()->route('admin.bazar.view')->with('success', 'Bazar Added Success');
    }

    public function edit($id){
        $data['getBazar'] = Bazar::find($id);
        return view('admin.pages.bazar.edit-bazar', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

    	$getBazar = Bazar::find($id);
        $getBazar->name = strip_tags($request->name);
    	$getBazar->status = strip_tags($request->status);
    	$getBazar->save();
    	return redirect()->route('admin.bazar.view')->with("success", "Bazar updated Successfully!!");
    }

    public function delete($id){
    	$getBazar= Bazar::find($id);
    	$getBazar->delete();
    	return redirect()->route('admin.bazar.view')->with("success", "Bazar deleted Successfully!!");
    }
}
