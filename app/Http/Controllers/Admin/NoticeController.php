<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function view(){
    	$notice = Notice::orderBy('id', 'desc')->first();
    	return view('admin.pages.notice.view-notice', compact('notice'));
    }

    public function update(Request $request, $id){
    	$request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

    	$notice = Notice::find($id);
    	$notice->title = strip_tags($request->title);
    	$notice->description = strip_tags($request->description);
    	$notice->save();
    	return redirect()->route('admin.notice.view')->with("success", "Notice updated Successfully!!");
    }
}
