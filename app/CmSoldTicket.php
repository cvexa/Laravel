<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmSoldTicket extends Model
{
    protected $fillable = [
	    'row_num', 'column_num', 'cm_film_screening_id','price',
    ];
}
