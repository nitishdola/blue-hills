<?php

namespace App\Http\Controllers\World\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB, Validator, Redirect, Auth, Crypt;

use App\Master\BusRoute, App\Master\RouteSchedules, App\Master\CityStoppage;

use Helper;

class SearchController extends Controller
{
    public function search(Request $request) { 
    	if($request->source_city && $request->destination_city && $request->journey_date) {
    		$source_city 		= $request->source_city;
			$destination_city 	= $request->destination_city;

			$journey_date 		= $request->journey_date;	
			

			$from_stoppages 	= CityStoppage::where(['status' => 1, 'city_id' => $source_city ])->select('name', 'time_difference', 'time_difference', 'is_end_point')->get();

			$from_stoppage 	= CityStoppage::where(['status' => 1, 'city_id' => $source_city, 'is_end_point' => 1 ])->select('name')->first();

			$to_stoppages 	= CityStoppage::where(['status' => 1, 'city_id' => $destination_city ])->select('name', 'time_difference', 'time_difference', 'is_end_point')->get();

			$to_stoppage 	= CityStoppage::where(['status' => 1, 'city_id' => $source_city, 'is_end_point' => 1 ])->select('name')->first();


			$source_city_name 		= Helper::getCityName($source_city)->name;
			$destination_city_name 	= Helper::getCityName($destination_city)->name;
			
			$route = Helper::getRoute($source_city, $destination_city);
			
			$route_id = $route->id;

			$search_results = RouteSchedules::where('route_id', $route_id)->with('route')->get(); 

			return view('public.search.result', compact('search_results', 'source_city_name', 'destination_city_name', 'journey_date', 'from_stoppages', 'to_stoppages', 'from_stoppage', 'to_stoppage'));
    	}
    	//return Redirect::back();
    }
}
