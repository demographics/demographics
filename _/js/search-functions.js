

// Create the legend and display on the map
function addLegend(){
    var legend = document.createElement('div');
    legend.id = 'legend';
    var content = [];
    content.push('<h3>Events*</h3>');
    content.push('<p><div id="#filter_memo" class="color red"></div>Memorandum</p>');
    content.push('<p><div id="#filter_article" class="color yellow"></div>Photo</p>');
    content.push('<p><div id="#filter_property" class="color green"></div>Article</p>');
    content.push('<p><div id="#filter_photo" class="color blue"></div>Historic Event</p>');
    //content.push('<p><div id="#filter_memo" class="color grey"></div>Something else</p>');
    legend.innerHTML = content.join('');
    legend.index = 1;
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
}
