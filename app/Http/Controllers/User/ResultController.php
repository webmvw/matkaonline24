<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bazar;

class ResultController extends Controller
{
    public function view(){
    	$bazars = Bazar::orderBy('id', 'desc')->get();
    	return view('user.pages.result.view-result', compact('bazars'));
    }
}
