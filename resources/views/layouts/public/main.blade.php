<!DOCTYPE HTML>
<html>
<head>
    <title>Blue Hills - Travels</title>

    <!-- <link rel="search" type="application/opensearchdescription+xml" title="redBus" href="opensearch.xml" /> -->
    <!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
    <!--[if lt IE 10]>
            <div class="MB"><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p></div>
        <![endif]-->
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="blue hills travels assam, online bus booking in assam, blue hills online bus booking, online bus ticket booking, bus booking, volvo ac bus booking, bus ticket booking, bus tickets @yield('SEC_content')" />
    <meta name="description" content="blue hills travels assam @yield('SEC_description')">
    <meta name="author" content="Nitish">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
	
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
	
    <link rel="stylesheet" href="{{ asset('world/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('world/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('world/css/icomoon.css') }}">

    <link rel="stylesheet" href="{{ asset('world/selectize.js/dist/css/selectize.css') }}">


    <link rel="stylesheet" href="{{ asset('world/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('world/css/mystyles.css') }}">
    <script src="js/modernizr.js"></script>

	
	<!--FONTS-->
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"> 
	<!--/FONTS-->
    @yield('pageCss')
</head>

<body class="boxed" style="background:url({{ url('world/img/patterns/dimension.png') }}">
    <div class="global-wrap">
        
        @include('layouts.public.header')


        @yield('main_content')


        @include('layouts.public.footer')

        <script src="{{ asset('world/js/jquery.js') }}"></script>
        <script src="{{ asset('world/js/bootstrap.js') }}"></script>
        <script src="{{ asset('world/js/slimmenu.js') }}"></script>
        <script src="{{ asset('world/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('world/js/bootstrap-timepicker.js') }}"></script>
        <script src="{{ asset('world/js/nicescroll.js') }}"></script>
        <script src="{{ asset('world/js/dropit.js') }}"></script>
        <script src="{{ asset('world/js/ionrangeslider.js') }}"></script>
        <script src="{{ asset('world/js/icheck.js') }}"></script>
        <script src="{{ asset('world/js/fotorama.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
        <script src="{{ asset('world/js/typeahead.js') }}"></script>
        <script src="{{ asset('world/js/card-payment.js') }}"></script>
        <script src="{{ asset('world/js/magnific.js') }}"></script>
        <script src="{{ asset('world/js/owl-carousel.js') }}"></script>
        <script src="{{ asset('world/js/fitvids.js') }}"></script>
        <script src="{{ asset('world/js/tweet.js') }}"></script>
        <script src="{{ asset('world/js/countdown.js') }}"></script>
        <script src="{{ asset('world/js/gridrotator.js') }}"></script>
        <script src="{{ asset('world/js/custom.js') }}"></script>
        <script src="{{ asset('world/js/switcher.js') }}"></script>
		
		<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
		
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js"></script>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js"></script>
        <script src="{{ asset('world/selectize.js/dist/js/standalone/selectize.min.js') }}"></script>
		<script>
		$(document).ready(function(){
		  // set up click/tap panels
			$('#doflip').click(function(){
				$('.flipeffect').addClass('flip');
			});
		  
		  $(document).mousemove(function(event){ 
			 TweenLite.to($('.top-area'), .5, {css:{'background-position':parseInt(event.pageX/8) + "px "+parseInt(event.pageY/12)+"px, "+parseInt(event.pageX/15)+"px "+parseInt(event.pageY/15)+"px, "+parseInt(event.pageX/30)+"px "+parseInt(event.pageY/30)+"px"}});
		  });
		  
		  //home ad slider
		  $('.home-ad-slider').bxSlider({
			auto: true,
			autoControls: true,
			stopAutoOnClick: true,
			pager: true,
			slideWidth: 600
		  });
		  
		});
		</script>

        @yield('pageJs')
    </div>
</body>


</html>