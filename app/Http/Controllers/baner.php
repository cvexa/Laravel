<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\cm_movie;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;


class baner extends Controller
{
   public function index(){

   $movie = cm_movie::all();

   	 return view('cinema.index', ['movie' => $movie]);


   }
  public function index_logged(){



// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();
$movie = cm_movie::all();

if ($id === 1) {
$admin = DB::table('users')
    ->where('id',$id)
    ->get();
	
	 

   	 return view('cinema.index', ['movie' => $movie,'admin' => $admin]);
}else{

	$user2 = DB::table('users')
    ->where('id',$id)
    ->get();
     return view('cinema.index', ['movie' => $movie,'user2' => $user2]);
}


   } 
public function logout(){
	 Auth::logout();

   $movie = cm_movie::all();

   	 return view('cinema.index', ['movie' => $movie]);


   }
  
}
