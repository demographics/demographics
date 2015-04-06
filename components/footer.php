<div id="progress-bar-background">


    <div id="alignRight">
        <input id="ex2" type="text" class="span2" value="" data-slider-min="1900" data-slider-max="2015" data-slider-step="1" data-slider-value="[1935,1974]" data-slider-handle="triangle"/>
        
    </div>
<a class="pull-right" id="chat-button" href="#"><i class="fa fa-weixin"></i></a>

</div>

<script>
    var SL=$("#ex2").slider({});
    $('#chat-button').on('click',function(){
        $('#chatbox.panel').toggle('fast');
    });
</script>

<!--
<div class="modal fade" id="TC-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-default navbar-fixed-bottom">
      <div class="container-fluid">
        <p align="center">All rights reserved &copy; Copyright 2015</p>
      </div>
    </nav>
    -->