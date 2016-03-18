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
    <title onclick="home()">Site Builder</title>
</head>
<body id="builder">
<div class="loading"><div class="animated fadeIn infinite"><img src="{{ url('img/loading.png') }}" class="loading-image img-responsive" /></div></div>
<div id="topbar" class="animated slideInDown">
    <div onclick="home()" class="pointer heading animated zoomInUp">FlexyBuilder</div>
    <div id="hs">v1.0.0</div>
    <div id="toggle">
        <div class="white-toggle"></div>
        <div class="black-toggle"></div>
        <i onclick="home()" id="home" class="pointer fa fa-home"></i>
        <i onclick="logOut()" id="powerOff" class="pointer fa fa-power-off"></i>
    </div>
</div>
<div id="canvas-container">
    <div class="container-center">
                <div id="topbar-builder">
                    <div class="left">
                        <i class="pointer fa fa-undo"></i>
                        |
                        <i class="pointer fa fa-repeat"></i>
                    </div>
                    <div class="topbar-builder-center">
                        <i onclick="canvasDesktop()" class="fa fa-laptop pointer"></i>
                        <i onclick="canvasTablet()" class="fa fa-tablet pointer"></i>
                        <i onclick="canvasMobile()" class="fa fa-mobile pointer"></i>
                    </div>
                    <div class="right">
                        <i class="pointer fa fa-cog"></i>
                    </div>
                </div>
                <div id="canvas">
                    <div id="canvas-header" onmouseenter="showLabel('canvas-header','Header')" onmouseleave="removeLabel()">
                    </div>
                    <div id="container-canvas-center" class="container">
                    <div id="columns-canvas-center" class="col-md-12">
                        <div onmouseenter="showLabel('canvas-center','Main Content')" onmouseleave="removeLabel()" id="canvas-center">

                        </div>
                    </div>
                    </div>
                    {{--<div id="sidebar-left">--}}
                        <div id="menu-box">

                        </div>
                        <div onclick="showMenu()" id="toolbox-button-show">
                            Menu
                        </div>
                        <div onclick="hideMenu()" id="toolbox-button-hide">
                          Hide Menu
                        </div>
                    {{--</div>--}}
                    {{--<div id="sidebar-right">--}}

                    {{--</div>--}}
                    <div id="canvas-footer" onmouseenter="showLabel('canvas-footer','Footer')" onmouseleave="removeLabel()">
                    </div>
                </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/core.js') }}"></script>
<script src="{{ url('js/app.js') }}"></script>
<script>
    $(window).load(function(){
        $(".loading").delay(1000).fadeOut("slow");
    });

    $(document).ready(function(){
        function colorUpd(typeCC){
            $.post('/ajax/colorupd',{color:typeCC,id:{{ $user->id }},_token:'{{ csrf_token() }}'});
        }

        $.post('/ajax/colorget',{id:{{ $user->id }},_token:'{{ csrf_token() }}'},function(data){
            //White
            if (data == 0){
                $("body").removeAttr('id');
                $("body").attr('id','white');
                $(".white-toggle").css('border','1px solid #00aeef');
                $(".black-toggle").css('border','none');
                $(".white-toggle").css('border','1px solid #00aeef');
                $(".black-toggle").css('border','none');
                $("hr").addClass('black');
                $("a").css('color','#000000');
                $(".heading ").css('color','#000000');
                $("#powerOff ").css('color','#000000');
                $("#fullScreen").css('color','#000000');
                $("#hs").css('color','#000000');
                $("#home").css('color','#000000');
                $("#menu-box").css('background-color','#ecf0f1');
            }
            //Black
            if (data == 1) {
                $("body").attr('id',"main");
                $(".black-toggle").css('border','1px solid #00aeef');
                $(".white-toggle").css('border','none');
                $("hr").removeClass('black');
                $("#hs").css('color','#ffffff');
                $("a").css('color','#ffffff');
                $(".heading ").css('color','#ffffff');
                $("#powerOff ").css('color','#ffffff');
                $("#home ").css('color','#ffffff');
                $("#fullScreen").css('color','#ffffff');
                $("#menu-box").css('background-color','#34495e');
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
            $("a").css('color','#000000');
            $(".heading ").css('color','#000000');
            $("#powerOff ").css('color','#000000');
            $("#fullScreen").css('color','#000000');
            $("#hs").css('color','#000000');
            $("#home").css('color','#000000');
            $("#menu-box").css('background-color','#ecf0f1');
            colorUpd('0');
        });

        $(".black-toggle").click(function(){
            $("body").attr('id',"main");
            $(".black-toggle").css('border','1px solid #00aeef');
            $(".white-toggle").css('border','none');
            $("hr").removeClass('black');
            $("a").css('color','#ffffff');
            $(".heading ").css('color','#ffffff');
            $("#powerOff").css('color','#ffffff');
            $("#fullScreen").css('color','#ffffff');
            $("#hs").css('color','#ffffff');
            $("#home").css('color','#ffffff');
            $("#menu-box").css('background-color','#34495e');
            colorUpd('1');
        });
    });
</script>
</body>
</html>