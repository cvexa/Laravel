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
use App\CmSoldTicket;
use App\User;
class AdminPanelController extends Controller
{
   public function __construct()
	{
		$this->middleware('auth');
	    $this->middleware('admin');
		
	}

	public function index()
	{
      
       return view('admin_panel.index');

	}

	public function codes()
	{
      
       return view('admin_panel.code_check');

	}

	public function checking(request $request)
	{
      
       $check = $request->code;
       $find = CmSoldTicket::where('code',$check)->get();
       
       $a = count($find);
       $alert = "Въведете Код в Полето !";
       if($a > 0){
       foreach($find as $result){
       $movie = cl_film_screening::with('cmMovie')->find($result->cm_film_screening_id);
       $user = User::find($result->user_id);
       
     

       }
      
       
      
       return view('admin_panel.code_check',['find' => $find,'a' => $a,'movie' => $movie,'user' => $user]);
   }else{
   	   return view('admin_panel.code_check',['find' => $find,'a' => $a,'alert' => $alert]);
   }

	}
}
