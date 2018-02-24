<?php

namespace App\Http\Controllers\World;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function showHome() {
    	return view('public.home');
    }
}
