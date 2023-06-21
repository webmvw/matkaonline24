<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GameTime;

class GameTimingController extends Controller
{
    public function view(){
        $data['allGameTime'] = GameTime::get();
        return view('user.pages.gametiming.view-gametiming', $data);
    }
}
