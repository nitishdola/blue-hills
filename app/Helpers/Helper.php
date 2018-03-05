<?php 

namespace App\Helpers;

use DB, Validator, Redirect, Auth, Crypt;
class Helper
{
    public static function getRoute($src, $dest)
    {
        return DB::table('routes')->select('id', 'journey_duration')->where(['source_city' => $src, 'destination_city' => $dest, 'status' => 1])->first();
    }


    public static function getCityName($city_id)
    {
        return DB::table('cities')->select('id', 'name')->where(['id' => $city_id])->first();
    }

    public static function convertToHoursMins($time) {
	    if ($time < 1) {
	        return;
	    }

	    $arr = [];
	    $arr['h'] 	= floor($time / 3600);
	    $arr['m'] 	= ($time % 60);
	    
	    return $arr;
	     
	}


	public static function getArrivalDate($jorney_date, $journey_duration) {
		$date = date('Y-m-d H:i:s', strtotime( str_replace('/', '-',$jorney_date)));
		return $add_sec = date("d/m/Y", strtotime($date . "+$journey_duration sec"));
	}
}