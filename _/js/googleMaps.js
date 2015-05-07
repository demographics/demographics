/*
    These are the main javascript global variables
    needed throughout the user's session.
*/
var map=null;
var cur_location=null;
var cur_event=null;
var cur_comments=null;
var cur_JSON=null;
var allMarkers=[];
var ajaxFlags=[];
/*
    This function is called upon the index.php load event.
    It initializes the google map by binding the events onclick
    e.t.c. and loads the stored events.
*/
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
        zoom: minZoomLevel,
        disableDefaultUI:true,
        styles: style
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
            swal("You are not logged in!", "You have to login to be able to post.","warning");
        }
    });			

    loadMarkers();

};


/*
    This function places a marker on the specific location and
    chooses the corresponding icon based on the type of the event.
    The type is determined by making an ajax request for the json 
    object with the information of that event.
*/
function placeMarker(eventID,location,ajaxIndex) {
    
    var eventJSON = null;
    var propertyType = null;
    var photoPath = null;
    var description = null;
    
     $.ajax({
        url: "markers/phpsqlajax_getcontents.php",
        type: "POST",
        data: {
            eventID:eventID
        },
        async: false,
        success: function (data) {
            eventJSON = JSON.parse(data);
          //  console.log(eventJSON);
            var timelineYear;
            var timelineMonth;
            var timelineDay;
            var eventDateTable=eventJSON.eventDate.split('-');
            
            timelineYear=eventDateTable[0];
            timelineMonth=eventDateTable[1];
            if(timelineMonth.charAt(0)=='0'){
                timelineMonth=timelineMonth.substr(1);
            }
            timelineDay=eventDateTable[2];
            
            if(timelineDay.charAt(0)=='0'){
                timelineDay=timelineDay.substr(1);
            }
            
            var timelineEntry={
                startDate:timelineYear+','+timelineMonth+','+timelineDay,
                endDate:timelineYear+','+timelineMonth+','+timelineDay,
                headline:eventJSON.title,
                text:eventJSON.content,
                asset:{
                    media:"",
                    credit:"",
                    caption:""
                }
            };

            timelineJSON.timeline.date.push(timelineEntry);
            if(!(typeof ajaxIndex === "undefined")) {
                ajaxFlags[ajaxIndex]=true;
                
            }
            
            var ajaxTotalFlag=true;
            for(var j=0;j<ajaxFlags.length;j++){
                ajaxTotalFlag=ajaxTotalFlag && ajaxFlags[j];
            }
            
            if(ajaxTotalFlag){
                console.log(timelineJSON);
                var timeline=createStoryJS({
                    type:       'timeline',
                    width:      '100%',
                    height:     '400',
                    source:     timelineJSON,
                    embed_id:   'timeline-embed'
                });
                ajaxTotalFlag=false;
            }
        }
    });

    var icon = null;
    //console.log(eventJSON.type);
    switch(eventJSON.type){
        case 'memoir':
            icon = "_/img/markers/red.png";
            //icon = "_/img/markers/red.png";
            break;
        case 'property':
            icon = "_/img/markers/blue.png";
            break;
        case 'photo':
            icon = "_/img/markers/yellow.png";
            break;
        case 'article':
            icon = "_/img/markers/green.png";
            break;
    }
    
     var placeMarker = new google.maps.Marker({
        position: location,
        map: map,
        animation:google.maps.Animation.DROP,
        icon:icon
    });
    
    allMarkers.push(placeMarker);
    
    var infowindow = new InfoBubble({
          content: 
                    '<div class="info-element">'+
                        '<p>'+eventJSON.eventDate+'</p>'+
                        '<h5>'+eventJSON.title+'</h5>'  +
                    '</div>',
          minWidth:100,
          minHeight:55,
          maxWidth:150,
          maxHeight:180,
          shadowStyle: 1,
          padding: 1 ,
          backgroundColor: '#FFF',
          borderRadius: 5,
          arrowSize: 10,
          borderWidth: 2,
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
        cur_event = eventID;
        
         $.ajax({
                url: "markers/phpsqlajax_load_comment.php",
                type: "POST",
                data: {
                    eventID:cur_event
                },
                success: function (data) {
                    cur_comments = JSON.parse(data);
                    loadComments();
                }
            });
        
        $.ajax({
            url: "markers/phpsqlajax_views.php",
            type: "POST",
            data: {
                eventID:eventID
            }
        });
        
        $('#marker-header').html('<a href="#">'+eventJSON.user+'</a>'+'<p>'+eventJSON.datePosted+'</p>'+
                                 '<div>Views: '+eventJSON.views+'</div><div>Likes: '+eventJSON.likes+'</div>');
        $('#marker-body').html( '<h1 class="modal-title"><center>'+eventJSON.title+'</center></h1>'+
                                '<center><p>'+eventJSON.eventDate+'</p></center>'+
                                '<br>'+eventJSON.content);
        
        $('#marker-view').modal('toggle');
        $('#marker-view').on('hide.bs.modal', function () {            
            map.setZoom(10);
            $("#comment-list").html("");
            document.getElementById("comment-input").value = "";
        });
        cur_JSON=eventJSON;
    });

};

