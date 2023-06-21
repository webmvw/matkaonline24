<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GameTime;
use App\Models\Game;
use App\Models\User;
use App\Models\Result;
use DB;
use Carbon\Carbon;

class ResultController extends Controller
{
    public function view(){
    	// $results = Result::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->get();
        $date = Carbon::now()->subDays(1);
        $results = Result::where('created_at', '>=', $date)->orderBy('id', 'desc')->get();
    	return view('employee.pages.result.view-result', compact('results'));
    }

    public function add(){
    	$data['GameTime'] = GameTime::all();
    	return view('employee.pages.result.add-result', $data);
    }

    public function store(Request $request){
    	$request->validate([
    		'bazar_name' => 'required',
    		'category' => 'required',
    		'number' => 'required',
    	]);

    	$result_count = count($request->category);
    	for($i=0;$i<$result_count;$i++){
            $result_date = Carbon::parse($request->result_date)
                             ->toDateTimeString();
    		$bazar_name = $request->bazar_name;
    		$category = $request->category[$i];
    		$number = $request->number[$i];

    		$win_users = Game::whereDate('created_at', $result_date)->where('game_time_id', $bazar_name)->where('category', $category)->where('number', $number)->orderBy('id', 'desc')->get();
    		foreach ($win_users as $key => $value) {
    			$win_user_id = $value->user_id;
    			$win_user_number = $value->number;
    			$win_user_point = $value->point;
    			if($category == 1){
    				$credit_rate = 9.5;
    			}elseif($category == 2){
    				$credit_rate = 130;
    			}elseif($category == 3){
    				$credit_rate = 260;
    			}elseif($category == 4){
    				$credit_rate = 700;
    			}elseif($category == 5){
    				$credit_rate = 95;
    			}
    			$win_user_credit_point = $win_user_point*$credit_rate;
    			DB::transaction(function() use($bazar_name, $category ,$win_user_id, $win_user_number, $win_user_point,$win_user_credit_point ){
    				// user credit balance
		    		$to_win_user = User::find($win_user_id);
		    		$to_win_user_new_balance = $to_win_user->balance+$win_user_credit_point;
		    		$to_win_user->balance = $to_win_user_new_balance;
		    		$to_win_user->save();

					// store result
					$result = new Result();
					$result->game_time_id = $bazar_name;
					$result->category = $category;
					$result->number = $win_user_number;
					$result->point = $win_user_point;
					$result->credit_point = $win_user_credit_point;
					$result->user_id = $win_user_id;
					$result->save();
				});
    		}
    	}
    	return redirect()->route('employee.result.view')->with('success', 'Result Entry Success');

    }


}
