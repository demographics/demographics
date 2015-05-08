var poly = null;
var map = null;
var previousPosition = null;
var roadName=null;
var road = {'markers':[]};
var actualMarker = {'markers':[]};
var listeners={'listeners':[]};

var currentRoad;

function initialize() {

    var style = [
        {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#b85371"
                },
                {
                    "lightness": 9
                }
            ]
        },
        {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#4d3f43"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#b38391"
                },
                {
                    "lightness": 35
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#000000"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels.text",
            "stylers": [
                {
                    "color": "#fafafa"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#000000"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#262626"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#858585"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#2b6c8f"
                }
            ]
        },
        {
            "featureType": "landscape.man_made",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#687b99"
                }
            ]
        },
        {
            "featureType": "landscape.natural.terrain",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#93dbdb"
                }
            ]
        },
        {
            "featureType": "landscape.natural",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e0dcbf"
                }
            ]
        },
        {
            "featureType": "landscape.natural.terrain",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#7f8764"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#c5d1af"
                }
            ]
        },
        {
            "featureType": "poi.attraction",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#91a7ba"
                }
            ]
        },
        {
            "featureType": "poi.government",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#91a7ba"
                }
            ]
        },
        {
            "featureType": "poi.school",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#7299b8"
                }
            ]
        },
        {
            "featureType": "poi.place_of_worship",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#1870b8"
                }
            ]
        },
        {
            "featureType": "poi.medical",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#91a7ba"
                }
            ]
        },
        {
            "featureType": "poi.business",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#3d87c4"
                }
            ]
        }
    ];

    var minZoomLevel = 10;
    
    var mapOptions = {
        center: { lat: 35.142604, lng: 33.405216},
        zoom: 10,
        disableDefaultUI:true,
        styles: style
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

    var icon = "_/img/markers/purple.png";

    var marker = new google.maps.Marker({
        position: event.latLng,
        title: '#' + path.getLength(),
        map: map,
        icon: icon
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
        
        $('#road-modal .road-preview').attr('src',createStaticURL(road));
        $("#road-modal").modal("toggle");
        
    });
                        
    road.markers.push(roadMarker);
    actualMarker.markers.push(marker);
    listeners.listeners.push(clickListener);
}

function createStaticURL(road){
    var STATIC_URL='https://maps.googleapis.com/maps/api/staticmap?';
    var CENTER=""; 
    var ZOOM="zoom=10";
    var SIZE="size=550x350";
    var SCALE="scale=1";
    var FORMAT="format=PNG";
    var MAPTYPE="maptype=roadmap";
    var PATH="path=color:0x0000ff|weight:5";

    $.each(road.markers,function(key,value){
        PATH+="|"+value.lat+","+value.lng;
    });

    STATIC_URL+=ZOOM+"&"+SIZE+"&"+SCALE+"&"+FORMAT+"&"+MAPTYPE+"&"+PATH;
    return STATIC_URL;
}

function saveRoad(roadPath,roadName){
    var nextID;
    var email;
    
    $.ajax({
        url: 'roads/getNextID.php',
        type: 'post',
        success: function(data) {
            console.log(data);
            data=JSON.parse(data);
            nextID=data.id;
            email=data.email;
        }
    });
        
    $.ajax({
        url: 'roads/phpsqlajax_store.php',
        type: 'post',
        data: {
            roadpath:roadPath.markers,
            roadname:roadName
        },
        success: function(output) {
            console.log(roadName+":\n"+output);
            insertRoad(nextID,JSON.parse(output),roadName,email);
        }
    });

}

function insertRoad(id,roadPath,roadName,email){
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
        var temp_road = {'markers':[]};
        polyPath.getPath().forEach(function(routePoint, index){
            var roadMarker = {'lat':routePoint.lat(),'lng':routePoint.lng()};
            temp_road.markers.push(roadMarker);
        });
        
        loadComments(id);
        currentRoad=JSON.parse('{"id":'+id+',"roadName":"'+roadName+'","email":"'+email+'"}');
                
        $('#road-header').html("<h1 id='"+id+"'>"+roadName+"</h1><p><a href='#'>"+email+"</a></p>");
        $('#road-body').html("");
        $('#road-body').append("<img alt='Road path on map.' height='350px' width='550px' class='road-preview'/>");
        $('#road-view .road-preview').attr('src',createStaticURL(temp_road));
        $('#road-view').modal('toggle');
    });
    
    polyPath.setMap(map);
}

function loadComments(roadID){
    var comments;
    
    $.ajax({
        url: "roads/phpsqlajax_load_comment.php",
        type: "POST",
        data: {
            roadID:roadID
        },
        success: function (data) {
            console.log(data);
            comments=JSON.parse(data);
        },
        async: false
    });
    
    $("#road-comment-list").html('');
    
        var index=0;
    
        jQuery.each(comments, function(key,value) {
            if(index!=0){
                //Append li element with comment in comment-list ul
                $("#road-comment-list").append('<li class="list-group-item"><p>'+'<a href="#">'+value.user+'</a>: '+value.content+'</p><p>'+value.datePosted+'</p></li>');
            }
            index=index+1;
        });
}

function loadRoads(){
    $.ajax({
        url: 'roads/phpsqlajax_load.php',
        type: 'post',
        success: function(output) {
           $.each(JSON.parse(output),function(key,value){
                insertRoad(value.id,value.path,value.name,value.member);
           });
        }
    });
}

google.maps.event.addDomListener(window, 'load', initialize);

    