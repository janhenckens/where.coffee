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
        console.log(json);
      });
      // end ajax call
    }
    function error(position) {
      console.log(position);
    }
  });
});