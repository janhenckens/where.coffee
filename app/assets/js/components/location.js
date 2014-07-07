$(document).ready(function() {
  $('#getlocation').on('click', function(e){
    console.log("Button Pressed (1)");
    $('#getlocation').attr("disabled", "disabled");
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(success, error);
    } else {
      error('not supported');
    }
    function success(position) {
      console.log("Location found (2)");
      var $long = position.coords.longitude;
      var $lat = position.coords.latitude;
      $.ajax({
        url: 'location',
        type: 'post',
        datatype: 'json',
        cache: 'false',
        data: {'latitude': $lat, 'longitude': $long}
      })
      .done(function(data) {
        $('.container').fadeOut('slow');
        $('.container').addClass('hidden');
        var locations = jQuery.parseJSON(data);
        if(locations.meta.code == "200") {
              //Start maxbox stuff
              map = L.mapbox.map('map', 'http://a.tiles.mapbox.com/v3/examples.map-0l53fhk2.json', {zoom: 15, center: [$lat, $long]});
              var myLayer = L.mapbox.featureLayer().addTo(map);
              $.each(locations.response.groups[0].items, function() { 
                var popupContent =
                '<H2>' + this.venue.name + '</H2><br>' + this.venue.location.address + '<br>' + this.venue.location.postalCode + ' ' + this.venue.location.city;
                L.marker([this.venue.location.lat, this.venue.location.lng],{
                  title: this.venue.name,
                }).addTo(map).bindPopup(popupContent);
              });

              var myLocation = L.icon({
                iconUrl: '/assets/img/yourlocation.png',
                iconRetinaUrl: '/assets/img/yourlocation@2.png',
                iconSize: [35, 95],
                popupAnchor: [0,-37],
              });
              var mylocationContent = '<H2>You are here</H2>';
              L.marker([$lat, $long], {icon: myLocation}).addTo(map).bindPopup(mylocationContent);
            }
            else {
              alert("Looks like foursquare is having issues, please try again later.");
            }
          }); 
      // end ajax call
    }
    function error(position) {
    }
  });
$('form').on('submit', function (e) {
  e.preventDefault();
  var $location =  $('input[name=searchlocation]').val();
  $.ajax({
    type: 'post',
    url: 'search',
    data: {'location': $location},
    success: function () {
    }
  })
  .done(function(data) {
    $('.container').fadeOut('slow');
    $('.container').addClass('hidden');
    var locations = jQuery.parseJSON(data);

    if (locations.meta.code == "200") {
      console.log(locations.meta.code);
      console.log("Start drawing the map");
      var map = L.mapbox.map('map', 'http://a.tiles.mapbox.com/v3/examples.map-0l53fhk2.json', {zoom: 15, center: [locations.response.geocode.center.lat, locations.response.geocode.center.lng]});
      var myLayer = L.mapbox.featureLayer().addTo(map);
      $.each(locations.response.groups[0].items, function() { 
        var popupContent =
        '<H2>' + this.venue.name + '</H2><br>' + this.venue.location.address + '<br>' + this.venue.location.postalCode + ' ' + this.venue.location.city;
        L.marker([this.venue.location.lat, this.venue.location.lng],{
          title: this.venue.name,
        }).addTo(map).bindPopup(popupContent);
      });
    }
    else {
      alert("Looks like the location you searched for could not be found, please try again.");
      $('input[name=searchlocation]').val();
      $('.container').removeClass('hidden').fadeIn('slow');
    }
  });
});
});