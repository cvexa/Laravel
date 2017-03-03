<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cm_movie;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\cl_genre;
use Session;
use App\Http\Middleware\AdminCheck;

class isAdminController extends Controller
{
 
	public function index(){
		return redirect('movies');
	}
}
