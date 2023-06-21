<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function view(){
        $data['allDeposit'] = Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.pages.deposit.view-deposit', $data);
    }

    public function add(){
        return view('user.pages.deposit.add-deposit');
    }

    public function store(Request $request){
    	$request->validate([
    		'deposit_amount' => 'required',
    		'account_number' => 'required',
            'payment_method' => 'required',
    		'trans_id' => 'required',
    	]);
    	$deposit = new Deposit();
    	$deposit->deposit_amount = strip_tags($request->deposit_amount);
        $deposit->account_number = strip_tags($request->account_number);
    	$deposit->payment_method = strip_tags($request->payment_method);
    	$deposit->trans_id = strip_tags($request->trans_id);
    	$deposit->status = "Pending";
    	$deposit->user_id = Auth::user()->id;
    	$deposit->save();
    	return redirect()->route('user.deposit.view')->with('success', 'Your Deposit Success!!');
    }

}
