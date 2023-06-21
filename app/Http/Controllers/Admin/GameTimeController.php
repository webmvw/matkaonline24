<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GameTime;
use App\Models\Bazar;

class GameTimeController extends Controller
{
    public function view(){
        $data['allGameTime'] = GameTime::orderBy('id', 'desc')->get();
        return view('admin.pages.game-time.view-game-time', $data);
    }

    public function add(){
        $data['bazars'] = Bazar::get();
        return view('admin.pages.game-time.add-game-time', $data);
    }

    public function store(Request $request){
        $request->validate([
            'bazar_id' => 'required',
            'status' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
        ]);

        $data = GameTime::insert([
            'bazar_id' => strip_tags($request->bazar_id),
            'status' => strip_tags($request->status),
            'open_time' => strip_tags($request->open_time),
            'close_time' => strip_tags($request->close_time),
        ]);
        return redirect()->route('admin.gameTime.view')->with('success', 'Game Time Added Success');
    }

    public function edit($id){
        $data['bazars'] = Bazar::get();
        $data['getGameTime'] = GameTime::find($id);
        return view('admin.pages.game-time.edit-game-time', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'bazar_id' => 'required',
            'status' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
        ]);

    	$getGameTime = GameTime::find($id);
    	$getGameTime->bazar_id = strip_tags($request->bazar_id);
        $getGameTime->status = strip_tags($request->status);
        $getGameTime->open_time = strip_tags($request->open_time);
        $getGameTime->close_time = strip_tags($request->close_time);
    	$getGameTime->save();
    	return redirect()->route('admin.gameTime.view')->with("success", "Game Time updated Successfully!!");
    }

    public function delete($id){
    	$getGameTime = GameTime::find($id);
    	$getGameTime->delete();
    	return redirect()->route('admin.gameTime.view')->with("success", "Game Time deleted Successfully!!");
    }

}
