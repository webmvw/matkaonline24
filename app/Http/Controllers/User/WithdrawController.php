<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WithdrawController extends Controller
{
    public function view(){
        $data['allWithdraw'] = Withdraw::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.pages.withdraw.view-withdraw', $data);
    }

    public function add(){
        return view('user.pages.withdraw.add-withdraw');
    }

    public function store(Request $request){
    	$request->validate([
    		'withdraw_amount' => 'required|numeric|integer|min:1000|max:10000',
            'payment_method' => 'required',
    	]);

        
        $withdraw_amount = $request->withdraw_amount;

        $getUserWithdrawHistory = Withdraw::whereDate('created_at', Carbon::today())->where('user_id', Auth::user()->id)->sum('withdraw_amount');

        $getUser = User::find(Auth::user()->id);
        $balance = $getUser->balance;
        $bank_account = $getUser->bank_account_number;

        if($bank_account == null){
            return back()->with("error", "Your Bank account not added");
        }elseif($balance == null || $balance == 0){
            return back()->with("error", "Insufficience Balance");
        }elseif($withdraw_amount > $balance){
            return back()->with("error", "You have made more withdrawal requests than your balance");
        }elseif($getUserWithdrawHistory > 10000){
            return back()->with("error", "You cannot make a maximum withdrawal request of 10000 in one day");
        }else{
        	DB::transaction(function() use($request){
        		// withdraw request
        		$withdraw = new Withdraw();
    	    	$withdraw->withdraw_amount = strip_tags($request->withdraw_amount);
                $withdraw->payment_method = strip_tags($request->payment_method);
    	    	$withdraw->status = "Pending";
    	    	$withdraw->user_id = Auth::user()->id;
    	    	$withdraw->save();

        		// adjust user balance
        		$getUser = User::find(Auth::user()->id);
        		$newBalance = $getUser->balance - $request->withdraw_amount;
        		$getUser->balance = $newBalance;
        		$getUser->save();

        	});
        	return redirect()->route('user.withdraw.view')->with('success', 'We receive your withdraw request');
        }
    }

}
