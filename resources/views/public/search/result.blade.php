@extends('layouts.public.main')

@section('main_content')
@if ($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
<div class="container">
<ul class="breadcrumb">
    <li><a href="index-2.html">Home</a>
    </li>
    <li class="active">Bus Results</li>
</ul>

<h3 class="booking-title">{{ count($search_results )}} Buses Found for your journey</h3>

<div class="row">
    <div class="col-md-12">
        <div class="nav-drop booking-sort">
            <h5 class="booking-sort-title"><a href="#">Sort: Price (low to high)<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a></h5>
            <ul class="nav-drop-menu">
                <li><a href="#">Price (hight to low)</a>
                </li>
                <li><a href="#">Ranking</a>
                </li>
                <li><a href="#">Bedrooms (Most to Least)</a>
                </li>
                <li><a href="#">Bedrooms (Least to Most)</a>
                </li>
                <li><a href="#">Number of Reviews</a>
                </li>
                <li><a href="#">Number of Photos</a>
                </li>
                <li><a href="#">Just Added</a>
                </li>
            </ul>
        </div>
        <ul class="booking-list">
        	@foreach($search_results as $ki => $v)

            <li>
                <a class="booking-item" href="#">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="booking-item-img-wrap">
                                <img src="{{ asset('world/img/bus-image.png') }}">
                            </div>
                        </div>
						
						
                        <div class="col-md-4">
                            <div class="booking-item-rating">
                                <!-- 
                                <ul class="icon-group booking-item-rating-stars">
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                </ul> -->
                                <!-- <span class="booking-item-rating-number"><b >4.8</b> of 5</span><small>(400 reviews)</small> -->
                            </div>
                            
                            <h5 class="booking-item-title">Blue Hills</h5>
                            <p class="booking-item-address"><i class="fa fa-map-marker"></i> {{ ucfirst($from_stoppage->name) }} </p>
                            
                        </div>
						
						<div class="col-md-4">
							<div class="booking-item-rating">
								<span class="booking-item-rating-number"><b ><span id="jorney_time_{{ $v->id }}"> {{ $v->start_time }} - {{ $v->end_time }}</span></b>
								<h6 class="booking-item-title"> <i class="fa fa-clock-o" aria-hidden="true"></i>
								Duration 
								<?php $duration = Helper::convertToHoursMins( $v->route['journey_duration'] ); ?>
								{{ $duration['h'] }} hours {{ $duration['m'] }} minutes
								 </h6>
								</span>
                            </div>
						</div>
						<?php $arrival_date = Helper::getArrivalDate($journey_date, $v->route['journey_duration']); ?>
                        <div class="col-md-3"><span class="booking-item-price">&#x20b9;  450.00</span> <br>
						<span class="btn btn-primary" data-toggle="modal" 
						onclick="viewSeats({{ $v->route_id }}, event, {{ $v->id }}, '{{ $arrival_date }}' )">
					View Seats</span>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
            
        </ul>
        

    </div>
</div>
<div class="gap"></div>
</div>



<div class="modal fade" id="seatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel"> <span id="modalBusName"></span> </h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body seat-layout-body">
		<div class="col-md-4 col-xs-12" id="seatLayoutBody"></div>
		
		<div class="col-md-4 col-xs-12">
			<form>
				<div class="form-group form-group-lg">
					<label>Boarding Point</label>
					<select class="form-control">
						@foreach($from_stoppages as $from_stoppage)
							<option value="{{ $from_stoppage->id }}"> {{ $from_stoppage->name }} </option>
						@endforeach
					</select>
				</div>
				<div class="form-group form-group-lg">
					<label>Dropping Point</label>
					<select class="form-control">
						@foreach($to_stoppages as $to_stoppage)
							<option value="{{ $to_stoppage->id }}"> {{ $to_stoppage->name }} </option>
						@endforeach
					</select>
				</div>
			</form>
		</div>
		
		
		<div class="col-md-4  col-xs-12">
		
			<div class="booking-item-payment">
				<ul class="booking-item-payment-details">
					<li>
						<h5>{{ $source_city_name }} - {{ $destination_city_name }}</h5>
						<div class="booking-item-payment-date col-xs-12">
							<p class="booking-item-payment-date-day">{{ $journey_date }}</p>
							<p class="booking-item-payment-date-weekday">{{ $source_city_name }}</p>
						</div><i class="fa fa-arrow-right booking-item-payment-date-separator"></i>
						<div class="booking-item-payment-date  col-xs-12">
							<p class="booking-item-payment-date-day"><span id="arrival_date"></span></p>
							<p class="booking-item-payment-date-weekday">{{ $destination_city_name }}</p>
						</div>
					</li>
					<li>
						<h5><strong>SEAT(S)</strong> <span id="no_seats"> No Seats Selected</span> <span id="selected_seats" style="display:none"></span></h5>
						
						<ul class="booking-item-payment-price pricing_details">
							<li>
								<p class="booking-item-payment-price-title">Fare</p>
								<p class="booking-item-payment-price-amount">&#x20b9; 450.00<small></small>
								</p>
							</li>
							
							<li>
								<p class="booking-item-payment-price-title">Total</p>
								<p class="booking-item-payment-price-amount">&#x20b9; <span id="totalPrice">450.00</span><small></small>
								</p>
							</li>
						</ul>
					</li>
					
					<div class="row pricing_details" style="margin:0px 0 10px 20px;">
						<a href="payment.html" class="btn btn-primary">Continue</a>
					</div>
				</ul>
				
				
			</div>
		</div>
				
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	  </div>
	</div>
  </div>
</div>
@endsection


@section('pageJs')
<script>
function selectseat(seatno){
	currentSeat = $('#seatID'+seatno);
	
	if (currentSeat.hasClass('booked')) {
		alert('Seat booked');
	}else if (currentSeat.hasClass('ladies')) {
		alert('Seat booked');
	}else if (currentSeat.hasClass('selet-seat')) {
		currentSeat.removeClass('selet-seat');
		
		var seat_index = seats.indexOf(seatno);
		if (seat_index > -1) {
			seats.splice(seat_index, 1);
		}
		showSeats(seats);
		calculateSeatFare(seats);
		checkSelectedSeats(seats);
	}else{
		currentSeat.addClass('selet-seat');	
		$('#no_seats').hide();
		$('#selected_seats').show();
		$('.pricing_details').show();
		seatno = currentSeat.data("seatno");
		seats.push(seatno);
		showSeats(seats);
		calculateSeatFare(seats);
		checkSelectedSeats(seats);
	}
}


	function viewSeats(route_id, e, id, arrival_date ) {
		e.preventDefault();
		var data = url = '';

		data = '&route_id='+route_id;
		//data = '&route_id=3';
		url  = "{{ route('api.get_layout') }}";
		//console.log(url+data);
		$.ajax({
			data : data,
			url  : url,
			type : 'GET',

			error : function(resp) {
				//console.log(resp);
				alert('Something went wrong !');
			},

			success : function(resp) {
				//console.log(resp);
				$('#arrival_date').text(arrival_date);
				showModal(resp, id)
			}
		});
	}

	function showModal(seatLayout, id) {
		$html = '';

		$('#seatLayoutBody').empty();

		$('#modalBusName').text($('#jorney_time_'+id).text());
		$.each(seatLayout, function (key, val) {
			if(key == 0) {
				json_parsed = '';
				json_parsed = $.parseJSON(val.layout);
				$.each(json_parsed, function (k, v) {
					$html += '<div class="row seat-row">';
					$.each(v, function (key1, val1) {

						
						if(val1.type == 'seater') {
							$html += '<div class="col-md-2 col-xs-2">';
								$html += '<div class="_2gS_ container_2" id="seatID'+val1.seat_no+'" data-seatno="'+val1.seat_no+'" onclick="selectseat('+val1.seat_no+')">';


									$html += '<span class="_2CpW _1Zjt"></span>';
									$html += '<span class="U6x5 _1Zjt"></span>';
									$html += '<span class="_19QY _1Zjt"></span>';

								$html += '</div>';
							$html += '</div>';
						}else{
							$html += '<div class="col-md-2 col-xs-2">&nbsp;</div>';
						}
						
					});
					$html += '</div>';
				});
			}
		});	
		
		$('#seatLayoutBody').html($html);

		$('#seatModal').modal('show'); 
	}
</script>


<script>


var seats = [];
var price = 450;

$('._2gS_').on('click', function(e) {
	alert('kkk');
	e.preventDefault();
	if ($(this).hasClass('booked')) {
		alert('Seat booked');
	}else if ($(this).hasClass('ladies')) {
		alert('Seat booked');
	}else if ($(this).hasClass('selet-seat')) {
		$(this).removeClass('selet-seat');
		seatno = $(this).data("seatno"); 
		var seat_index = seats.indexOf(seatno);
		if (seat_index > -1) {
			seats.splice(seat_index, 1);
		}
		showSeats(seats);
		calculateSeatFare(seats);
		checkSelectedSeats(seats);
	}else{
		$(this).addClass('selet-seat');	
		$('#no_seats').hide();
		$('#selected_seats').show();
		$('.pricing_details').show();
		seatno = $(this).data("seatno");
		seats.push(seatno);
		showSeats(seats);
		calculateSeatFare(seats);
		checkSelectedSeats(seats);
	}
	
});

function showSeats(seats) {
	$('#selected_seats').text(seats);
}

function calculateSeatFare(seats) {
	fare = seats.length*price;
	$('#totalPrice').text(fare.toFixed(2));
}

function checkSelectedSeats(seats) {
	if(seats.length) {
		$('#selected_seats').show();
		$('.pricing_details').show();
		$('#no_seats').hide();
	}else{
		$('#selected_seats').hide();
		$('.pricing_details').hide();
		$('#no_seats').show();
	}
}
</script>
@stop


@section('pageCss')
<style>
	.modal-dialog {
	  width: 100%;
	  height: 100%;
	  margin: 0;
	  padding: 0;
	}

	.modal-content {
	  height: auto;
	  min-height: 100%;
	  border-radius: 0;
	}
	
	.modal-body {
		position: relative;
		overflow-y: auto;
		max-height: 450px;
		padding: 15px;
	}
	._2IMZ{
	    width:56px;
	    height:18px;
	    border:1px solid #979797;
	    display:inline-block;
	    position:relative;
	    border-top-left-radius:2px;
	    border-bottom-left-radius:2px;
	    margin-right:10px;
	    cursor:pointer
	}
	._2IMZ.IlqM{
	    background:#c1c1c1;
	    border:1px solid #c1c1c1;
	    pointer-events:none
	}
	._2IMZ.IlqM span{
	    background:#fff;
	    border:1px solid #c1c1c1
	}
	._2IMZ._39aI,._2IMZ._39aI span,._2IMZ.pXg8{
	    border:1px solid #ff8eb5
	}
	._2IMZ.pXg8{
	    background:#ff8eb5;
	    pointer-events:none
	}
	._2IMZ.pXg8 span{
	    background:#fff;
	    border:1px solid #ff8eb5
	}
	._2IMZ._1LG_{
	    background:#20bf7a;
	    border:1px solid #20bf7a
	}
	._2IMZ._1LG_ span{
	    background:#fff;
	    border:1px solid #20bf7a
	}




	._2IMZ span{
	    position:absolute;
	    top:2px;
	    bottom:2px;
	    width:4px;
	    right:2px;
	    border:1px solid #979797;
	    border-radius:2px
	}
	._3AF7{
	    margin-bottom:5px
	}
	._2gS_{
	    position:relative;
	    width:18px;
	    height:23px;
	    border:1px solid #979797;
	    display:inline-block;
	    border-top-left-radius:2px;
	    border-bottom-left-radius:2px;
	    margin-right:10px;
	    cursor:pointer
	}
	._2gS_ ._1Zjt{
	    position:absolute;
	    border:1px solid #979797
	}
	._2gS_ ._2CpW{
	    top:-4px;
	    border-top-left-radius:2px;
	    border-top-right-radius:2px;
	    border-bottom:none!important
	}
	._2gS_ ._2CpW,._2gS_ .U6x5{
	    width:16px;
	    height:3px;
	    right:-1px
	}
	._2gS_ .U6x5{
	    bottom:-4px;
	    border-bottom-left-radius:2px;
	    border-bottom-right-radius:2px;
	    border-top:none!important
	}
	._2gS_ ._19QY{
	    width: 3px;
	    height: 16px;
	    right: -4px;
	    top: 2px;
	    border-bottom-right-radius: 2px;
	    border-top-right-radius: 2px;
	    border-left: none!important;
	}
	._2gS_.IlqM{
	    background:#c1c1c1;
	    border:1px solid #c1c1c1;
	    pointer-events:none
	}
	._2gS_.IlqM span{
	    background:#fff;
	    border:1px solid #979797
	}
	._2gS_._39aI,._2gS_._39aI span,._2gS_.pXg8{
	    border:1px solid #ff8eb5
	}
	._2gS_.pXg8{
	    background:#ff8eb5;
	    pointer-events:none
	}
	._2gS_.pXg8 span{
	    background:#fff;
	    border:1px solid #ff8eb5
	}
	._2gS_._1LG_{
	    background:#20bf7a;
	    border:1px solid #20bf7a
	}
	._2gS_._1LG_ span{
	    background:#fff;
	    border:1px solid #20bf7a
	}

	._2gS_.booked{
	    background:#BDBDBD;
	    border:1px solid #BDBDBD
	}
	._2gS_.booked span{
	    background:#fff;
	    border:1px solid #BDBDBD
	}


	._2gS_.ladies{
	    background:#F735D0;
	    border:1px solid #F735D0
	}
	._2gS_.ladies span{
	    background:#fff;
	    border:1px solid #F735D0
	}


	._2gS_.selet-seat{
	    background:#20bf7a;
	    border:1px solid #20bf7a
	}
	._2gS_.selet-seat span{
	    background:#fff;
	    border:1px solid #20bf7a
	}

	._1Yrk{
	    border:1px solid #fff;
	    visibility:hidden;
	    pointer-events:none
	}
	._2gnE{
	    vertical-align:super;
	    font-size:12px;
	    color:#494949;
	    margin-left:10px
	}
	._3tP5{
	    width:23px;
	    height:56px
	}
	._3tP5 ._2IMZ{
	    -webkit-transform:rotate(90deg);
	    transform:rotate(90deg);
	    -webkit-transform-origin:20% 50%;
	    transform-origin:20% 50%
	}
	@media screen and (min-device-width:1024px) and (max-device-width:1150px){
	    ._2IMZ{
	        width:40px
	    }
	    ._2gS_{
	        width:15px;
	        height:12px
	    }
	    ._2gS_ ._2CpW,._2gS_ .U6x5{
	        width:10px
	    }
	    ._2gS_ ._19QY{
	        height:8px;
	        top:1px
	    }
	}
	@media screen and (min-device-width:1150px) and (max-device-width:1300px){
	    ._2IMZ{
	        width:46px
	    }
	    ._2gS_{
	        width:18px;
	        height:15px
	    }
	    ._2gS_ ._2CpW,._2gS_ .U6x5{
	        width:12px
	    }
	    ._2gS_ ._19QY{
	        height:9px;
	        top:1px
	    }
	}
	@media screen and (min-device-width:1300px) and (max-device-width:1400px){
	    ._2IMZ{
	        width:52px
	    }
	    ._2gS_{
	        width:21px
	    }
	    ._2gS_ ._2CpW,._2gS_ .U6x5{
	        width:14px
	    }
	}


	.container_2 {
	    -webkit-transform: rotate(90deg);
	    -moz-transform: rotate(90deg);
	    -o-transform: rotate(90deg);
	    -ms-transform: rotate(90deg);
	    transform: rotate(90deg);
	}
	.seat-row {
		margin:8px 0;
	}

	.blue-bus {
		padding:14px;
		border:1px dotted #ddd;
	}
	.pricing_details {
		display:none;
	}
</style>
@stop
