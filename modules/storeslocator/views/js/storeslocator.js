/**
 * NOTICE OF LICENSE
 *
 * This file is licenced under the Software License Agreement.
 * With the purchase or the installation of the software in your application
 * you accept the licence agreement.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 *  @author    Codik
 *  @copyright 2015-2016 Codik
 *  @license   LICENSE.txt
 */
var map;
var markers = [];
var autocomplete, lat, lng;
function initialize() {
    map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: 46.602077, lng: 2.428552},
          zoom: 2
    });
    infoWindow = new google.maps.InfoWindow();
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    searchLocationsNear(autocomplete.getPlace().geometry.location);
  });
  
   navigator.geolocation.getCurrentPosition(function(location) {
    var here = new google.maps.LatLng(location.coords.latitude, location.coords.longitude);
    searchLocationsNear(here);
  }, function(error) {
    console.log("ERROR");
    initMarkers();
  });
}
function initMarkers()
{
	searchUrl += '?controller=stores&ajax=1&latitude=46.602077&longitude=2.428552&radius=2000';
	downloadUrl(searchUrl, function(data) {
		var xml = parseXml(data.trim());
		var markerNodes = xml.documentElement.getElementsByTagName('marker');
		var bounds = new google.maps.LatLngBounds();
		for (var i = 0; i < markerNodes.length; i++)
		{
			var name = markerNodes[i].getAttribute('name');
			var address = markerNodes[i].getAttribute('address');
			var addressNoHtml = markerNodes[i].getAttribute('addressNoHtml');
			var other = markerNodes[i].getAttribute('other');
			var id_store = markerNodes[i].getAttribute('id_store');
			var has_store_picture = markerNodes[i].getAttribute('has_store_picture');
			var latlng = new google.maps.LatLng(
			parseFloat(markerNodes[i].getAttribute('lat')),
			parseFloat(markerNodes[i].getAttribute('lng')));
			createMarker(latlng, name, address, other, id_store, has_store_picture);
			bounds.extend(latlng);
		}
		map.fitBounds(bounds);
		var zoomOverride = map.getZoom();
        if(zoomOverride > 10)
        	zoomOverride = 10;
		map.setZoom(zoomOverride);
    
    if(markerNodes.length == 0){
      map.setCenter(new google.maps.LatLng(46.602077,2.428552), 2); 
    }
	});
}
// Add a marker to the map and push to the array.
function addMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markers.push(marker);
}
function createMarker(latlng, name, address, other, id_store, has_store_picture)
{
	var html = '<b>'+name+'</b><br/>'+address+(has_store_picture === 1 ? '<br /><br /><img src="'+img_store_dir+parseInt(id_store)+'.jpg" alt="" />' : '')+other+'<br /><a href="http://maps.google.com/maps?saddr=&daddr='+latlng+'" target="_blank">'+translation_5+'<\/a>';
	var image = new google.maps.MarkerImage(img_ps_dir+logo_store);
	var marker = '';
	if (hasStoreIcon)
		marker = new google.maps.Marker({ map: map, icon: image, position: latlng });
	else
		marker = new google.maps.Marker({ map: map, position: latlng });
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(html);
		infoWindow.open(map, marker);
	});
	markers.push(marker);
}
function clearLocations(n)
{
	infoWindow.close();
	for (var i = 0; i < markers.length; i++)
		markers[i].setMap(null);
	markers.length = 0;
	locationSelect.innerHTML = '';
	var option = document.createElement('option');
	option.value = 'none';
	if (!n)
		option.innerHTML = translation_1;
	else
	{
		if (n === 1)
			option.innerHTML = '1'+' '+translation_2;
		else
			option.innerHTML = n+' '+translation_3;
	}
	locationSelect.appendChild(option);
	if (!!$.prototype.uniform)
		$("select#locationSelect").uniform();
	$('#stores-table tr.node').remove();
}
function searchLocationsNear(center)
{
	var radius = document.getElementById('radiusSelect').value;
	var searchUrl = '?controller=stores&ajax=1&latitude=' + center.lat() + '&longitude=' + center.lng() + '&radius=' + radius;
	downloadUrl(searchUrl, function(data) {
		var xml = parseXml(data.trim());
		var markerNodes = xml.documentElement.getElementsByTagName('marker');
		var bounds = new google.maps.LatLngBounds();
		clearLocations(markerNodes.length);
		$('table#stores-table').find('tbody tr').remove();
		for (var i = 0; i < markerNodes.length; i++)
		{
			var name = markerNodes[i].getAttribute('name');
			var address = markerNodes[i].getAttribute('address');
			var addressNoHtml = markerNodes[i].getAttribute('addressNoHtml');
			var other = markerNodes[i].getAttribute('other');
			var distance = parseFloat(markerNodes[i].getAttribute('distance'));
			var id_store = parseFloat(markerNodes[i].getAttribute('id_store'));
			var phone = markerNodes[i].getAttribute('phone');
			var has_store_picture = markerNodes[i].getAttribute('has_store_picture');
			var latlng = new google.maps.LatLng(
			parseFloat(markerNodes[i].getAttribute('lat')),
			parseFloat(markerNodes[i].getAttribute('lng')));
			createOption(name, distance, i);
			createMarker(latlng, name, address, other, id_store, has_store_picture);
			bounds.extend(latlng);
			address = address.replace(phone, '');
			$('table#stores-table').find('tbody').append('<tr ><td class="num">'+parseInt(i + 1)+'</td><td class="name">'+(has_store_picture == 1 ? '<img src="'+img_store_dir+parseInt(id_store)+'.jpg" alt="" />' : '')+'<span>'+name+'</span></td><td class="address">'+address+(phone !== '' ? ''+translation_4+' '+phone : '')+'</td><td class="distance">'+distance+' '+distance_unit+'</td></tr>');
			$('#stores-table').show();
		}
		if (markerNodes.length)
		{
			map.fitBounds(bounds);
			var listener = google.maps.event.addListener(map, "idle", function() {
				if (map.getZoom() > 13) map.setZoom(13);
				google.maps.event.removeListener(listener);
			});
		} else
      initMarkers();  
		locationSelect.style.visibility = 'visible';
		$(locationSelect).parent().parent().addClass('active').show();
		locationSelect.onchange = function() {
			var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
			google.maps.event.trigger(markers[markerNum], 'click');
		};
	});
}
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
}
function createOption(name, distance, num)
{
	var option = document.createElement('option');
	option.value = num;
	option.innerHTML = name+' ('+distance.toFixed(1)+' '+distance_unit+')';
	locationSelect.appendChild(option);
}
function downloadUrl(url, callback)
{
	var request = window.ActiveXObject ?
	new ActiveXObject('Microsoft.XMLHTTP') :
	new XMLHttpRequest();
	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			request.onreadystatechange = doNothing;
			callback(request.responseText, request.status);
		}
	};
	request.open('GET', url, true);
	request.send(null);
}
function parseXml(str)
{
	if (window.ActiveXObject)
	{
		var doc = new ActiveXObject('Microsoft.XMLDOM');
		doc.loadXML(str);
		return doc;
	}
	else if (window.DOMParser)
		return (new DOMParser()).parseFromString(str, 'text/xml');
}
function doNothing()
{
}
 $( document ).ready(function() {
    initialize();
    console.log( "ready!" );
});