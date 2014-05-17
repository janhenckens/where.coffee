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

      $.ajax({
        url: 'location',
        type: 'post',
        datatype: 'jsonp',
        data: {'latitude': $lat, 'longitude': $long},
        success: function(data) {
          var locations = jQuery.parseJSON(data);
          console.log(locations.meta);
            if(locations.meta.code == "200") {
              console.log("Status OK");
              // console.log(locations);
              //Start maxbox stuff
              console.log("Start drawing the map");
              var map = L.mapbox.map('map', 'http://a.tiles.mapbox.com/v3/examples.map-0l53fhk2.json', {zoom: 15, center: [$lat, $long]});
              var myLayer = L.mapbox.featureLayer().addTo(map);
              $.each(locations.response.groups[0].items, function() { 
                    var myIcon = L.icon({
                      title: this.venue.name
                    });
                    L.marker(
                      [this.venue.location.lat, this.venue.location.lng],{
                      title: this.venue.name,
                      }).bindLabel(this.venue.name)
                    .addTo(myLayer);
                });
            }
            else {
              console.log("Looks like foursquare is having issues, please try again later.");
            }
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
      }); 
      // end ajax call
    }
    function error(position) {
      console.log(position);
    }
  });
});


;