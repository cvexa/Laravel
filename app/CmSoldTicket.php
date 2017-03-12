<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmSoldTicket extends Model
{
    protected $fillable = [
	    'row_num', 'column_num', 'cm_film_screening_id','price',
    ];

     public function cmSold()
    {
    	return $this->belongsTo(cl_film_screening::class, 'cm_film_screening_id');
    }
}
