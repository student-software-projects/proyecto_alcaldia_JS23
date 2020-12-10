<?php

namespace App\Http\Controllers;
use App\Models\Player;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players=Player::all();
        return view('players.players', compact('players'));
    }

    public function create(){
        return view('players.create');
    }

    public function store(Request $request)
    {
        $players=Player::create($request->all());
        return redirect()->route('players.index');
    }
    public function show($id){
        $players=Player::find($id);
        $localidad = User::find($id);
        return view('players.show', compact('players','localidad'));
    }
    public function destroy($id){
        $players=Player::find($id)->delete();
        return redirect()->route('players.index');
    }
    public function edit($id){
        $players=Player::find($id);
        return view('players.edit',compact('players'));
    }
    public function update(Request $request,$id){
        $players=Player::find($id)->update($request->all());
        return redirect()->route('players.show',$id);
    }

}
