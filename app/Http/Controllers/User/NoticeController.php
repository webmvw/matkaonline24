<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function view(){
    	$notice = Notice::orderBy('id', 'desc')->first();
    	return view('user.pages.notice.view-notice', compact('notice'));
    }
}
