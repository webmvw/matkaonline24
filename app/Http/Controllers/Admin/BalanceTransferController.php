<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BalanceTransfer;

class BalanceTransferController extends Controller
{
    public function view(){
    	$getData = BalanceTransfer::orderBy('created_at','desc')->take(50)->get();
    	return view('admin.pages.balance.balance_transfer.view-balance_transfer', compact('getData'));
    }
}
