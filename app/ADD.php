<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ADD extends Model
{
	public static function find(){
 $user = DB::table('users')->get();
}
}
