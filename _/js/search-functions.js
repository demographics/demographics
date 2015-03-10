


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
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
}


function addDateLegend(){
    var dateLegend = document.createElement('div');
    dateLegend.id = 'dateLegend';
    var content = [];
    content.push('<b>1900</b>');
    content.push('<input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/>');
    content.push('<b>2015</b>');
    dateLegend.innerHTML = content.join('');
    dateLegend.index=1;
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(dateLegend);
    $("#ex2").slider({});
}



 