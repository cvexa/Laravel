<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\ADD;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class UserController2 extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $movies = DB::table('cm_movies')->get();

         return view('index', ['users' => $users,'movies' => $movies]);

    }
    public function create()
    {
    	
        return View('create');
    }
     public function store()
    {
        $name= Input::get('name');
        $email= Input::get('email');
        $pass= Input::get('pass');

// $adding = new ADD;
// $adding->name= $name;
// $adding->email= $email;
// $adding->password= $pass;
// $adding = save();

$id = DB::table('users')->insertGetId(
    array('name' => $name, 'email' => $email, 'password' => $pass)
);

            // redirect
$movies = DB::table('cm_movies')->get();

       $users = DB::table('users')->get();
           return View('index')->with('Success', 'Data saved!')->with(['users' => $users,'movies' => $movies]);
        
    }


       public function show($id)
    {
      $user = DB::table('users')->where('id', $id)->first();

        // show the view and pass the user to it
        return view('show', ['user' => $user]);
    }

       public function edit($id)
     
    {
        // get the user
         $user = DB::table('users')->where('id', $id)->first();

        // show the edit form and pass the user
        return View('edit', ['user' => $user] );
           
    }

       public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
      
            $user = DB::table('users')->where('id', $id)->first();
            $name       = Input::get('name');
            $email      = Input::get('email');
            $pass       = Input::get('pass');
            // $user->save();
            DB::table('users')
            ->where('id', $id)
            ->update(['name' =>  $name,'email' => $email, 'password' => $pass]);

            // redirect
            
            $users = DB::table('users')->get();
            $movies = DB::table('cm_movies')->get();

         return view('index', ['users' => $users,'movies' => $movies]);

        }
    

}
