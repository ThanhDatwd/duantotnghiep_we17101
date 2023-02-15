<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <title>Google Maps JavaScript API</title>
   <script
      src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA7j_Q-rshuWkc8HyFI4V2HxQYPm-xtd00hTQOC0OXpAMO40FHAxT29dNBGfxqMPq5zwdeiDSHEPL89A"
      type="text/javascript"></script>
   <script language="javascript">
      var geocoder, location1, location2;
function initialize() {
geocoder = new GClientGeocoder();
}
function showLocation() {
geocoder.getLocations(document.forms[0].address1.value, function (response) {
if (!response || response.Status.code != 200)
{
alert("Sorry, we were unable to geocode the first address");
}
else
{
location1 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
geocoder.getLocations(document.forms[0].address2.value, function (response) {
if (!response || response.Status.code != 200)
{
alert("Sorry, we were unable to geocode the second address");
}
else
{
location2 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
calculateDistance();
}
});
}
});
}
 
function calculateDistance()
{
try
{
var glatlng1 = new GLatLng(location1.lat, location1.lon);
var glatlng2 = new GLatLng(location2.lat, location2.lon);
var miledistance = glatlng1.distanceFrom(glatlng2, 3959).toFixed(1);
var kmdistance = (miledistance * 1.609344).toFixed(1);
 
document.getElementById(‘results’).innerHTML = ‘<strong>Địa chỉ 1: </strong>’ + location1.address + ‘<br /><strong>Địa chỉ 2: </strong>’ + location2.address + ‘<br /><strong>Khoảng cánh: </strong>’ + miledistance + ‘ miles (or ‘ + kmdistance + ‘ km)’;
}
catch (error)
{
alert(error);
}
}
 
   </script>
</head>

<body onload="initialize()">

   <form action="#" onsubmit="showLocation(); return false;">
      <p>
         <input type="text" name="address1" value="Address 1" class="address_input" size="40" />
         <input type="text" name="address2" value="Address 2" class="address_input" size="40" />
         <input type="submit" name="find" value="Search" />
      </p>
   </form>
   <p id="results"></p>
</body>
 <script>
   function distance(lat1, lon1, lat2, lon2) {
  var R = 6371e3; // metres
  var φ1 = lat1 * Math.PI/180;
  var φ2 = lat2 * Math.PI/180;
  var Δφ = (lat2-lat1) * Math.PI/180;
  var Δλ = (lon2-lon1) * Math.PI/180;

  var a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
          Math.cos(φ1) * Math.cos(φ2) *
          Math.sin(Δλ/2) * Math.sin(Δλ/2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

  var d = R * c;
  return d;
}

var lat1 = 51.515419;
var lon1 = -0.141099;
var lat2 = 40.741895;
var lon2 = -73.989308;

console.log(distance(lat1, lon1, lat2, lon2));
 </script>
</html>