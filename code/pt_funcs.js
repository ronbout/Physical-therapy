// pt_funcs.js
// 11-20-11 rlb
// js functions used by physical therapy site

var map;
function initialize() {
	var pt_loc = new google.maps.LatLng(35.492975, -97.293521);
	var myOptions = {
	  zoom: 15,
	  center: pt_loc,
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  disableDefaultUI: true
	};
	map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
	var markerOptions = {
		position: pt_loc,
		map: map
	};
	pt_map = new google.maps.Marker(markerOptions);
}
function validate_form(thisButton)
{
	var thisForm = thisButton.form;
	return true;
}

function disableEnterKey(e)
{
     var key;      
     if(window.event)
          key = window.event.keyCode; //IE
     else
          key = e.which; //firefox      

     return (key != 13);
}

