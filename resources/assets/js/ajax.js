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
            L.mapbox.accessToken = 'pk.eyJ1IjoiamFuaGVuY2tlbnMiLCJhIjoiZGEwM2Q4OTdkNzllMDBiNWI5NjQ4MDRkNzg5YjVhZTcifQ';
            L.mapbox.map('map', 'janhenckens.i204n3ak').setView([locations.center.lat, locations.center.lng], 9);

        });
    });
});
