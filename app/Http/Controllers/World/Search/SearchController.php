<?php

namespace App\Http\Controllers\World\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB, Validator, Redirect, Auth, Crypt;

use App\Master\BusRoute;

use Helper;

class SearchController extends Controller
{
    public function search(Request $request) { 
    	if($request->source_city && $request->destination_city && $request->journey_date) {
    		$source_city 		= $request->source_city;
			$destination_city 	= $request->destination_city;
			$journey_date 		= $request->journey_date;	

			$source_city_name 		= Helper::getCityName($source_city)->name;
			$destination_city_name 	= Helper::getCityName($destination_city)->name;
			
			$route = Helper::getRoute($source_city, $destination_city);
			
			$route_id = $route->id;

			$search_results = BusRoute::with('bus')->where('route_id', $route_id)->get(); //dd($search_results);

			return view('public.search.result', compact('search_results', 'source_city_name', 'destination_city_name', 'journey_date'));
    	}
    	//return Redirect::back();
    }
}
