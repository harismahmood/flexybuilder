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
    <title>@yield('title')</title>
</head>
<body id="simple">
@yield('body')
<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
@yield('scripts')
<script>
    $(document).ready(function(){
        $(".black-toggle").css('border','1px solid #00aeef');
        $(".white-toggle").click(function(){
            $("body").css("background-image","none");
            $("body").css("background-color","#bdc3c7");
            $("#content").css("background-color","#ecf0f1");
            $(".white-toggle").css('border','1px solid #00aeef');
            $(".black-toggle").css('border','none');
        });

        $(".black-toggle").click(function(){
            $("body").css("background-image","url('../img/bg.png')");
            $("body").css("background-color","none");
            $("#content").css("background-color","#34495e");
            $(".black-toggle").css('border','1px solid #00aeef');
            $(".white-toggle").css('border','none');
        });
    });
</script>
</body>
</html>