


// Create the legend and display on the map
function addLegend(){
    var legend = document.createElement('div');
    legend.id = 'legend';
    var content = [];
    content.push('<h3 id"filter_all">Events.</h3>');
    content.push('<a class="boxclose" id="boxclose"></a>');
    content.push('<div id="filter_memo"><p><div class="color red"></div>Memorandum</p></div>');
    content.push('<div id="filter_photo"><p><div class="color yellow"></div>Photo</p></div>');
    content.push('<div id="filter_article"><p><div class="color green"></div>Article</p></div>');
    content.push('<div id="filter_property"><p><div class="color blue"></div>Property</p></div>');
    content.push('<div id="filter_date"><p><div class="color grey"></div>Date</p></div>');
    legend.innerHTML = content.join('');
    legend.index = 1;
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
}