/*
    This function calls the ajax request for storing the
    marker in the database
*/
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
/*
    This function makes the ajax request to load each events
    contents.
*/
function loadMarkers() {

    downloadUrl("markers/phpsqlajax_genxml.php", function(data) {
      
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var k = 0; k < markers.length; k++) {
            ajaxFlags[k]=false;
        }
        
        $.ajax({
            url:"markers/json_load_everything.php",
            type: "POST",
            success:function(data){
                data=JSON.parse(data);
                for (var i = 0; i < markers.length; i++) {
                    var location = new google.maps.LatLng(
                        markers[i].getAttribute("lat"),
                        markers[i].getAttribute("lng")
                    );
                    var eventID = markers[i].getAttribute("eventID");
                    $.each(data,function(key,value){
                        if(eventID==value.eventID)
                            placeLoaded(value,location);
                    });
                    
                }
                var timeline=createStoryJS({
                    type:       'timeline',
                    width:      '100%',
                    height:     '400',
                    source:     timelineJSON,
                    embed_id:   'timeline-embed'
                });
            }
        });
        
//        for (var i = 0; i < markers.length; i++) {
//            var location = new google.maps.LatLng(
//                markers[i].getAttribute("lat"),
//                markers[i].getAttribute("lng")
//            );
//            var eventID = markers[i].getAttribute("eventID");
//            placeMarker(eventID,location,i);
//        }
    });
    
    
};

function placeLoaded(event,location){
    
    var eventJSON = null;
    var propertyType = null;
    var photoPath = null;
    var description = null;
    
    var timelineYear;
    var timelineMonth;
    var timelineDay;
    var eventDateTable=event.eventDate.split('-');
    timelineYear=eventDateTable[0];
    timelineMonth=eventDateTable[1];

    if(timelineMonth.charAt(0)=='0'){
        timelineMonth=timelineMonth.substr(1);
    }

    timelineDay=eventDateTable[2];

    if(timelineDay.charAt(0)=='0'){
        timelineDay=timelineDay.substr(1);
    }
            
    var timelineEntry={
        startDate:timelineYear+','+timelineMonth+','+timelineDay,
        endDate:timelineYear+','+timelineMonth+','+timelineDay,
        headline:"<a href='#' onclick='showEvent("+event.eventID+");'>"+event.title+"</a>",
        text:event.content,
        asset:{
            media:"",
            credit:"",
            caption:""
        }
    };

    timelineJSON.timeline.date.push(timelineEntry);

    var icon = null;
    switch(event.type){
        case 'memoir':
            icon = "_/img/markers/red.png";
            break;
        case 'property':
            icon = "_/img/markers/blue.png";
            break;
        case 'photo':
            icon = "_/img/markers/yellow.png";
            break;
        case 'article':
            icon = "_/img/markers/green.png";
            break;
    }
    
     var placeMarker = new google.maps.Marker({
        position: location,
        map: map,
        animation:google.maps.Animation.DROP,
        icon:icon
    });
    
    allMarkers.push(placeMarker);
    
    var infowindow = new InfoBubble({
          content: 
                    '<div class="info-element">'+
                        '<p>'+event.eventDate+'</p>'+
                        '<h5>'+event.title+'</h5>'  +
                    '</div>',
          minWidth:100,
          minHeight:55,
          maxWidth:150,
          maxHeight:180,
          shadowStyle: 1,
          padding: 1 ,
          backgroundColor: '#FFF',
          borderRadius: 5,
          arrowSize: 10,
          borderWidth: 2,
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
        cur_event = event.eventID;
                
        $.each(event.comments, function(key,value) {
            $("#comment-list").append('<li class="list-group-item"><p>'+'<a href="#">'+value.user+'</a>: '+value.content+'</p><p>'+value.datePosted+'</p></li>');
        });    
    
        $.ajax({
            url: "markers/phpsqlajax_views.php",
            type: "POST",
            data: {
                eventID:event.eventID
            }
        });
        
        $('#marker-header').html('<a href="#">'+event.user+'</a>'+'<p>'+event.datePosted+'</p>'+
                                 '<div>Views: '+event.views+'</div><div>Likes: '+event.likes+'</div>');
        $('#marker-body').html( '<h1 class="modal-title"><center>'+event.title+'</center></h1>'+
                                '<center><p>'+event.eventDate+'</p></center>'+
                                '<br>'+event.content);
        
        $('#marker-view').modal('toggle');
        $('#marker-view').on('hide.bs.modal', function () {            
            map.setZoom(10);
            $("#comment-list").html("");
            document.getElementById("comment-input").value = "";
        });
        cur_JSON=event;
    });

}

/*
    This function combines all placing, storing 
    and informing of an event's posting
*/
function insertMarker(eventID){
    console.log('lattidute : '+cur_location.lat()+', longitude : '+cur_location.lng());
    placeMarker(eventID,cur_location);	
    saveMarker(eventID,cur_location);
}

/*
    This function is useful when the user searches in our database.
    Once a search is done, we must reload the content of the map.
*/
function removeAllMarkers(){
    for (var i=0; i<allMarkers.length; i++){
        allMarkers[i].setVisible(false);
        }
    }

function displayAllMarkers(){
    for (var i=0; i<allMarkers.length; i++){
        allMarkers[i].setVisible(true);
        }
    }

google.maps.event.addDomListener(window, 'load', initialize);