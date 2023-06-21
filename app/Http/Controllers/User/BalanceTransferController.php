<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BalanceTransfer;
use Auth;
use DB;

class BalanceTransferController extends Controller
{
    public function view(){
    	$data['AllUser'] = User::where('role_id', '2')->orderBy('id', 'desc')->get();
    	return view('user.pages.balance-transfer.view-balance-transfer', $data);
    }

    public function history(){
    	$data['allData'] = BalanceTransfer::where('from_user', Auth::user()->id)->orderBy('id', 'desc')->get();
    	return view('user.pages.balance-transfer.balance-transfer-history', $data);
    }

    public function receive(){
    	$data['allData'] = BalanceTransfer::where('to_user', Auth::user()->id)->orderBy('id', 'desc')->get();
    	return view('user.pages.balance-transfer.balance-receive-history', $data);
    }

    public function store(Request $request){
    	$request->validate([
    		'amount' => 'required',
    		'to_user' => 'required',
    	]);

    	$transfer_balance = $request->amount;
    	$user_current_balance = Auth::user()->balance;

    	if($transfer_balance > $user_current_balance){
			return redirect()->back()->with('error', 'Oops! You have no insufficient balance');
		}else{
			DB::transaction(function() use($request, $transfer_balance, $user_current_balance){
				// store transfer balance
				$balance_transfer = new BalanceTransfer();
				$balance_transfer->from_user = Auth::user()->id;
				$balance_transfer->to_user = $request->to_user;
				$balance_transfer->amount = $request->amount;
				$balance_transfer->save();

				// minuse from user balance
	    		$from_user = User::find(Auth::user()->id);
	    		$from_user_new_balance = $user_current_balance-$transfer_balance;
	    		$from_user->balance = $from_user_new_balance;
	    		$from_user->save();

	    		// pluse to user balance
	    		$to_user = User::find($request->to_user);
	    		$to_user_new_balance = $to_user->balance+$transfer_balance;
	    		$to_user->balance = $to_user_new_balance;
	    		$to_user->save();
			});
    		return redirect()->route('user.balance_transfer.view')->with("success", "Balance Transfer Success");
		}

    }
}
