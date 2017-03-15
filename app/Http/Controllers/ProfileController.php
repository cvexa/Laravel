<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\cl_film_screening;
use App\cm_movie;
use App\cl_genre;
use App\CmSoldTicket;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;



class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	    
		
	}
	
    public function index(User $id)
	{

		
		$user = $id;
		

		$sold = CmSoldTicket::where('user_id', '=', $user->id)->with('cmSold')->get();
		
		// $sold = CmSoldTicket::where('user_id', '=', $user->id)->get();
		// // $screenings = cl_film_screening::with('cmMovie')->where('id', '=', $sold->cm_film_screening_id);
		// foreach ($sold as $value) {
			
		// 	$screenings = cl_film_screening::with('cmMovie')->where('id', '=', $value->cm_film_screening_id);
		// }
		
			
			 // $movies[] = cm_movie::where('id','=', $value->cmSold->cm_movie_id)->get();
			
			$movies = cm_movie::get();
		
	  // dd($movies);

       return view('user_profiles.index',['user' => $user,'sold' => $sold,'movies' => $movies]);
	}	

	public function edit(User $id)
	{
		
      $user = $id;

      return view('user_profiles.edit',['user'=> $user]);
		
	}

public function update(User $id, Request $request)
	{

		 // $this->validate($request, [
   //      'name' => 'required|max:255',
   //      'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
   //      'email' => 'required|email|max:255|unique:users',
   //      'password' => 'required|min:6|confirmed',
   //      ]);
	
		// if($id->photo)
		// {
		// 	$file_path = public_path().'/users/'. $id->photo;
		// 	unlink($file_path);
		// }

		

		
	
        // $id->update($request->all());
		if(Input::hasFile('photo')){
			$files=Input::file('photo');
			// var_dump($files);
			$name=time()."_".$files->getClientOriginalName();
			$img =$files->move(public_path().'/users',$name);
			$id->photo = $name;
          
		}
        $id->name = $request->name;
        $id->password = Hash::make($request->password);
        $id->email = $request->email;
       
        $id->save();
    
		
	
			

        Session::flash('success', 'Успешно направихте промени!');
		 return view('user_profiles.edit',['user'=> $id]);

	}
}
