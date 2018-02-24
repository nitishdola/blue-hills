@extends('layouts.public.main')

@section('pageCss')
<link rel="stylesheet" href="{{ asset('world/css/home.css') }}">
@stop


@section('main_content')
@if ($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif

<div class="top-area show-onload">         
    <div class="bg-holder full">
        <div class="bg-mask"></div>
        <div class="bg-parallax"></div>
        <div class="bg-content map-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="search-tabs search-tabs-bg mt50">
                            
                            <div class="tabbable">
                                
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-4">
                                        <h2 class="section-title">Book Bus Tickets</h2>
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                                        <label>Leaving From</label>
                                                        <input class="typeahead form-control" placeholder="FROM" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                                        <label>Going to</label>
                                                        <input class="typeahead form-control" placeholder="TO" type="text" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-daterange" data-date-format="M d, D">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>Journey Date</label>
                                                            <input class="form-control" name="start" type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-primary btn-lg" href="search.html">Search Buses</a>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="loc-info text-right hidden-xs hidden-sm">
                            <div class="loc-info text-right hidden-xs hidden-sm">
                            
                            <div class="home-ad-slider">
                              <div><img src="{{ url('world/img/home-ads/ad1.jpg') }}"></div>
                              <div><img src="{{ url('world/img/home-ads/ad2.jpg') }}"></div>
                              <div><img src="{{ url('world/img/home-ads/ad3.gif') }}"></div>
                            </div>
                            
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div id="map"></div>

        </div>
    </div>
</div>
<!-- END TOP AREA  -->

<div class="gap"></div>


<div class="container">
    <div class="row row-wrap" data-gutter="60">
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header">
                    <img src="{{ url('world/img/hot_deals.png') }}">
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">Best Price Guarantee</a></h5>
                    <p class="thumb-desc">Eu lectus non vivamus ornare lacinia elementum faucibus natoque parturient ullamcorper placerat</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header">
                    <img src="{{ url('world/img/gps.png') }}">
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">GPS Tracking</a></h5>
                    <p class="thumb-desc">Imperdiet nisi potenti fermentum vehicula eleifend elementum varius netus adipiscing neque quisque</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header">
                    <img src="{{ url('world/img/multimedia_icon.png') }}">
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#"> Travel Agent Register</a></h5>
                    <p class="thumb-desc">Curae urna fusce massa a lacus nisl id velit magnis venenatis consequat</p>
                </div>
            </div>
        </div>
    </div>
    <div class="gap gap-small"></div>
</div>

<div class="section-divider"></div>

<div class="container route-section">
    <div class="row row-wrap" data-gutter="60">
        <h2 class="section-title">OUR ROUTES</h5>
    </div>
    
    <div class="row row-wrap" data-gutter="60">
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI - JORHAT</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI- DIBRUGARH</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI- DIGBOI</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI- ITANAGAR</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI- AMGURI</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI- DULIAJAN</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI - IMPHAL</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI- SILCHAR</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI- DHEMAJI</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI- N.LAKHIMPUR</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI- JONAI</h6>
        </div>
        
        <div class="col-xs-2">
            <h6 class="route-list">GUWAHATI- DIMAPUR</h6>
        </div>
        
    </div>
    <div class="gap gap-small"></div>
</div>

@endsection
