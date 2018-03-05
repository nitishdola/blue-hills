<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class CityStoppage extends Model
{
    protected $fillable = array('name', 'city_id', 'time_difference', 'is_end_point');
	  protected $table    = 'city_stoppages';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required',
    	'city_id' 			=>  'required|exists:cities,id',
    	'time_difference' 	=>  'required',
    	'is_end_point' 		=>  'required',
    ];

    public function city()
	{
		return $this->belongsTo('App\Master\City', 'city_id');
	}
}
