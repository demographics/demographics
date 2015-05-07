<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Timeline js</title>       
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>  
    </head>

    <body>  
        <div id="timeline-embed"></div>
        <script>
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
            //var timelineJSON={"timeline":{"headline":"Event's Timeline","type":"default","text":"Events in chronological order","startDate":"2012,1,26","date":[{},{"startDate":"2015,3,13","endDate":"2015,3,13","headline":"<a href='#' onclick='showEvent(3);'>Went to church</a>","text":"Just like any Sunday morning!","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,3,10","endDate":"2015,3,10","headline":"<a href='#' onclick='showEvent(4);'>Studying for exams</a>","text":"I am going to fail this class.","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,3,28","endDate":"2015,3,28","headline":"<a href='#' onclick='showEvent(5);'>On a fieldtrip</a>","text":"This is going to be amazing!","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,3,20","endDate":"2015,3,20","headline":"<a href='#' onclick='showEvent(6);'>Doomed</a>","text":"Today i realized that i am doomed to fail all of my classes.","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,3,28","endDate":"2015,3,28","headline":"<a href='#' onclick='showEvent(7);'>Sticky keys</a>","text":"<p><span style=\"font-weight: bold;\">Sticky </span><span style=\"font-style: italic;\"><span style=\"text-decoration: underline;\">keys</span></span><br></p>","asset":{"media":"","credit":"","caption":""}},{"startDate":"2013,3,13","endDate":"2013,3,13","headline":"<a href='#' onclick='showEvent(10);'>Awesome photo</a>","text":"<p class=\"photo-description\">This is an awesome photo of an ant.</p><img class=\"photo-container\" src=\"markers/events/ant.jpg\"></img>","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,4,7","endDate":"2015,4,7","headline":"<a href='#' onclick='showEvent(11);'>hg</a>","text":"pou","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,4,7","endDate":"2015,4,7","headline":"<a href='#' onclick='showEvent(12);'>fa</a>","text":"fef","asset":{"media":"","credit":"","caption":""}},{"startDate":"0000,0,0","endDate":"0000,0,0","headline":"<a href='#' onclick='showEvent(13);'></a>","text":"","asset":{"media":"","credit":"","caption":""}},{"startDate":"0000,0,0","endDate":"0000,0,0","headline":"<a href='#' onclick='showEvent(14);'>fd</a>","text":"","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,19","endDate":"2015,5,19","headline":"<a href='#' onclick='showEvent(15);'>s</a>","text":"","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,1","endDate":"2015,5,1","headline":"<a href='#' onclick='showEvent(16);'>dtrgdegtrert</a>","text":"","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,1","endDate":"2015,5,1","headline":"<a href='#' onclick='showEvent(17);'>de</a>","text":"efaf","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,6","endDate":"2015,5,6","headline":"<a href='#' onclick='showEvent(18);'>gfh</a>","text":"hgfd","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,12","endDate":"2015,5,12","headline":"<a href='#' onclick='showEvent(19);'>gfd</a>","text":"<p class=\"property-type\">3</p><p class=\"property-description\">oui;u</p>","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,4","endDate":"2015,5,4","headline":"<a href='#' onclick='showEvent(20);'>treytre</a>","text":"ytreytrethrdhtredhtr","asset":{"media":"","credit":"","caption":""}},{"startDate":"2009,3,18","endDate":"2009,3,18","headline":"<a href='#' onclick='showEvent(21);'>villa</a>","text":"<p class=\"property-type\">3</p><p class=\"property-description\">villa</p>","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,14","endDate":"2015,5,14","headline":"<a href='#' onclick='showEvent(22);'>jk</a>","text":"<p class=\"property-type\">House</p><p class=\"property-description\">hjkh</p>","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,21","endDate":"2015,5,21","headline":"<a href='#' onclick='showEvent(23);'>ghj</a>","text":"","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,21","endDate":"2015,5,21","headline":"<a href='#' onclick='showEvent(24);'>jtfjyu</a>","text":"","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,21","endDate":"2015,5,21","headline":"<a href='#' onclick='showEvent(25);'>trew</a>","text":"<p class=\"property-type\">3</p><p class=\"property-description\">trewgrewgrwe</p>","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,6","endDate":"2015,5,6","headline":"<a href='#' onclick='showEvent(26);'>htrtetht</a>","text":"<p class=\"property-type\">3</p><p class=\"property-description\">htrd</p>","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,14","endDate":"2015,5,14","headline":"<a href='#' onclick='showEvent(27);'>gfehtjyujujmi</a>","text":"<p class=\"property-type\">2</p><p class=\"property-description\">jurftetrgreth</p>","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,20","endDate":"2015,5,20","headline":"<a href='#' onclick='showEvent(28);'>qwert</a>","text":"<p class=\"property-type\">Villa</p><p class=\"property-description\">gerwrg</p>","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,6","endDate":"2015,5,6","headline":"<a href='#' onclick='showEvent(29);'>fdsgf</a>","text":"<p class=\"property-type\"><b>Type:</b></br> Store</p><p class=\"property-description\"><b>Descrition:</b></br> sgfdsgfdsgfdsgfdsgfdsgf</p>","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,13","endDate":"2015,5,13","headline":"<a href='#' onclick='showEvent(32);'>gdsgfd</a>","text":"ghtfdhtgfdhtrdhjgfydjyd","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,12","endDate":"2015,5,12","headline":"<a href='#' onclick='showEvent(35);'>trewt</a>","text":"terwtrew","asset":{"media":"","credit":"","caption":""}},{"startDate":"2015,5,20","endDate":"2015,5,20","headline":"<a href='#' onclick='showEvent(36);'>Lorem ipsum</a>","text":"gfdsgfdsgfdsgfds","asset":{"media":"","credit":"","caption":""}}]}};
            $.ajax({
                url:"../markers/json_load_everything.php",
                type: "POST",
                success:function(data){
                    data=JSON.parse(data);
                    $.each(data,function(key,event){
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

                    });
                    
                   
                    
                    $('body').append('<script src="../_/libs/timelinejs/build/js/storyjs-embed.js">'+'</scr'+'ipt>');
                }
            });
        </script>
        <script type="text/javascript">
             var timeline_config = {
                width: "100%",
                height: "400",
                source: timelineJSON
            };
        </script>
    </body>
</html>