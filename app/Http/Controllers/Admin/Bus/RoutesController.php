<?php

namespace App\Http\Controllers\Admin\bus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Master\Route, App\Master\City;
use DB, Validator, Redirect;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::pluck('name', 'id')->all();
        return view('admin.master.buses.routes.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = $class = '';
        $data = $request->all();
        
        $data['journey_duration'] = $request->journey_duration * 3600;
        
        $validator = Validator::make($data, Route::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        if(Route::create($data)) {
            $class .= 'alert-success';
            $message .= 'Bus route added successfully !';
        }else{
            $class .= 'alert-danger';
            $message .= 'Unable store bus route !';
        }

        return Redirect::back()->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
