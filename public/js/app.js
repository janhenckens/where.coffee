$(document).ready(function() {
    $('#getlocation').on('click', function(e){
        e.preventDefault();
        $('#getlocation').attr("disabled", "disabled");
        navigator.geolocation.getCurrentPosition(success, error);
    });
    function success(position) {
        console.log("Location found (2)");
        var $lng = position.coords.longitude;
        var $lat = position.coords.latitude;
        var $url = '/here';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: $url,
            data: {'lat': $lat, 'lng': $lng, 'request_type' : 'geo'},
            success: function (data) {
                console.log(data);
            }
        })

    }
    function error(position) {
        console.log('location not found');
    }

});
$(document).ready(function() {
    $('form#query').on('submit', function (e) {
        e.preventDefault();
        var $location =  $('input[name=searchlocation]').val();
        var $request_type = $('input[name=request_type]').val();
        var url = '/search';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var request = $.ajax({
            type: 'post',
            url: url,
            data: {'searchlocation': $location, 'request_type': $request_type},
            success:  function(){
                $('#form').fadeOut('slow').addClass('hidden');
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
                L.marker([this.lat, this.lng], {
                    icon: L.mapbox.marker.icon({
                        'marker-color': '#BE9A6B',
                        'marker-symbol': 'cafe',
                        'marker-size': 'large'
                    })
                },{
                    title: this.name,
                }).addTo(map);
            })


            //var mylocationContent = '<H2>You are here</H2>';
            //L.marker([locations.center.lat, locations.center.lng], {icon: myLocation}).addTo(map).bindPopup(mylocationContent);
        });
    });
});

//# sourceMappingURL=app.js.map