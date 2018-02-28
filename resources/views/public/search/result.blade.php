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
                                </ul><span class="booking-item-rating-number"><b >4.8</b> of 5</span><small>(400 reviews)</small>
                            </div>
                            
                            <h5 class="booking-item-title">Blue Hills</h5>
                            <p class="booking-item-address"><i class="fa fa-map-marker"></i> ISBT </p>
                            
                        </div>
						
						<div class="col-md-4">
							<div class="booking-item-rating">
								<span class="booking-item-rating-number"><b ><span id="jorney_time_{{ $v->id }}"> {{ $v->start_time }} - {{ $v->end_time }}</span></b>
								<h6 class="booking-item-title"> <i class="fa fa-clock-o" aria-hidden="true"></i>
								Duration 08 h 30m  </h6>
								</span>
                            </div>
						</div>
						
                        <div class="col-md-3"><span class="booking-item-price">&#x20b9;  450.00</span> <br>
						<span class="btn btn-primary" data-toggle="modal" 
						onclick="viewSeats({{ $v->route_id }}, event, {{ $v->id }})">
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
		<div class="col-md-4 col-xs-12">
			
			<div class="row seat-row">
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ booked container_2" data-seatno="1">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">&nbsp;</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="2">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ ladies container_2" data-seatno="3">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
			</div>
			
			
			<div class="row seat-row">
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="4">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">&nbsp;</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="5">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ booked container_2" data-seatno="6">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
			</div>
			
			<div class="row seat-row">
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ booked container_2" data-seatno="7">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">&nbsp;</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="8">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="9">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
			</div>
			
			<div class="row seat-row">
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="10">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">&nbsp;</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="11">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="12">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
			</div>
			
			<div class="row seat-row">
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="13">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">&nbsp;</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="14">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="15">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
			</div>
			
			<div class="row seat-row">
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="16">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">&nbsp;</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="17">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="18">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
			</div>
			
			<div class="row seat-row">
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="19">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">&nbsp;</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="20">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="21">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
			</div>
			
			<div class="row seat-row">
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ booked container_2" data-seatno="22">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">&nbsp;</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="23">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="24">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
			</div>
			
			<div class="row seat-row">
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ booked container_2" data-seatno="25">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">&nbsp;</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="26">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="27">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
			</div>
			
			<div class="row seat-row">
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="28">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="29">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="30">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
				
				<div class="col-md-2 col-xs-2">
					<div class="_2gS_ container_2" data-seatno="31">
						<span class="_2CpW _1Zjt"></span>
						<span class="U6x5 _1Zjt"></span>
						<span class="_19QY _1Zjt"></span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-4 col-xs-12">
			<form>
				<div class="form-group form-group-lg">
					<label>Boarding Point</label>
					<select class="form-control">
						<option value="">Paltan Bazar</option>
						<option value="">ISBT-Guwahati</option>
						<option value="">Beltola Chariali</option>
						<option value="">Khanapara</option>
					</select>
				</div>
				<div class="form-group form-group-lg">
					<label>Dropping Point</label>
					<select class="form-control">
						<option value="">Dibrugarh</option>
					</select>
				</div>
			</form>
		</div>
		
		
		<div class="col-md-4  col-xs-12">
		
			<div class="booking-item-payment">
				<ul class="booking-item-payment-details">
					<li>
						<h5>Guwahati - Dibrugarh</h5>
						<div class="booking-item-payment-date col-xs-12">
							<p class="booking-item-payment-date-day">02-02-2018</p>
							<p class="booking-item-payment-date-weekday">Guwahati</p>
						</div><i class="fa fa-arrow-right booking-item-payment-date-separator"></i>
						<div class="booking-item-payment-date  col-xs-12">
							<p class="booking-item-payment-date-day">03-02-2018</p>
							<p class="booking-item-payment-date-weekday">Dibrugarh</p>
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
	function viewSeats(route_id, e, id ) {
		e.preventDefault();
		var data = url = '';

		//data = '&route_id='+route_id;
		data = '&route_id=3';
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
				showModal(resp, id)
			}
		});
	}

	function showModal(seatLayout, id) {
		
		$('#modalBusName').text($('#jorney_time_'+id).text());
		$.each(seatLayout, function (key, val) {
			console.log(val.name);
		});	
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
