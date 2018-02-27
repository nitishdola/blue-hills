<?php

namespace App\Http\Controllers\REST\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Master\Bus, App\Master\SeatLayout;
use DB;

class APIController extends Controller
{
    public function getSeatLayout(Request $request) {
    	if($request->bus_id) {
    		$bus = Bus::find($request->bus_id);
    		$layout_id = $bus->seat_layout_id;

    		return SeatLayout::whereId($layout_id)->first();
    	}
    }
}
