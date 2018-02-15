// Fonction pour créer des cartes
function initMap(carte, latitude, longitude) {
    // Récupération de la position
    var position = new google.maps.LatLng(latitude, longitude);

    // Style de la carte
    var style = [
        {
            "featureType": "all",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "saturation": 36
                },
                {
                    "color": "#000000"
                },
                {
                    "lightness": 40
                }
            ]
        },
        {
            "featureType": "all",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#000000"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "featureType": "all",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 17
                },
                {
                    "weight": 1.2
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 21
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 17
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 29
                },
                {
                    "weight": 0.2
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 18
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 19
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 17
                }
            ]
        }
    ];

    // Création de la carte
    var map = new google.maps.Map(carte, {
        center: position,
        zoom: 14,
        styles: style,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true
    });
    map.setOptions({draggable: false});

    // Ajout d'un marqueur
    var marker = new google.maps.Marker({
        position: position,
        title :"Notre position",
        icon: "images/cartes/marker.png"
    });
    marker.setMap(map);
}

// On attends que tout soit chargé
google.maps.event.addDomListener(window, 'load', function(){
    var maps = document.querySelectorAll('.map');
    for(var i = 0; i < maps.length; i++) {
        var map = maps[i];
        var getLat = map.getAttribute("data-latitude");
        var getLng = map.getAttribute("data-longitude");
        initMap(map, getLat, getLng);
    }
});


window.addEventListener('load', function () {
    document.getElementById("joursSemaine").addEventListener("click", function (e) {
        var target = e.target,
            classHighLight = "highlight";

        var moveCard = function (indice) {
            var slider = document.querySelector('.slider');
            if(slider){
                var positionnement = parseInt(-1 * 600 * indice);
                var propriete = 'translateX('+positionnement+'px)';
                slider.style.transform = propriete;
            }
        }

        if (target.tagName == "LI") {
            var oldDay = e.currentTarget.querySelector('.' + classHighLight);
            oldDay.classList.remove(classHighLight);
            target.classList.add(classHighLight);

            var days = e.currentTarget.querySelectorAll('li');
            for (var i = 0; i < days.length; i++) {
                if (days[i] == target) {
                    moveCard(i);
                }
            }
        }
    });
});