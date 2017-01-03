<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class Userr extends Controller
{
	public function get(){
$users = DB::table('users')->get();
}
}
