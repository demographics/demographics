
<div id="timeline_div">
    <ul class="timeline">
        
    </ul>
</div>

<script>
    function insertEntry(json_tml_obj){
        var timeline_obj;
        var count = $(".timeline").children().length;
        
        if((count % 2) === 0 ){
            timeline_obj='<li>';
        }else{
            timeline_obj='<li class="timeline-inverted" >';
        }
        
        timeline_obj+='<div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div><div class="timeline-panel animated slideInLeft"><div class="timeline-heading"><h4 class="timeline-title">'+json_tml_obj.title+'</h4><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'+json_tml_obj.date+'</small></p></div><div class="timeline-body"><p>'+json_tml_obj.content+'</p></div></div></li>'
        $('.timeline').append(timeline_obj);
        $(".modal .modal-body").scrollTop($(".modal .modal-body").prop("scrollHeight"));
    }
</script>