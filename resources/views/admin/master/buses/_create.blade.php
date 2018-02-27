{!! Form::text('bus_name', null, ['class' => 'form-control', 'id' => 'bus_name', 'autocomplete' => 'off', 'required' => true, 'placeholder' => 'Bus Name']) !!}
                
<br>

{!! Form::text('bus_number', null, ['class' => 'form-control', 'id' => 'bus_number', 'autocomplete' => 'off', 'required' => true, 'placeholder' => 'Bus Number']) !!}

<br>
{!! Form::select('bus_type', $bus_types, null, ['class' => 'form-control', 'id' => 'bus_type', 'required' => true, 'placeholder' => 'Select Bus Type']) !!}

<br>
{!! Form::select('bus_routes[]', $bus_route_list, null, ['class' => '', 'id' => 'select-bus-routes', 'required' => true, 'placeholder' => 'Select Bus Route']) !!}

<br>
{!! Form::select('seat_layout_id', $seat_layouts_list, null, ['class' => 'form-control', 'id' => 'seat_layout_id', 'required' => true, 'placeholder' => 'Select Bus Layout']) !!}



@foreach($seat_layouts as $k => $v)

<div class="col-md-5 col-xs-11 col-sm-5 panel" style="margin-top: 30px; padding: 10px; background: #f6f6f6">
	<div class="col-md-10 col-xs-12">
			
		
		<?php 
		$seatLayout = '';
		$seatLayout =(string)($v->layout);

		$seat_arr = [];
		$seat_arr = json_decode($v->layout, true);

		foreach($seat_arr as $seats) {
			echo '<div class="row seat-row">';
			foreach($seats as $seat) {
		?>
			
				@if($seat['type'] != 'aisle')
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="28">
						<span class="_2CpW _1Zjt"></span> <span class="seat-no">{{ $seat['seat_no'] }}</span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				@else
				<div class="col-md-2 col-xs-2">&nbsp;</div>
				@endif
			
		<?php
				
			}
			echo '</div>';
		}
		?>
		

		<h4 style="text-align: center;" class="btn btn-primary btn-sm">BUS LAYOUT : {{ $v->name  }}</h4>
		
	</div>
</div>
<div class="col-md-1"></div>
@endforeach