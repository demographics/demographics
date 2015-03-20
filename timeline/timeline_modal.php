
<div id="timeline_modal" class="modal fade">
    <div class="modal-backdrop fade in"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="myLargeModalLabel" class="modal-title">Timeline</h4>
            </div>
            <div id="timeline_modal_body" class="modal-body"> <?php include 'timeline_contents.php'?> </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#timeline_modal #timeline_modal_body').slimScroll({
            height: '500px'
        });
    });
    
    function insertEntry(json_tml_obj){
        var timeline_obj;
        var count = $(".timeline").children().length;
        
        if((count % 2) === 0 ){
            timeline_obj='<li>';
        }else{
            timeline_obj='<li class="timeline-inverted" >';
        }
                
        timeline_obj+='<div class="timeline-badge '+json_tml_obj.type+'-badge "><a href="#"><i class="glyphicon glyphicon-credit-card"></i></a></div><div class="timeline-panel animated slideInLeft"><div class="timeline-heading"><h4 class="timeline-title">'+json_tml_obj.title+'</h4><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'+json_tml_obj.date+'</small></p></div><div class="timeline-body"><p>'+json_tml_obj.content+'</p></div></div></li>'
        $('.timeline').append(timeline_obj);
        $(".modal .modal-body").scrollTop($(".modal .modal-body").prop("scrollHeight"));
    }
    
     $('#timeline_modal').on('hide.bs.modal', function () {            
        var info = document.getElementById ("timeline_div");
        info.innerHTML='<ul class="timeline"></ul>';
    });
</script>
