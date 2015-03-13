
<div id="timeline_div">
    <ul class="timeline">
        <li>
          <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
          <div class="timeline-panel animated slideInLeft">
            <div class="timeline-heading">
              <h4 class="timeline-title">Event's title</h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Event's date</small></p>
            </div>
            <div class="timeline-body">
              <p>Event's content</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
          <div class="timeline-panel animated slideInLeft">
            <div class="timeline-heading">
              <h4 class="timeline-title">Event's title</h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Event's date</small></p>
            </div>
            <div class="timeline-body">
              <p>Event's content</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div>
            <div class="timeline-panel animated slideInLeft">
            <div class="timeline-heading">
              <h4 class="timeline-title">Event's title</h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Event's date</small></p>
            </div>
            <div class="timeline-body">
              <p>Event's content</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
        <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
          <div class="timeline-panel animated slideInLeft">
            <div class="timeline-heading">
              <h4 class="timeline-title">Event's title</h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Event's date</small></p>
            </div>
            <div class="timeline-body">
              <p>Event's content</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Event's title</h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Event's date</small></p>
            </div>
            <div class="timeline-body">
              <p>Event's content</p>
              <hr>
              <div class="btn-group">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li>
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
        
        //timeline_obj+='<div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div><div class="timeline-panel animated slideInLeft"><div class="timeline-heading"><h4 class="timeline-title">'+json_tml_obj.title+'</h4><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'+json_tml_obj.date+'</small></p></div><div class="timeline-body"><p>'+json_tml_obj.contents+'</p></div></div></li>'
        //$('.timeline').append(timeline_obj);
         $(".modal .modal-body").scrollTop($(".modal .modal-body").prop("scrollHeight"));
    }
</script>