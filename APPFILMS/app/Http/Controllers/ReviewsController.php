<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
   public function store(Request $request, $film_id ){
    $request->validate([
        'content' => 'required|min:3',
        'point' => 'required|integer|min:1|max:10'
    ],
[
    'required' => 'Inputan :attribute Review harus diisi!',
    'min'=>'Inputan :attribute Review minimal 3 karakter',
    'integer' => 'Point harus berupa angka',
        'point.min' => 'Minimal point adalah 1',
        'point.max' => 'Maksimal point adalah 10'
]);
$user_id= Auth::id();

$reviews = new Reviews;
$reviews->content= $request['content'];
$reviews->point = $request['point'];
$reviews->user_id= $user_id;
$reviews->film_id= $film_id;

$reviews->save();
return redirect('/film/'. $film_id);

   }
}
