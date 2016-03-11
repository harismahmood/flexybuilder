<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ url('css/app.css') }}" />
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ url('css/animate.css') }}" />
        <link rel="stylesheet" href="{{ url('css/normal.css') }}" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <title>@yield('title')</title>
    </head>
    <body id="main">
    <div class="loading"><div class="animated fadeIn infinite"><img src="{{ url('img/loading.png') }}" class="loading-image img-responsive" /></div></div>
            <div id="topbar" class="animated slideInDown">
                <div class="heading animated zoomInUp">FlexyBuilder</div>
                <div id="hs">v1.0.0</div>
                <div id="toggle">
                    Colour Theme:
                    <div class="white-toggle"></div>
                    <div class="black-toggle"></div>
                </div>
            </div>
            <div id="navigation" class="animated slideInRight">
                <div class="nav-header">Welcome {{ $user -> name }}!</div>
                <div class="nav-heading">~Navigation~</div>
                <ul id="ul-nav">
                    <hr>
                    <li class="li-nav animated slideInRight"><a href="/login/logout"><i class="fa fa-sign-out"></i><div class="pull-right">Logout</div></a></li>
                    <hr>
                </ul>
                <div id="navigation-bottom">
                    <div class="center-block">©HSTech {{ date('Y') }}.</div>
                </div>
            </div>
            <div id="content" class="animated slideInRight">
                @yield('content')
            </div>
    @yield('body')
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    @yield('scripts')
	<script>
       $(window).load(function(){
            $(".loading").delay(1000).fadeOut("slow");
        });

		$(document).ready(function(){
            function colorUpd(typeCC){
                $.post('/ajax/colorupd',{color:typeCC,id:{{ $user->id }},_token:'{{ csrf_token() }}'});
            }

           $.post('/ajax/colorget',{id:{{ $user->id }},_token:'{{ csrf_token() }}'},function(data){
               if (data == 0){
                   $("body").removeAttr('id');
                   $("body").attr('id','white');
                   $(".white-toggle").css('border','1px solid #00aeef');
                   $(".black-toggle").css('border','none');
                   $(".white-toggle").css('border','1px solid #00aeef');
                   $(".black-toggle").css('border','none');
                   $("hr").addClass('black');
               }
                if (data == 1) {
                    $("body").attr('id',"main");
                    $(".black-toggle").css('border','1px solid #00aeef');
                    $(".white-toggle").css('border','none');
                    $("hr").removeClass('black');
                }
            });

			$(".white-toggle").click(function(){
                $("body").removeAttr('id');
                $("body").attr('id','white');
                $("hr").addClass('black');
                $(".white-toggle").css('border','1px solid #00aeef');
                $(".black-toggle").css('border','none');
			    $(".white-toggle").css('border','1px solid #00aeef');
			    $(".black-toggle").css('border','none');
                colorUpd('0');
			});
			
			$(".black-toggle").click(function(){
                $("body").attr('id',"main");
			    $(".black-toggle").css('border','1px solid #00aeef');
			    $(".white-toggle").css('border','none');
                $("hr").removeClass('black');
                colorUpd('1');
            });
		});
	</script>
    </body>
</html>