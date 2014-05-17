$(function(){
  $('#getlocation').on('click', function(e){
    console.log("Button Pressed (1)");
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(success, error);
    } else {
      error('not supported');
    }
    function success(position) {
      console.log("Location found (2)");
      var $long = position.coords.longitude;
      var $lat = position.coords.latitude;
      console.log("Longitude: " + $long); //DEBUG
      console.log("Latitude: " + $lat); //DEBUG

      // start ajax post request    
      $.post('location/', {longitude: $long, latitude: $lat}, function(json){
        var locations = jQuery.parseJSON(json);
        if(locations.meta.code == "200") {
          console.log("Status OK");
          console.log(locations);
          console.log(locations.response.groups[0].items[1].venue.name);

          //Start maxbox stuff
          console.log("Start drawing the map");
          var map = L.mapbox.map('map', 'http://a.tiles.mapbox.com/v3/examples.map-0l53fhk2.json', {zoom: 15, center: [$lat, $long]});
          for (var i = 0, l=locations.response.groups[0].items.length ;i < l; i++) 
          {
            var myIcon = L.icon({
              title: locations.response.groups[0].items[i].venue.name
            });

            L.marker(
              [locations.response.groups[0].items[i].venue.location.lat, locations.response.groups[0].items[i].venue.location.lng],
              {title: myIcon}
              )
            .addTo(map);
          }
          // End map init
        }
        else {
          console.log("Looks like foursquare is having issues, please try again later.");
        }
      });
      // end ajax call
    }
    function error(position) {
      console.log(position);
    }
  });
});


