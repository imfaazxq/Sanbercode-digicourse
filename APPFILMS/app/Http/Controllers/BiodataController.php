<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
   public function register (){
    return view('pages.daftar');
   }

   public function home(Request $request){
    // dd($request->all());
    $firstname = $request->input('firstname');
    $lastname = $request->input('lastname');

    return view('pages.home', compact('firstname', 'lastname'));
}
}
