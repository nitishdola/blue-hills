<?php

namespace App\Http\Controllers\World;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Master\City;
use DB, Validator, Redirect;

class PublicController extends Controller
{
    public function showHome() {
    	$cities = City::pluck('name', 'id')->all();
    	return view('public.home', compact('cities'));
    }
}
