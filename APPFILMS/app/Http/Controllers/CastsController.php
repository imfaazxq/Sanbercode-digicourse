<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CastsController extends Controller
{
    public function create(){
        return view('Casts.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'description' => 'required',
        ],
    [
        'required' => 'Inputan :attribute harus diisi!',
        'min'=>'Inputan :attribute minimal 3 karakter'
    ]);
        DB::table('casts')->insert([
            'name' => $request->name,
            'age' => $request->age,
            'bio' => $request->description
        ]);
        return redirect('/Cast');
    }

    public function index(){
        $casts = DB::table('casts')->get();
        return view ('Casts.index',['casts'=> $casts]);
    }

    public function show($id){
        $casts = DB::table('casts')->find($id);

        return view ('Casts.detail',['casts' => $casts]);
    }

    public function edit($id){
        $casts = DB::table('casts')->find($id);

        return view ('Casts.edit',['casts' => $casts]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'description' => 'required',
        ],
    [
        'required' => 'Inputan :attribute harus diisi!',
        'min'=>'Inputan :attribute minimal 3 karakter'
    ]);
    DB::table('casts')
    ->where('id', $id)
    ->update([
        'name' => $request->name,
        'age' => $request->age,
        'bio' => $request->description,  
    ]);

    return redirect ('/Cast');
    }

    public function destroy($id){
        DB::table('casts')->where('id', $id )->delete();
        return redirect ('/Cast');   
    }
}


