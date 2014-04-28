<!doctype html>
<html>
<head>
	<title>Something</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/main.min.css">
	<script type="text/javascript" src="/assets/js/main.min.js"></script>
</head>
<body>
<input type="button" value="Search my current location"
    onclick="javascript:showlocation()" />   <br/>
 
Latitude: <span id="latitude"></span> <br/>
Longitude: <span id="longitude"></span><br />
Altitude: <span id="altitude"></span><br />
@yield('content')
</body>
</html>