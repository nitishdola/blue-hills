<?php

namespace App\Http\Controllers\Admin\Bus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Master\Route, App\Master\RouteSchedules;

use DB, Validator, Redirect;

class RouteSchdulesController extends Controller
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
        $bus_routes = Route::with('source', 'destination')->where('status',1)->get();
        $bus_route_list = [];
        foreach($bus_routes as $k => $v) {
            $bus_route_list[$v->id] = $v->source['name'].' - '.$v->destination['name'];
        }
        return view('admin.master.buses.routes.route_schedule', compact('bus_route_list'));
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
        
        $validator = Validator::make($data, RouteSchedules::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        if(RouteSchedules::create($data)) {
            $class .= 'alert-success';
            $message .= 'Bus schedule added successfully !';
        }else{
            $class .= 'alert-danger';
            $message .= 'Unable store bus schedule !';
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
