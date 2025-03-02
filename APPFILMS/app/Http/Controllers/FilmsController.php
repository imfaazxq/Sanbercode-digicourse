<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Film;
use File;

class FilmsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();

        return view('films.index',["film" => $film]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $genres = genre::all();
       return view('films.create', ["genres"=> $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summary'=>'required',
            'year'=>'required',
            'genre_id'=>'required|exists:genres,id',
            'poster'=>'required|image:png,jpg,jpeg',
        ],
    [
        'required' => 'Inputan :attribute harus diisi!',
        'min'=>'Inputan :attribute minimal 3 karakter',
        'exists'=> 'Inputan:attribute tidak terdaftar',
        'image'=> 'Inputan :attribute harus berupa gambar'
    ]);
   
    $filmImageName = time() . '.' . $request->poster->extension();

    $request->poster->move(public_path('uploads'), $filmImageName);

    $film = new Film;
    $film->title= $request['title'];
    $film->summary= $request['summary'];
    $film->release_year = $request['year'];
    $film->genre_id= $request['genre_id'];
    $film->poster= $filmImageName;

    $film->save();
    return redirect('/film');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $film = Film::find($id);

       return view('films.detail',["film" => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);
        $genres = Genre::all();

        return view('films.edit',["film" => $film, "genres" => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summary'=>'required',
            'year'=>'required',
            'genre_id'=>'required|exists:genres,id',
            'poster'=>'image:png,jpg,jpeg',
        ],
    [
        'required' => 'Inputan :attribute harus diisi!',
        'min'=>'Inputan :attribute minimal 3 karakter',
        'exists'=> 'Inputan:attribute tidak terdaftar',
        'image'=> 'Inputan :attribute harus berupa gambar'
    ]);

    $film = Film::find($id);

    if($request->has('poster')) {
        File::delete('uploads/'. $film->poster);
        
    $filmImageName = time() . '.' . $request->poster->extension();

    $request->poster->move(public_path('uploads'), $filmImageName);
    $film->poster = $filmImageName;
    }
    $film->title = $request['title'];
    $film->summary = $request['summary'];
    $film->release_year= $request['year'];
    $film->genre_id = $request['genre_id'];

    $film->save(); 
    
    return redirect ('film');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);

        if($film->poster){
            File::delete('uploads/'. $film->poster);

            $film->delete();
        }
        
        return redirect('film');
    }


}
