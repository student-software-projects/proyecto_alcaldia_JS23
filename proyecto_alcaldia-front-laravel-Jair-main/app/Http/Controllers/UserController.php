<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $localidad = User::all();
        return view('Localidad.index', compact('localidad'));
    }
    public function create()
    {
        return view('localidad.create');
    }
    public function store(Request $request)
    {
        $localidad = User::create($request->all());
        return redirect()->route('localidad.index');
    }
    public function show($id)
    {
        $localidad = User::find($id);
        return view('localidad.show', compact('localidad'));
    }
    public function destroy($id){
        $localidad=User::find($id)->delete();
        return redirect()->route('localidad.index');
    }
    public function edit($id){
        $localidad=User::find($id);
        return view('localidad.edit',compact('localidad'));
    }
    public function update(Request $request,$id){
        $localidad=User::find($id)->update($request->all());
        return redirect()->route('localidad.show',$id);
    }
}
