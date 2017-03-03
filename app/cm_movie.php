<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cm_movie extends Model
{
    protected $fillable = [
	    'title', 'description', 'director','bg_premiere','rating','trailer','translation','age_rate','country','start_date','end_date','cl_genre1',
	    'cl_genre2','cl_genre3','poster','video_format'
    ];
    
    protected $dateFormat = 'Y-m-d H:i:s';

    public function movieScreenings()
    {
    	return $this->hasMany(cl_film_screening::class);
    }
}
