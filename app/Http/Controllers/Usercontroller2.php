<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\ADD;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Users;

class UserController2 extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        // $users = DB::table('users')->get();
        $users = DB::table('users')
                    ->whereNull('deleted')
                    ->get();
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
        $_token= Input::get('_token');

$adding = new Users;
$adding->name= $name;
$adding->email= $email;
$adding->password= $pass;
$adding->remember_token = $_token;
$adding -> save();

// $id = DB::table('users')->insertGetId(
//     array('name' => $name, 'email' => $email, 'password' => $pass)
// );

            // redirect
       $movies = DB::table('cm_movies')->get();
       // $users = DB::table('users')->get();
         $users = DB::table('users')
                    ->whereNull('deleted')
                    ->get();
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
            
            // $users = DB::table('users')->get();
            $users = DB::table('users')
                    ->whereNull('deleted')
                    ->get();
            $movies = DB::table('cm_movies')->get();

         return view('index', ['users' => $users,'movies' => $movies]);

        }

          public function delete_user($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $user = DB::table('users')->where('id', $id)->first();

        // show the edit form and pass the user
        return View('delete_user', ['user' => $user] );
        }
         public function delete($id){
    	 DB::table('users')
            ->where('id', $id)
            ->update(['deleted' =>  '1']);

            // $users = DB::table('users')->get();
            $users = DB::table('users')
                    ->whereNull('deleted')
                    ->get();
            $movies = DB::table('cm_movies')->get();

         return view('index', ['users' => $users,'movies' => $movies]);



    }

}
