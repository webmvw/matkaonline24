<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    public function view(){
    	$allDeposits = Deposit::where('status', 'Pending')->orderBy('id', 'desc')->get();
    	return view('admin.pages.balance.deposit.view-deposit', compact('allDeposits'));
    }

    public function reject($id){
    	$getDeposit = Deposit::find($id);
    	$getDeposit->status = "Reject";
    	$getDeposit->save();
    	return redirect()->route('admin.deposit.view')->with("success", "Deposit Reject Success");
    }

    public function accept($id){
    	DB::transaction(function() use($id){
    		// deposit status change
    		$getDeposit = Deposit::find($id);
    		$getDeposit->status = "Success";
    		$getDeposit->save();

    		// user balance add
    		$getUser = User::find($getDeposit->user_id);
            $user_balance = $getUser->balance;
            $user_current_balance = $getDeposit->deposit_amount+$user_balance;
    		$getUser->balance = $user_current_balance;
    		$getUser->save();

    	});
    	return back()->with("success", "Deposit Accept Success");
    }

    public function rejectList(){
        $rejectDeposit = Deposit::where('status', 'Reject')->orderBy('id', 'desc')->get();
        return view('admin.pages.balance.deposit.reject-deposit', compact('rejectDeposit'));
    }

    public function acceptList(){
        $acceptDeposit = Deposit::where('status', 'Success')->orderBy('id', 'desc')->get();
        return view('admin.pages.balance.deposit.accept-deposit', compact('acceptDeposit'));
    }

}

