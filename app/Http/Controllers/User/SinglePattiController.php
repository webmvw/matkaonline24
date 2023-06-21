<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use App\Models\GameTime;
use Auth;
use DB;
use Carbon\Carbon;

class SinglePattiController extends Controller
{
    public function view(){
    	return view('user.pages.single-patti.single-patti-view');
    }

    public function store(Request $request){
        
        $gameTime = GameTime::find($request->bazar);
        $current_time = Carbon::now();
        $close_time = Carbon::parse($gameTime->close_time);
        
    	if($request->bazar == null){
    		return redirect()->back()->with('error', 'Please Select Game Time!!');
    	}elseif($current_time > $close_time){
            return redirect()->back()->with('error', 'This game time out!!');
        }else{
    		$count_number = count($request->number);
    		$total_point = 0;
    		$user_current_balance = Auth::user()->balance;
    		for($i=0; $i<$count_number; $i++){
    			if($request->point[$i] != null){
    				$total_point = $total_point + $request->point[$i];
    			}
    		}
    		
    		if($total_point > $user_current_balance){
    			return redirect()->back()->with('error', 'Oops! You have no insufficient balance');
    		}else{
    			DB::transaction(function() use($count_number, $request, $user_current_balance, $total_point){
    				for($i=0; $i<$count_number; $i++){
		    			if($request->point[$i] != null){
		    				$game = new Game();
		    				$game->category = 2;
		    				$game->game_time_id = $request->bazar;
		    				$game->number = $request->number[$i];
		    				$game->point = $request->point[$i];
		    				$game->user_id = Auth::user()->id;
		    				$game->save();
		    			}
		    		}

		    		$user = User::find(Auth::user()->id);
		    		$user_new_balance = $user_current_balance-$total_point;
		    		$user->balance = $user_new_balance;
		    		$user->save();
    			});
	    		return redirect()->route('user.single_patti.view')->with("success", "Successfully Submited!!");
    		}
    	}
    }
}
