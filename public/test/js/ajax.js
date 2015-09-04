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
      console.log("Longitude: " + $long);
      console.log("Latitude: " + $lat);
      // start ajax post request    
      $.ajax({
        url: '/test/php/rest.php',
        type: 'post',
        data: {'latitude': $lat, 'longitude': $long},
        success: function(data) {
          var feed = jQuery.parseJSON(data);
          console.log(feed.meta);
          for (var i = 0, l=feed.response.groups[0].items.length ;i < l; i++) 
          {
            $( "#location" ).append(feed.response.groups[0].items[i].venue.name + "(" + feed.response.groups[0].items[i].venue.location.lat + "/" + feed.response.groups[0].items[i].venue.location.lng + ")<br>");
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
    };

  });
});