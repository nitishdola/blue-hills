@extends('layouts.admin.main')

@section('content')
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">View All Buses</h3>
    </div>
    
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ count($results) }} Results Found :</h3>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bus Name</th>
                        <th>Bus Number</th>
                        <th>Bus Type</th>
                        <th>Route</th>
                        <th>Layout</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($results as $k => $v)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $v->bus_name}}</td>
                            <td>{{ $v->bus_number }}</td>
                            <td>{{ $v->bus_type }}</td>
                            <td>
                                @foreach($v->bus_routes as $route)
                                    {{ $route->route->source['name']}} - {{ $route->route->destination['name']}}
                                @endforeach
                            </td>
                            <td>{{ $v->seat_layout['name'] }}</td>
                            <td><a href="{{ route('admin.bus.edit', Crypt::encrypt($v->id)) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
