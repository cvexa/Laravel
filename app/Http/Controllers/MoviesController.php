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
// use App\cm_movie;
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
        $cm_movie = new cm_movie;
	    $cm_movie ->title = $request->title;
	    $cm_movie ->description = $request->description;
	    $cm_movie ->country = $request->country;
	    $cm_movie ->translation = $request->translation;
	    $cm_movie ->director = $request->director;
	    $cm_movie ->age_rate = $request->age_rate;
	    $cm_movie ->bg_premiere = $request->bg_premiere;
	    $cm_movie ->start_date = $request->start_date;
	    $cm_movie ->end_date = $request->end_date;
	    $cm_movie ->trailer = $request->trailer;
	    $cm_movie ->rating = $request->rating;
	    



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
			$img =$files->move(public_path().'/posters/'.$cm_movie->id,$name);
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

		
        // $movie->update($request->all());
        // $cm_movie->update();
	    $movie ->title = $request->title;
	    $movie ->description = $request->description;
	    $movie ->country = $request->country;
	    $movie ->translation = $request->translation;
	    $movie ->director = $request->director;
	    $movie ->age_rate = $request->age_rate;
	    $movie ->bg_premiere = $request->bg_premiere;
	    $movie ->start_date = $request->start_date;
	    $movie ->end_date = $request->end_date;
	    $movie ->trailer = $request->trailer;
	    $movie ->rating = $request->rating;
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
			$name=time()."_".$files->getClientOriginalName();
			$img =$files->move(public_path().'/posters/'.$movie->id,$name);
			
			if($movie->poster)
		{
			$file_path = public_path().'/posters/'.$movie->id.'/'.$movie->poster;
			unlink($file_path);
		}
         $movie->poster = $name; 
		}else{
			$movie->poster = $movie->poster;
		}
			
        $movie->save();
			

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
