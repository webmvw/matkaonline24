<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GameCategory;

class GameCategoryController extends Controller
{
    public function view(){
        $data['allGameCategory'] = GameCategory::orderBy('id', 'desc')->get();
        return view('admin.pages.game-category.view-game-category', $data);
    }

    public function add(){
        return view('admin.pages.game-category.add-game-category');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'deposit_point' => 'required',
            'withdraw_point' => 'required',
        ]);

        $data = GameCategory::insert([
            'name' => strip_tags($request->name),
            'deposit_point' => strip_tags($request->deposit_point),
            'withdraw_point' => strip_tags($request->withdraw_point),
        ]);
        return redirect()->route('admin.gameCategory.view')->with('success', 'Game Category Added Success');
    }

    public function edit($id){
        $data['getGameCategory'] = GameCategory::find($id);
        return view('admin.pages.game-category.edit-game-category', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'deposit_point' => 'required',
            'withdraw_point' => 'required',
        ]);

    	$getGameCategory = GameCategory::find($id);
    	$getGameCategory->name = strip_tags($request->name);
        $getGameCategory->deposit_point = strip_tags($request->deposit_point);
        $getGameCategory->withdraw_point = strip_tags($request->withdraw_point);
    	$getGameCategory->save();
    	return redirect()->route('admin.gameCategory.view')->with("success", "Game Category updated Successfully!!");
    }

    public function delete($id){
    	$getGameCategory = GameCategory::find($id);
    	$getGameCategory->delete();
    	return redirect()->route('admin.gameCategory.view')->with("success", "Game Category deleted Successfully!!");
    }


}
