<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function view(){
    	$whatsapp = Settings::orderBy('id', 'desc')->first();
    	return view('admin.pages.whatsapp.view-whatsapp', compact('whatsapp'));
    }

    public function update(Request $request, $id){
    	$request->validate([
            'whatsapp' => 'required',
        ]);

    	$getSettings = Settings::find($id);
    	$getSettings->whatsapp = strip_tags($request->whatsapp);
        $getSettings->withdraw_status = strip_tags($request->withdraw_status);
    	$getSettings->save();
    	return redirect()->route('admin.settings.view')->with("success", "Whatsapp updated Successfully!!");
    }
}
