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

        // show the view and pass the nerd to it
        return view('show', ['user' => $user]);
    }

       public function edit($id)
     
    {
        // get the nerd
         $user = DB::table('users')->where('id', $id)->first();

        // show the edit form and pass the nerd
        return View('edit', ['user' => $user]);
           
    }

      public function update()
    {

        $id = Input::get('id');
        $name= Input::get('name');
        $email= Input::get('email');
        $pass= Input::get('pass');
// $upd = DB::table('users')
//             ->where('id', $id)
//             ->update(['name' => $name,'email' => $email,'password' => $pass]);
            $affected = DB::update('update users set name = $name, email = $email, password = $pass where id = $id');
	 


    }
}
