var poly = null;
var map = null;
var previousPosition = null;
var roadName=null;
var road = {'markers':[]};
var actualMarker = {'markers':[]};
var listeners={'listeners':[]};

function initialize() {
    var minZoomLevel = 10;
    
    var mapOptions = {
        center: { lat: 35.142604, lng: 33.405216},
        zoom: 10,
        disableDefaultUI:true
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var polyOptions = {
        strokeColor: '#555555',
        strokeOpacity: 1.0,
        strokeWeight: 3
    };
    
    poly = new google.maps.Polyline(polyOptions);
    poly.setMap(map);

    map.setMapTypeId(google.maps.MapTypeId.ROADMAP);

    geocoder = new google.maps.Geocoder();

    var strictBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(34.630248, 31.994110),
        new google.maps.LatLng(35.493534, 33.840351)
    );
    
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
            addLatLng(event);
        }else{
            swal("You are not logged in!", "You have to login to be able to post.","warning");
        }
    });	
    loadRoads();
}

function addLatLng(event) {
    var position = event.latLng;
    var path = poly.getPath();

    var roadMarker = {'lat':position.lat(),'lng':position.lng()};
        
    if(previousPosition == null){
        previousPosition = event.latLng;
    }else{
        var x1 = previousPosition.lat();
        var y1 = previousPosition.lng();
        var x2 = position.lat();
        var y2 = position.lng();
        
        var x = ((x1 + x2) / 2);
        var y = ((y1 + y2) / 2);
        
        var label = new ELabel({
            latlng: new google.maps.LatLng(x,y),
            label: roadName,
            classname: "label",
            offset: 0,
            opacity: 100,
            overlap: true,
            clicktarget: false
        });

        previousPosition = event.latLng;
    }
    
    path.push(event.latLng);

    var marker = new google.maps.Marker({
        position: event.latLng,
        title: '#' + path.getLength(),
        map: map
    });
    
    var clickListener = google.maps.event.addListener(marker,'click',function() {
        
        var polyOptions = {
            strokeColor: '#555555',
            strokeOpacity: 1.0,
            strokeWeight: 3
        };
        
        poly = new google.maps.Polyline(polyOptions);
        poly.setMap(map);
        previousPosition = null;
        
        $.each(listeners.listeners, function( index, value ) {
            google.maps.event.removeListener(value);
        });
        
        var STATIC_URL='https://maps.googleapis.com/maps/api/staticmap?';
        var CENTER="center="; 
        var ZOOM="zoom=10";
        var SIZE="size=550x350";
        var SCALE="scale=1";
        var FORMAT="format=PNG";
        var MAPTYPE="maptype=roadmap";
        var PATH="path=color:0x0000ff|weight:5";
      
        $.each(road.markers,function(key,value){
            PATH+="|"+value.lat+","+value.lng;
        });
        
        STATIC_URL+=CENTER+"&"+ZOOM+"&"+SIZE+"&"+SCALE+"&"+FORMAT+"&"+MAPTYPE+"&"+PATH;
        
        $('.road-preview').attr('src',STATIC_URL);
        $("#road-modal").modal("toggle");
        
    });
                        
    road.markers.push(roadMarker);
    actualMarker.markers.push(marker);
    listeners.listeners.push(clickListener);
}

function saveRoad(roadPath,roadName){

    $.ajax({
        url: 'roads/phpsqlajax_store.php',
        type: 'post',
        data: {
            roadpath:roadPath.markers,
            roadname:roadName
        },
        success: function(output) {
            console.log(roadName+":\n"+output);
            insertRoad(JSON.parse(output),roadName);
        }
    });

}

function insertRoad(roadPath,roadName){
    
    var roadPathCoordinates = [];
    var pr=null;
    
    $.each(roadPath, function( index, value ) {
        roadPathCoordinates.push(new google.maps.LatLng(value.lat, value.lng));
    });
    
    $.each(roadPathCoordinates, function( index, value ) {
        var label = new ELabel({
            latlng: value,
            label: roadName,
            classname: "label",
            offset: 0,
            opacity: 100,
            overlap: true,
            clicktarget: true
        });

        label.setMap(map);
    });
    
    var polyPath = new google.maps.Polyline({
        path: roadPathCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
    });

    google.maps.event.addListener(polyPath, 'click', function(e){
            polyPath.getPath().forEach(function(routePoint, index){
                console.log(routePoint.lat()+" "+routePoint.lng());
            });
    });
    
    polyPath.setMap(map);
}

function loadRoads(){
    $.ajax({
        url: 'roads/phpsqlajax_load.php',
        type: 'post',
        success: function(output) {
           $.each(JSON.parse(output),function(key,value){
                insertRoad(value.path,value.name);
           });
        }
    });
}

google.maps.event.addDomListener(window, 'load', initialize);

