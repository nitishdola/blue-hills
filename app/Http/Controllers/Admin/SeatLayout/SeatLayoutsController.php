<?php

namespace App\Http\Controllers\Admin\SeatLayout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Master\SeatLayout;

use DB, Validator, Redirect;
class SeatLayoutsController extends Controller
{
    public function create() {
    	return view('admin.master.layouts.seat_layout');
    }

    public function store(Request $request) {
    	$message = $class = '';
        $data = $request->all();
        
        
        $validator = Validator::make($data, SeatLayout::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        if(SeatLayout::create($data)) {
            $class .= 'alert-success';
            $message .= 'Layout added successfully !';
        }else{
            $class .= 'alert-danger';
            $message .= 'Unable store Layout !';
        }

        return Redirect::route('admin.seat_layouts')->with('message', $message);
    }
}
