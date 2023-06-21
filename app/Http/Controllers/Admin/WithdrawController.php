<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\User;

class WithdrawController extends Controller
{
    public function view(){
    	$allWithdraws = Withdraw::where('status', 'Pending')->orderBy('id', 'desc')->get();
    	return view('admin.pages.balance.withdraw.view-withdraw', compact('allWithdraws'));
    }

    public function reject($id){
    	$getWithdraw = Withdraw::find($id);

        $getUser = User::find($getWithdraw->user_id);

        $user_new_balance = $getUser->balance + $getWithdraw->withdraw_amount;

        $getUser->balance = $user_new_balance;
        $getUser->save();

    	$getWithdraw->status = "Reject";
    	$getWithdraw->save();
    	return back()->with("success", "Withdraw Reject Success");
    }


    public function accept($id){
		$getWithdraw = Withdraw::find($id);
		$getWithdraw->status = "Success";
		$getWithdraw->save();
    	return back()->with("success", "Withdraw Accept Success");
    }

    public function rejectList(){
        $rejectWithdraw = Withdraw::where('status', 'Reject')->orderBy('id', 'desc')->get();
        return view('admin.pages.balance.withdraw.reject-withdraw', compact('rejectWithdraw'));
    }

    public function acceptList(){
        $acceptWithdraw = Withdraw::where('status', 'Success')->orderBy('id', 'desc')->get();
        return view('admin.pages.balance.withdraw.accept-withdraw', compact('acceptWithdraw'));
    }
    
}
