<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use  App\Models\genre;

use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function create(){
        return view('genres.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3'
        ],
    [
        'required' => 'Inputan :attribute harus diisi!',
        'min'=>'Inputan :attribute minimal 3 karakter'
    ]);
        DB::table('genres')->insert([
            'name' => $request->name,
        ]);
        return redirect('/genre');
    }

    public function index(){
        $genres = DB::table('genres')->get();
        return view('genres.index', ['genres' => $genres]);
    }

    public function show($id){
        $genres = Genre::find($id);

        return view ('genres.detail',['genres' => $genres]);
    }


    public function edit($id){
        $genres = DB::table('genres')->find($id);

        return view ('genres.edit', ['genres' => $genres]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:3'
        ],
    [
        'required' => 'Inputan :attribute harus diisi!',
        'min'=>'Inputan :attribute minimal 3 karakter'
    ]);

    DB::table('genres')
    ->where('id', $id)
    ->update([
        'name' => $request->name,  
    ]);

    return redirect('/genre');
    }

    public function destroy($id){
        DB::table('genres')->where('id', $id )->delete();
        return redirect ('/genre');   
    }
}
