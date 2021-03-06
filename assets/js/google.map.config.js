(function($) {

	"use strict";

	$(document).ready(function() {
		// Google Maps
		//-----------------------------------------------
		if ($("#map-canvas").length>0) {

			// Set the coordinates of your location
			var myLatlng = {lat: 48.8589507, lng: 2.2770204};
			var myZoom = 12;
			function map_initialize() {
				var map = new google.maps.Map(document.getElementById('map-canvas'), {
					zoom: myZoom,
					center: myLatlng,
					scrollwheel: false
				});
				var marker = new google.maps.Marker({
					position: myLatlng,
					map: map
				});
			}
			google.maps.event.addDomListener(window, "load", map_initialize);
		}
	}); // End document ready
})(jQuery);