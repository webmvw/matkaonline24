<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankAccount;

class AccountController extends Controller
{
    public function view(){
        $data['allBankAccounts'] = BankAccount::orderBy('id', 'desc')->get();
        return view('admin.pages.account.view-account', $data);
    }

    public function add(){
        return view('admin.pages.account.add-account');
    }

    public function store(Request $request){
        $request->validate([
            'account_name' => 'required',
            'account_number' => 'required',
        ]);

        $data = BankAccount::insert([
            'account_name' => strip_tags($request->account_name),
            'account_number' => strip_tags($request->account_number),
            'status' => 0,
        ]);
        return redirect()->route('admin.account.view')->with('success', 'Bank Account Added Success');
    }

    public function edit($id){
        $data['getAccount'] = BankAccount::find($id);
        return view('admin.pages.account.edit-account', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'account_name' => 'required',
            'account_number' => 'required',
            'status' => 'required',
        ]);
    	$account = BankAccount::find($id);
    	$account->account_name = strip_tags($request->account_name);
        $account->account_number = strip_tags($request->account_number);
        $account->status = strip_tags($request->status);
    	$account->save();
    	return redirect()->route('admin.account.view')->with("success", "Bank Account updated Successfully!!");
    }

    public function delete($id){
    	$getAccount = BankAccount::find($id);
    	$getAccount->delete();
    	return redirect()->route('admin.account.view')->with("success", "Bank Account deleted Successfully!!");
    }


}
