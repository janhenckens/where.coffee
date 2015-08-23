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
            L.mapbox.accessToken = 'pk.eyJ1IjoiamFuaGVuY2tlbnMiLCJhIjoiMzc2NDI5MDE1ZWI5NzZlOTBmZjNmMWQxMTgxNmQ4ZGMifQ.0MzXVdyyPn7Xt5qnmp2KbQ';
            var map = L.mapbox.map('map', 'janhenckens.i204n3ak').setView([locations.center.lat, locations.center.lng], 15);
        });
    });
});

//# sourceMappingURL=app.js.map