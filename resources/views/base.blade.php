<!doctype html>
<html>
    <head>
        <title>where.coffee</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src='https://api.mapbox.com/mapbox.js/v2.2.1/mapbox.js'></script>
        <link href='https://api.mapbox.com/mapbox.js/v2.2.1/mapbox.css' rel='stylesheet' />
        <script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
        <meta name="csrf-token" content="<?php echo csrf_token() ?>" />
    </head>
    <body>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-36759939-6', 'where.coffee');
        ga('send', 'pageview');

    </script>
            @yield('content')
    </body>
</html>