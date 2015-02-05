var map=null;
var cur_location=null;

function initialize() {

    var minZoomLevel = 10;

    var mapOptions = {
      center: { lat: 35.142604, lng: 33.405216},
      zoom: minZoomLevel,
      disableDefaultUI:true
    };

    geocoder = new google.maps.Geocoder();

    var strictBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(34.630248, 31.994110),
        new google.maps.LatLng(35.493534, 33.840351)
    );

    map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

    google.maps.event.addListener(map, 'drag', function() {
        if (strictBounds.contains(map.getCenter())) return;

        var c = map.getCenter(),
        x = c.lng(),
        y = c.lat(),
        maxX = strictBounds.getNorthEast().lng(),
        maxY = strictBounds.getNorthEast().lat(),
        minX = strictBounds.getSouthWest().lng(),
        minY = strictBounds.getSouthWest().lat();

        if (x < minX) x = minX;
        if (x > maxX) x = maxX;
        if (y < minY) y = minY;
        if (y > maxY) y = maxY;

        map.setCenter(new google.maps.LatLng(y, x));
    });

    google.maps.event.addListener(map, 'zoom_changed', function() {
        if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);
    });

    google.maps.event.addListener(map, 'click', function(event) {
        cur_location = null;
        cur_location=event.latLng;
        if(flag){
            $("#marker-modal").modal("toggle");
        }else{
            swal({
              title: "You are not logged in.",
              text: "You have to be logged in to post an event.",
              type: "warning",
              showCancelButton: false,
              confirmButtonClass: 'btn-warning',
              confirmButtonText: 'Got it!'
            });
        }
    });			

    loadMarkers();

};

function placeMarker(eventID,location) {

    var placeMarker = new google.maps.Marker({
        position: location,
        map: map,
        animation:google.maps.Animation.DROP
    });
    
    var contents = null;
    
     $.ajax({
        url: "markers/phpsqlajax_getcontents.php",
        type: "POST",
        data: {
            eventID:eventID
        },
        async: false,
        success: function (data) {
            contents = JSON.parse(data);
        }
    });
    
    var infowindow = new InfoBubble({
          content: '<div class="info-element"><h4>'+contents.title+'</h4><p>'+contents.content+'</p></div>',
          minWidth:20,
          minHeight:40,
          maxWidth:150,
          maxHeight:150,
          shadowStyle: 1,
          padding: 5 ,
          backgroundColor: '#FFF',
          borderRadius: 5,
          arrowSize: 10,
          borderWidth: 1,
          borderColor: '#FFF',
          disableAutoPan: true,
          hideCloseButton: true,
          arrowPosition: 50,
          backgroundClassName: 'transparent',
          arrowStyle: 0
    });

    google.maps.event.addListener(placeMarker, 'mouseover', function() {
        infowindow.open(map,placeMarker);
    });

    google.maps.event.addListener(placeMarker,'mouseout',function(){
        infowindow.close();
    });           

    google.maps.event.addListener(placeMarker,'click',function() {
        map.setZoom(12);
        map.setCenter(placeMarker.getPosition());
        $('#marker-view').modal('toggle');
        $('#marker-view').on('hide.bs.modal', function () {            
            map.setZoom(10);
        });
    });

};

function saveMarker(eventID,location){

    $.ajax({
        url: 'markers/phpsqlajax_store.php',
        type: 'post',
        data: {
            lat:location.lat(),
            lng:location.lng(),
            event:eventID
        },
        success: function(output) {
             console.log(output);
        }
    });

}

function loadMarkers() {

    downloadUrl("markers/phpsqlajax_genxml.php", function(data) {
      
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
            var location = new google.maps.LatLng(
                markers[i].getAttribute("lat"),
                markers[i].getAttribute("lng")
            );
            
            var eventID = markers[i].getAttribute("eventID");
            placeMarker(eventID,location);
        }
    });

};

function insertMarker(eventID){
    console.log('lattidute : '+cur_location.lat()+', longitude : '+cur_location.lng());
    placeMarker(eventID,cur_location);	
    saveMarker(eventID,cur_location);
}

google.maps.event.addDomListener(window, 'load', initialize);