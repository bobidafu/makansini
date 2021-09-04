var categories = {
	"Fries": {
		label: '🍟'
	},
	"Burger": {
		label: '🍔'
	},
	"Chicken": {
		label: '🍗'
	},
	"Sandwich": {
		label: '🥪'
	},
	"Korean": {
		label: '🇰🇷'
	},
	"Hot & Spicy": {
		label: '🌶️'
	},
	"Beef": {
		label: '🐄'
	},
	"Healthy": {
		label: '🥗'
	},
	"Ice Cream": {
		label: '🍦'
	},
	"": {
		label: '😋'
	}
};

function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
		center: new google.maps.LatLng(4.5353, 114.7277),
		zoom: 10
	});
	var infoWindow = new google.maps.InfoWindow;

		// Change this depending on the name of your PHP or XML file
		downloadUrl('markers-data.php', function(data) {
			var xml = data.responseXML;
			var markers = xml.documentElement.getElementsByTagName('marker');

			Array.prototype.forEach.call(markers, function(markerElem) {
				var id = markerElem.getAttribute('id');
				var name = markerElem.getAttribute('name');
				var location = markerElem.getAttribute('location');
				var district = markerElem.getAttribute('district');

				var point = new google.maps.LatLng(
					parseFloat(markerElem.getAttribute('lat')),
					parseFloat(markerElem.getAttribute('lng')));
				console.log(point);

				//Vendor's name
				var infowincontent = document.createElement('div');
				var strongName = document.createElement('strong');
				strongName.textContent = name
				infowincontent.appendChild(strongName);
				infowincontent.appendChild(document.createElement('br'));

				//Branch's District
				var strongDis = document.createElement('strong');
					strongDis.textContent = district + ' District'
					infowincontent.appendChild(strongDis);
					infowincontent.appendChild(document.createElement('br'));
					infowincontent.appendChild(document.createElement('br'));

				//Maker's icon label
				var category = markerElem.getAttribute('category');
				/*var icon = customLabel[category] || {};*/
				var icon = categories[category] || {};

				//Branch's location
				var text = document.createElement('text');
				text.textContent = location
				infowincontent.appendChild(text);

				//Markers
				var marker = new google.maps.Marker({
					map: map,
					position: point,
					label: icon.label
				});

				//Click marker once to display information
				marker.addListener('click', function() {
					infoWindow.setContent(infowincontent);
					infoWindow.open(map, marker);

					//Click marker once more to redirect to vendor's page
					marker.addListener('click', function() {
						window.location.href = 'vendor.php?id=' + markerElem.getAttribute('id');
					});
				});
			});
		});
	}

	function downloadUrl(url, callback) {
		var request = window.ActiveXObject ?
		new ActiveXObject('Microsoft.XMLHTTP') :
		new XMLHttpRequest;

		request.onreadystatechange = function() {
			if (request.readyState == 4) {
				request.onreadystatechange = doNothing;
				callback(request, request.status);
			}
		};

		request.open('GET', url, true);
		request.send(null);
	}

	function doNothing() {}