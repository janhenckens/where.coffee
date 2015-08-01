<!doctype html>
<html>
<head>
    <link rel="apple-touch-icon" href="/assets/img/icon.png">
    <link rel="icon" href="/assets/img/favicon.png">
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/apple-touch-icon-152x152.png" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />
    <title>where.coffee</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/main.min.js"></script>
    <script src='https://api.tiles.mapbox.com/mapbox.js/v1.6.3/mapbox.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox.js/v1.6.3/mapbox.css' rel='stylesheet' />
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
<div id='map'>
    <div class="container">
        <div class="panel">
            <img class="icon" src="../assets/img/icon_white.png" width="100px">
            <button id="getlocation" class="btn btn-primary">Get location!</button>
            <form id="searchlocation">
                <input  type="text" name="searchlocation" class="btn btn-secondary search" placeholder="search...">
                <input id="searchsubmit" class="btn btn-secondary searchsubmit" type="submit" value="go">
            </form>
            <a href="http://newsletter.onedge.be/h/i/9B066A5DDB877BA1"><button class="btn newsletter">Newsletter</button></a>
        </div>
    </div>

</div>
<a href="/"><div class="refresh"><img src="/assets/img/refresh.png" with="50px" height="50px"></div></a>


</body>
</html>