<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class SeatLayout extends Model
{
    protected $fillable = array('name', 'layout', 'total_seats');
	  protected $table    = 'seat_layouts';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 			=>  'required',
    	'layout' 		=>  'required',
    	'total_seats' 	=>  'required',
    ];
}
