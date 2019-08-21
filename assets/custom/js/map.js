function myMap() {
    var marker = [];
    var len = 12.3785919;

    var lon = 105.2714177;

    var mapProp = {

        center: new google.maps.LatLng(len, lon),
        /*gestureHandling: 'greedy',*/
        disableDefaultUI: false,
        zoomControl: true,
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        /* styles: [
             {
                 "featureType": "poi",
                 "stylers": [
                     { "visibility": "off" }
                 ]
             }
         ]*/

    };

    var map = new google.maps.Map(document.getElementById("map-layout"),mapProp);
    map.addListener('click', function(e) {
        deleteMarkers();
        placeMarkerAndPanTo(e.latLng, map);

    });
    function handleEvent(latlng) {
        $('.lnt-number').val(latlng.lng());
        $('.lat-number').val(latlng.lat())
    }
    function placeMarkerAndPanTo(latLng, map){

        var lat = latLng.lat();
        var lon = latLng.lng();
        $('.lnt-number').val(lon);
        $('.lat-number').val(lat);
        var marker1 = new google.maps.Marker({
            position: latLng,
            draggable: true,
            map: map,
            animation: google.maps.Animation.DROP
        });
        marker.push(marker1);

        marker1.addListener('dragend', function (e) {
            handleEvent(e.latLng);
        });

    }




    function setMapOnAll(map) {
        for (var i = 0; i < marker.length; i++) {
            marker[i].setMap(map);
        }
    }


    function clearMarkers() {
        setMapOnAll(null);
    }
    function deleteMarkers() {
        clearMarkers();
        marker = [];
    }
    /*google.maps.event.addListener(x,'dragend',function () {
        var lat = x.getPosition().lat();
        var lon = x.getPosition().lng();

    })*/
}
