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
}