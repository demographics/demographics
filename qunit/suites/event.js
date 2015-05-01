var map;

function initialize(){ 
    var mapOptions = {
        center: { lat: 35.142604, lng: 33.405216},
        zoom: 10,
        disableDefaultUI:true
    };
    map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
    loadMarkers();
}

function loadMarkers() {
    downloadUrl("../markers/phpsqlajax_genxml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        $.ajax({
            url:"markers/json_load_everything.php",
            type: "POST",
            async:false,
            success:function(data){
            }
        });
    });
    return true;
}

function downloadUrl(url,callback) {
    var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            request.onreadystatechange = idle();
            callback(request, request.status);
        }
    };
    request.open('GET', url, true);
    request.send(null);
}

function placeLoaded(location){    
     var placeMarker = new google.maps.Marker({
        position: location,
        map: map,
        animation:google.maps.Animation.DROP
     });     
    return true;
}

function idle() {}

test('placeLoaded()', function() {
    ok(placeLoaded({ lat: 35.142604, lng: 33.405216}), '{lat: , lng:} is acceptable.');
    ok(placeLoaded( new google.maps.LatLng(34.630248, 31.994110)), ' new google.maps.LatLng(lat, lng) is acceptable.');
})

test('loadMarkers()', function() {
    ok(loadMarkers(), 'Events loaded correctly.');
})

function isEven(val) {
    return val % 2 === 0;
}

test('isEven()', function() {
    ok(isEven(0), 'Zero is an even number');
    ok(isEven(2), 'So is two');
    ok(isEven(-4), 'So is negative four');
    ok(!isEven(1), 'One is not an even number');
    ok(!isEven(-7), 'Neither is negative seven');
})
