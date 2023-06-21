<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Carbon\Carbon;

class GameController extends Controller
{
    public function view(){
    	// $data['allData'] = Game::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->get();
    	$date = Carbon::now()->subDays(1);
        $data['allData'] = Game::where('created_at', '>=', $date)->orderBy('id', 'desc')->get();
        return view('employee.pages.game.view-game', $data);
    }
}
