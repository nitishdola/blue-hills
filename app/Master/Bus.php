<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = array('bus_name', 'bus_number', 'bus_type', 'seat_layout_id');
	  protected $table    = 'buses';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'bus_name' 			=>  'required',
    	'bus_number' 		=>  'required|unique:buses',
    	'bus_type' 			=>  'required',
    	'seat_layout_id' 	=> 'required|exists:seat_layouts,id'
    ];


    public static $bus_types = [
    	'AC Sleeper' 			=>  'AC Sleeper',
    	'Non-AC Sleeper' 		=>  'Non-AC Sleeper',
    	'AC Seater' 			=>  'AC Seater',
    	'Non-AC Seater' 		=>  'Non-AC Seater'
    ];
}
