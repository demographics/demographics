

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

// Create the legend and display on the map
function addLegendUL(){
    var legend = document.createElement('div');
    legend.id = 'legend';
    var content = [];
    content.push('<h3>Events.</h3>');
    content.push('<div id="filter_memo"><p><div class="color red"></div>Memorandum</p></div>');
    content.push('<div id="filter_photo"><p><div class="color yellow"></div>Photo</p></div>');
    content.push('<div id="filter_article"><p><div class="color green"></div>Article</p></div>');
    content.push('<div id="filter_property"><p><div class="color blue"></div>Property</p></div>');
    content.push('<div id="filter_date"><p><div class="color grey"></div>Date</p></div>');
    legend.innerHTML = content.join('');
    legend.index = 1;
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
}

function filter(events, allData, type){
    
    
}

//    using a href
//    content.push('<a href="#" id="filter_memo"><p><div class="color red"></div>Memorandum</p></a>');
//    content.push('<a href="#" id="filter_article"><p><div class="color yellow"></div>Photo</p></a>');
//    content.push('<a href="#" id="filter_property"><p><div class="color green"></div>Article</p>');
//    content.push('<a href="#" id="filter_photo"><p><div class="color blue"></div>Historic Event</p>');
//    content.push('<p><div id="filter_date" class="color grey"></div>Date</p>');
    