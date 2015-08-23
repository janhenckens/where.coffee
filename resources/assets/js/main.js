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