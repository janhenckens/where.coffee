// Get current location
function showlocation() {
   // One-shot position request.
   navigator.geolocation.getCurrentPosition(callback);

}
 
// Show current location
function callback(position) {
   document.getElementById('latitude').innerHTML = position.coords.latitude;
   document.getElementById('longitude').innerHTML = position.coords.longitude;
   document.getElementById('altitude').innerHTML = position.coords.altitude;
}