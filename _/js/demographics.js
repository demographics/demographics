var flag = false;
var timelineJSON={
    "timeline":{
        "headline":"Event's Timeline",
        "type":"default",
        "text":"Events in chronological order",
        "startDate":"2012,1,26",
        "date": [
            {}
        ]
    }
};

/*
    This function creates and sends an XMLHTTP request
    asking for the markers based on the phpsqlajax_genxml.php.
*/
function downloadUrl(url,callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            request.onreadystatechange = idle();
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

/*
    This function is used simply for doing nothing while waiting
    for the response of the XMLHTTP request sent.
*/
function idle() {}

function capture(){}
