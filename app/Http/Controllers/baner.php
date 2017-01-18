<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\cm_movie;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\cl_genre;


class baner extends Controller
{
    public function index(User $user)
    {
      $movie = cm_movie::all();
      $genre = cl_genre::all();
      
      $is_admin = false;
      if( ! empty($user) && $user->id == 1)
      {
        $is_admin = true;
      }

   	  return view('cinema.index', ['movie' => $movie,'genre' => $genre, 'user' => $user, 'is_admin' => $is_admin]);
    }

    public function index_logged()
    {
      // Get the currently authenticated user...
      $user = Auth::user();

      // Get the currently authenticated user's ID...
      $id = Auth::id();
      $movie = cm_movie::all();

      if ($id === 1) {
        $admin = DB::table('users')
            ->where('id',$id)
            ->first();

        //return view('cinema.index', ['movie' => $movie,'admin' => $admin,'genre' => $genre]);
        return redirect ("/home/$admin->id");
      }else{
      	$user2 = DB::table('users')
          ->where('id',$id)
          ->first();
        //return view('cinema.index', ['movie' => $movie,'user2' => $user2,'genre' => $genre]);
        return redirect ("/home/$user2->id");
      }
   }


public function logout(){
	 Auth::logout();

   $movie = cm_movie::all();
   $genre = cl_genre::all();
   	 return view('cinema.index', ['movie' => $movie,'genre' => $genre]);
	 // redirect ('/home');


   }
  
}
