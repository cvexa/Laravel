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





class ScreeningsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	    $this->middleware('admin');
		
	}

	public function index()
	{
		

		$movies = cm_movie::with('movieScreenings')->get();
		
		
		return view('screenings_crud.index',['movies' => $movies]);
	}

	public function create()
	{
        $movies = cm_movie::with('movieScreenings')->get();
		return view('screenings_crud.create',['movies' => $movies]);
	}

	public function store(Request $request)
	{
         $this->validate($request, [
        'date' => 'required|date',
        'hour' => 'required',
        'cm_movie_id' => 'required',
        'price' => 'required',
        'free_seats' => 'required',
         ]);
		$cl_film_screening = cl_film_screening::create($request->all());

		$cl_film_screening->save();

        Session::flash('success', 'Успешно добавена Прожекция');
		return redirect('/screenings');

	}

	public function show($id)
	{

		$movies = cl_film_screening::with('cmMovie')->find($id);
		

		
		return view('screenings_crud.show',['movies' => $movies]);

	}

	public function edit($id)
	{
		$movies = cl_film_screening::with('cmMovie')->find($id);

		$movies2 = cm_movie::with('movieScreenings')->get();

		return view('screenings_crud.edit',['movies' => $movies,'movies2' => $movies2]);
	}

	public function update(cl_film_screening $screening, Request $request)
	{

		
        $screening->update($request->all());
      
		
		
		$screening->update();
			

        Session::flash('success', 'Успешно променихте прожекцията!');
		return redirect('/screenings');

	}
	public function destroy(cl_film_screening $screening)
	{

		$screening->delete();
        Session::flash('success', 'Успешно изтрихте прожекцията!');
		return redirect('/screenings');
	}

}
