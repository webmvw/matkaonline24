<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GameCategory;

class GameRateController extends Controller
{
    public function view(){
        $data['allGameCategory'] = GameCategory::orderBy('id', 'asc')->get();
        return view('user.pages.gamerate.view-gamerate', $data);
    }
}
