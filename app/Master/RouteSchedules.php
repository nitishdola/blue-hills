<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class RouteSchedules extends Model
{
    protected $fillable = array('route_id', 'start_time', 'end_time');
	  protected $table    = 'route_schedules';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'route_id' 			=>  'required|exists:routes,id',
    	'start_time' 		=>  'required',
    	'end_time' 			=>  'required',
    ];

    public function route()
	{
		return $this->belongsTo('App\Master\Route', 'route_id');
	}
}
