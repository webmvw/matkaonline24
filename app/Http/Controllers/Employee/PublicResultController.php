<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bazar;
use App\Models\PublicResult;
use Carbon\Carbon;

class PublicResultController extends Controller
{
    public function view(){
    	$getResult = PublicResult::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->get();
    	return view('employee.pages.public-result.view-public-result', compact('getResult'));
    }

    public function add(){
    	$data['bazars'] = Bazar::orderBy('id', 'desc')->get();
    	return view('employee.pages.public-result.add-public-result', $data);
    }

    public function store(Request $request){
    	$request->validate([
    		'bazar_id' => 'required',
    		'status' => 'required',
    		'category' => 'required',
    		'number' => 'required',
    	]);
    	$public_result = new PublicResult();
		$public_result->bazar_id = $request->bazar_id;
		$public_result->status = $request->status;
		$public_result->category = $request->category;
		$public_result->number = $request->number;
		$public_result->save();
		return redirect()->route('employee.public_result.view')->with('success', 'Result Entry Success');
    }


    public function edit($id){
        $data['getResult'] = PublicResult::find($id);
        $data['bazars'] = Bazar::orderBy('id', 'desc')->get();
        return view('employee.pages.public-result.edit-public-result', $data);  
    }

    public function update(Request $request, $id){
        $request->validate([
            'bazar_id' => 'required',
            'status' => 'required',
            'category' => 'required',
            'number' => 'required',
        ]);
        $public_result = PublicResult::find($id);
        $public_result->bazar_id = $request->bazar_id;
        $public_result->status = $request->status;
        $public_result->category = $request->category;
        $public_result->number = $request->number;
        $public_result->save();
        return redirect()->route('employee.public_result.view')->with('success', 'Result Update Success');
    }


    public function delete($id){
        $getResult = PublicResult::find($id);
        $getResult->delete();
        return back()->with("success", "Public Result Deleted Success");
    }


}
