<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cm_movie;

class baner extends Controller
{
   public function index(){

   $movie = cm_movie::all();

   	 return view('cinema.index', ['movie' => $movie]);


   }
}
