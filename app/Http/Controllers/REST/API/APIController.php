<?php

namespace App\Http\Controllers\REST\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Master\Bus, App\Master\BusRoute, App\Master\SeatLayout;
use DB;

class APIController extends Controller
{
    public function getSeatLayout(Request $request) {
    	if($request->route_id) {
    		$route_id = $request->route_id;

			return DB::table('buses')
						->join('bus_routes', 'bus_routes.bus_id', '=', 'buses.id')
						->join('seat_layouts', 'seat_layouts.id', '=', 'buses.seat_layout_id')
						->where('bus_routes.route_id', $route_id)
						->select('seat_layouts.name', 'seat_layouts.layout')
						->get();
    	}
    }
}
