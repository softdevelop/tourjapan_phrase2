<div id="googlemap">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script>
		var geocoder;
		var map;
		<?php isset($address) ? $address : '渋谷';?>

		function initialize() {
		  geocoder = new google.maps.Geocoder();
		  var latlng = new google.maps.LatLng(35.681382, 139.766084);
		  var mapOptions = {
		    zoom: 16,
		    center: latlng
		  }
		  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		  codeAddress();
		}

		function codeAddress() {
		  //var address = document.getElementById('address').value;
		  geocoder.geocode( { 'address': '<?php echo $detail['TourPackage']['address_google']?>'}, function(results, status) {
		    if (status == google.maps.GeocoderStatus.OK) {
		      map.setCenter(results[0].geometry.location);
		      var marker = new google.maps.Marker({
		          map: map,
		          position: results[0].geometry.location
		      });
		    } else {
		     
		    }
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	  </script>
	<div id="map-canvas"></div>
</div>