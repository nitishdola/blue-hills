<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = array('source_city', 'destination_city', 'journey_duration');
	  protected $table    = 'routes';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'source_city' 			=>  'required',
    	'destination_city' 		=>  'required|different:source_city',
    	'journey_duration' 		=>  'required|numeric',
    ];

    public function source()
	{
		return $this->belongsTo('App\Master\City', 'source_city');
	}

	public function destination()
	{
		return $this->belongsTo('App\Master\City', 'destination_city');
	}
}
