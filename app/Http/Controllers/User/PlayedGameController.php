<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use Carbon\Carbon;

class PlayedGameController extends Controller
{
    public function view(){
    // 	$data['allData'] = Game::whereDate('created_at', Carbon::today())->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
    	$date = Carbon::now()->subDays(1);
        $data['allData'] = Game::where('created_at', '>=', $date)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.pages.played-game.played-game-view', $data);
    }
}
