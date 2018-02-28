<br>
{!! Form::select('route_id', $bus_route_list, null, ['class' => 'select-beast', 'id' => 'route_id', 'autocomplete' => 'off', 'required' => true, 'placeholder' => 'Select Bus Route']) !!}

<br>
{!! Form::text('start_time', null, ['class' => 'form-control', 'id' => 'start_time', 'required' => true, 'placeholder' => 'Start Time eg 5:30 PM']) !!}

<br>
{!! Form::text('end_time', null, ['class' => 'form-control', 'id' => 'end_time', 'required' => true, 'placeholder' => 'End Time eg 7:00 AM']) !!}
