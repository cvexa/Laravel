<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cm_movie;
use App\cl_genre;


class MoviesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{

		$movies = cm_movie::all();
		
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
        'title' => 'required',
        'description' => 'required',
        'country' => 'required',
        'translation' => 'required',
        'director' => 'required',
        'age_rate' => 'required',
        'bg_premiere' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'trailer' => 'required',
        'rating' => 'required',
         ]);
		$cm_movie = cm_movie::create($request->all());

		$ind = 1;
		foreach ($request->cl_genres as $key => $value) {
			$genre_key = 'cl_genre_id' . $ind;
			$cm_movie->$genre_key = $value;
			$ind++;
		}
		$cm_movie->save();


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

		return redirect('/movies');

	}
	public function destroy(cm_movie $movie)
	{

		$movie->delete();

		return redirect('/movies');
	}

}
