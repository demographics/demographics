<div id="chatbox" class="container panel panel-default">
    <div class="chat inner-chatbox">
        <div class="panel-heading">
            <h3 class="panel-title">Chatbox</h3>
        </div>
        <div id="chatZone" name="chatZone" class="panel-body">

        </div>
        <div class="panel-footer">
            <form onsubmit="chat.sendMsg(); return false;">
                <div class="row">
                    <div class="col-xs-9">
                        <input style="width:100%" type="text" id="msg" class="form-control" autofocus="true" placeholder="Your message goes here.">
                    </div>
                    <div class="col-xs-3">
                        <button class="btn btn-default" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo "<script>var USER_EMAIL='".$_SESSION['email']."';</script>";?>
<script>
    $(function(){
        $('#chatbox .panel-body').slimScroll({
            height: '269px'
        });
    });
</script>
<script type="text/javascript" src="chatroom/sse/cha1.js"></script>

<!--
<div class="input-group">
      <input style="width:100%" type="text" id="msg" class="form-control" autofocus="true" placeholder="Your message goes here.">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Send</button>
      </span>
    </div>
  </div>-->
