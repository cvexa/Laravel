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
  	public function index($id)
	{
		
		$screenings = cl_film_screening::with('cmMovie')->find($id);
		$sold = DB::table('cm_sold_tickets')->where('cm_film_screening_id', '=', $id)->get();
		return view('cinema.booking',['screenings' => $screenings, 'sold' => $sold]);
	
	
		

		
	}
	public function store(Request $request){
		$response = [
			'status' => 'success',
			'msg' => 'test',
		];
		
		foreach ($request->rows as $key => $value) {
			$cm_ticket = new CmSoldTicket;
			$cm_ticket->row_num = $value;
			$cm_ticket->column_num = $request->columns[$key];
			$cm_ticket->cm_film_screening_id = $request->screenings_id;
			$cm_ticket->price = $request->price;
			$cm_ticket->created_by = 'cvexa';
			$cm_ticket->save();

			$response[] = $value;	
		}

		
		return \Response::json($response);
		
	}
}
