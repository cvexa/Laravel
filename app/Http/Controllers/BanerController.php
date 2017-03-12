<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\cm_movie;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\cl_genre;
use Session;
use App\Http\Middleware\AdminCheck;
use App\cl_film_screening;



class BanerController extends Controller
{
    public function index(User $user)
    {
      
      
      $movies = cm_movie::all();
      $screenings = cl_film_screening::with('cmMovie')->get();
   
      
      
   	  return view('cinema.index', ['movies' => $movies,'screenings' => $screenings]);
    }

    public function index_logged()
    {
     
     $registered =  Auth::user()->name;
     $role = Auth::user()->role;
     $u_id = Auth::user()->id;
     // echo $registered;
     session()->put('name', $registered);
     session()->put('role', $role);
     session()->put('u_id', $u_id);

     return redirect('/profile/'.$u_id);
      // echo $registered;
    
    }


public function logout(){
	 Auth::logout();

   session()->forget('name');
   session()->forget('role');
   
   session()->forget('u_id');
   return redirect ("/home");
    

   }
  
}
