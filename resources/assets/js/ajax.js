$(document).ready(function() {
    $("[id^='search']").on('submit', function (e) {
        e.preventDefault();
        var formId = this.id;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Check how we are going to search
        if(formId == 'search-geo') {
            navigator.geolocation.getCurrentPosition(success, error);
            function success(position) {
                console.log("Location found (2)");
                var $lng = position.coords.longitude;
                var $lat = position.coords.latitude;
                var $location = $lat + ',' + $lng;
                var $request_type = 'geo';
                var $url = '/geo';
                var request = $.ajax({
                    type: 'post',
                    url: $url,
                    data: {'lat': $lat, 'lng': $lng, 'searchlocation': $location, 'request_type' : $request_type},
                    success: function (data) {
                        $('.panel').fadeOut('slow').addClass('hidden');
                    }
                })
                request.done(function(data) {
                    var locations = jQuery.parseJSON(data);
                    $('#map').fadeIn('slow').show();
                    console.log(locations.center.lat);
                    console.log(locations.center.lng);
                    L.mapbox.accessToken = 'pk.eyJ1IjoiamFuaGVuY2tlbnMiLCJhIjoiMzc2NDI5MDE1ZWI5NzZlOTBmZjNmMWQxMTgxNmQ4ZGMifQ.0MzXVdyyPn7Xt5qnmp2KbQ';
                    var map = L.mapbox.map('map', 'janhenckens.i204n3ak').setView([locations.center.lat, locations.center.lng], 15);
                    var myLocation = L.icon({
                        iconSize: [35, 95],
                        popupAnchor: [0,-37],
                        iconUrl: 'http://where.coffee/assets/img/yourlocation.png',

                    });
                    $.each(locations.venues, function() {
                        console.log(this.lat);
                        console.log(this.name);
                        var markerContent = '<h2>' + this.name + '</h2>';
                        L.marker([this.lat, this.lng], {
                            icon: L.mapbox.marker.icon({
                                'marker-color': '#BE9A6B',
                                'marker-symbol': 'cafe',
                                'marker-size': 'large'
                            })
                        },{
                            title: this.name,
                        }).addTo(map).bindPopup(markerContent);
                    })
                });
                //var mylocationContent = '<H2>You are here</H2>';
                //L.marker([locations.center.lat, locations.center.lng], {icon: myLocation}).addTo(map).bindPopup(mylocationContent);
            }
            function error(position) {
                console.log('location not found');
            }
        }

        if(formId == 'search-location') {
            var $location =  $('input[name=searchlocation]').val();
            var $request_type = 'location';
            var url = '/search';
            var request = $.ajax({
                type: 'post',
                url: url,
                data: {'searchlocation': $location, 'request_type': $request_type},
                success:  function(data){
                    console.log(data);
                    $('.panel').fadeOut('slow').addClass('hidden');
                }
            })
            request.done(function(data) {
                var locations = jQuery.parseJSON(data);
                $('#map').fadeIn('slow').show();
                console.log(locations.center.lat);
                console.log(locations.center.lng);
                L.mapbox.accessToken = 'pk.eyJ1IjoiamFuaGVuY2tlbnMiLCJhIjoiMzc2NDI5MDE1ZWI5NzZlOTBmZjNmMWQxMTgxNmQ4ZGMifQ.0MzXVdyyPn7Xt5qnmp2KbQ';
                var map = L.mapbox.map('map', 'janhenckens.i204n3ak').setView([locations.center.lat, locations.center.lng], 15);
                var myLocation = L.icon({
                    iconSize: [35, 95],
                    popupAnchor: [0,-37],
                    iconUrl: 'http://where.coffee/assets/img/yourlocation.png',

                });
                $.each(locations.venues, function() {
                    console.log(this.lat);
                    console.log(this.name);
                    var markerContent = '<h2>' + this.name + '</h2>';
                    L.marker([this.lat, this.lng], {
                        icon: L.mapbox.marker.icon({
                            'marker-color': '#BE9A6B',
                            'marker-symbol': 'cafe',
                            'marker-size': 'large'
                        })
                    },{
                        title: this.name,
                    }).addTo(map).bindPopup(markerContent);
                })
            });
        }
    });
});
