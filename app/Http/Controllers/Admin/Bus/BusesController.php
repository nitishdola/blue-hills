<?php

namespace App\Http\Controllers\Admin\Bus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Master\Bus,App\Master\Route, App\Master\SeatLayout, App\Master\BusRoute;
use DB, Validator, Redirect, Crypt;
class BusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Bus::with('seat_layout', 'bus_routes.route.source', 'bus_routes.route.source')->get();
        return view('admin.master.buses.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bus_types = Bus::$bus_types;
        $seat_layouts_list = SeatLayout::pluck('name', 'id')->all();
        $seat_layouts = SeatLayout::whereStatus(1)->get();
        $bus_routes = Route::with('source', 'destination')->where('status',1)->get();
        $bus_route_list = [];
        foreach($bus_routes as $k => $v) {
            $bus_route_list[$v->id] = $v->source['name'].' - '.$v->destination['name'];
        }

        return view('admin.master.buses.create', compact('bus_types', 'seat_layouts', 'seat_layouts_list', 'bus_route_list'));
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
        
        $validator = Validator::make($data, Bus::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        DB::beginTransaction();

        try {
            if($bus = Bus::create($data)) {
                //add routes

                foreach($request->bus_routes as $route) {
                    $bus_routes = [];
                    $bus_routes['bus_id']   = $bus->id;
                    $bus_routes['route_id'] = $route;

                    $validator = Validator::make($bus_routes, BusRoute::$rules);
                    if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

                    BusRoute::create($bus_routes);
                }

                $class      .= 'alert-success';
                $message    .= 'Bus added successfully !';
            }else{
                $class      .= 'alert-danger';
                $message    .= 'Unable store Layout !';
            }
        }catch(ValidationException $e)
        {
            return Redirect::back();
        }

        DB::commit();

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
        $id = Crypt::decrypt($id);

        $bus = Bus::find($id);

        $bus_types = Bus::$bus_types;
        $seat_layouts_list = SeatLayout::pluck('name', 'id')->all();
        $seat_layouts = SeatLayout::whereStatus(1)->get();
        $bus_routes = Route::with('source', 'destination')->where('status',1)->get();
        $bus_route_list = [];
        foreach($bus_routes as $k => $v) {
            $bus_route_list[$v->id] = $v->source['name'].' - '.$v->destination['name'];
        }

        return view('admin.master.buses.edit', compact('bus', 'bus_types', 'seat_layouts', 'seat_layouts_list', 'bus_route_list'));
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
        $id     = Crypt::decrypt($id); 
        $rules  = Bus::$rules;

        $rules['bus_number']   = $rules['bus_number'] . ',id,' . $id;

        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $bus = Bus::findOrFail($id);

        $message = '';

        DB::beginTransaction();

        try {

            $bus->fill($data);
            if($bus->save()) {

                //delete existing routes
                if(DB::table('bus_routes')->where('bus_id', $bus->id)->delete()) {
                    //create new record
                    foreach($request->bus_routes as $route) {
                        $bus_routes = [];
                        $bus_routes['bus_id']   = $bus->id;
                        $bus_routes['route_id'] = $route;

                        $validator = Validator::make($bus_routes, BusRoute::$rules);
                        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

                        BusRoute::create($bus_routes);
                    }
                }
                

                $message .= 'Bus Updated Successfully !';
            }else{
                $message .= 'Bus to update  Department !';
            }
            
        }catch(ValidationException $e)
        {
            return Redirect::back();
        }

        DB::commit();

        return Redirect::route('admin.bus')->with('message', $message);
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
