<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\cm_movie;
use App\cl_genre;
use App\CmSoldTicket;
use App\cl_film_screening;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	} 	
  	public function index($id)
	{
		
		$screenings = cl_film_screening::with('cmMovie')->find($id);
		$sold = CmSoldTicket::where('cm_film_screening_id', '=', $id)->get();
		return view('cinema.booking',['screenings' => $screenings, 'sold' => $sold]);
	
	
		

		
	}
	public function store(Request $request){
		$response = [
			
			'msg' => 'Успешно запазихте билети за филма !',
		];
		$smallL = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQ456789";
		$smallS = str_shuffle($smallL);
		$subD = substr($smallS,0,5);
		foreach ($request->rows as $key => $value) {
			$cm_ticket = new CmSoldTicket;
			$cm_ticket->row_num = $value;
			$cm_ticket->column_num = $request->columns[$key];
			$cm_ticket->cm_film_screening_id = $request->screenings_id;
			$cm_ticket->price = $request->price;
			$cm_ticket->created_by = session('name');
			$cm_ticket->user_id = session('u_id');
			$cm_ticket->code = rand(1,10).$value . $request->columns[$key] . $request->screenings_id . rand(-10,50).$subD; 
			$cm_ticket->save();

			$response[] = $value;	
		}

		
		return \Response::json($response);
		
	}
}
