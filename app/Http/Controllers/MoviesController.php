<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\cm_movie;
use App\cl_genre;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\cl_film_screening;
// use Storage;





class MoviesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	    $this->middleware('admin');
		
	}

	public function index()
	{
		

		$movies = cm_movie::with('movieScreenings')->get();
		
		
		return view('movies_crud.index',['movies' => $movies]);
	}

	public function create()
	{
        $genres = cl_genre::all();
		return view('movies_crud.create',['genres' => $genres]);
	}

	public function store(Request $request)
	{
         $this->validate($request, [
        'title' => 'required|min:2',
        'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'required',
        'country' => 'required',
        'translation' => 'required',
        'director' => 'required',
        'age_rate' => 'required|max:18',
        'bg_premiere' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'trailer' => 'required',
        'rating' => 'required|max:10',
         ]);
		$cm_movie = cm_movie::create($request->all());

		$ind = 1;
		foreach ($request->cl_genres as $key => $value) {
			$genre_key = 'cl_genre_id' . $ind;
			$cm_movie->$genre_key = $value;
			$ind++;
		}

		
	
		 if(Input::hasFile('poster')){
			$files=Input::file('poster');
			// var_dump($files);
			$name=time()."_".$files->getClientOriginalName();
			$img =$files->move(public_path().'/posters',$name);
			$cm_movie ->poster = $name;
          
		}
		$cm_movie->save();

        Session::flash('success', 'Successfully added a movie to DB!');
		return redirect('/movies');

	}

	public function show($id)
	{

		$movie = cm_movie::find($id);
		

		return view('movies_crud.show',['movie' => $movie]);

	}

	public function edit($id)
	{
		$movie = cm_movie::find($id);
		$genres = cl_genre::all();

		return view('movies_crud.edit',['movie' => $movie,'genres' => $genres]);
	}

	public function update(cm_movie $movie, Request $request)
	{

		
        $movie->update($request->all());
        $ind = 1;
        if ($request->cl_genres) {
        	
        
		foreach ($request->cl_genres as $key => $value) {
			$genre_key = 'cl_genre_id' . $ind;
			$movie->$genre_key = $value;
			$ind++;
		}
	}
		if(Input::hasFile('poster')){
			$files = Input::file('poster');
			// var_dump($files);

			$name = time()."_".$files->getClientOriginalName();
			$img  = $files->move(public_path().'/posters',$name);
			$movie ->poster = $name;
			
          
		}
		
		$movie->update();
			

        Session::flash('success', 'Successfully edited movie!');
		return redirect('/movies');

	}
	public function destroy(cm_movie $movie)
	{

		$movie->delete();
        Session::flash('success', 'Successfully deleted movie!');
		return redirect('/movies');
	}

}
