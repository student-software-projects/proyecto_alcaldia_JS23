<?php

namespace App\Http\Controllers;
use App\Models\Team;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team=Team::all();
        return view('teams.teams',compact('team'));
    }
    public function create()
    {
        return view('teams.create');
    }
    public function store(Request $request)
    {
        $team=Team::create($request->all());
        return redirect()->route('teams.index');
    }
    public function show($id)
    {
        $team=Team::find($id);
        return view('teams.show', compact('team'));
    }
    public function destroy($id){
        $team=Team::find($id)->delete();
        return redirect()->route('teams.index');
    }
    public function edit($id){
        $team=Team::find($id);
        return view('teams.edit',compact('team'));
    }
    public function update(Request $request,$id){
        $team=Team::find($id)->update($request->all());
        return redirect()->route('teams.show',$id);
    }
    public function inicio(){
        return view('inicio');
    }
}
