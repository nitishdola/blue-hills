<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    protected $fillable = array('bus_id', 'route_id');
	protected $table    = 'bus_routes';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'bus_id' 			=>  'required|exists:buses,id',
    	'route_id' 			=>  'required|exists:routes,id'
    ];
}
