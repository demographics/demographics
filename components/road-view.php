<div id="road-view" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="road-header"></div>
            </div>
            <div id="road-body" class="modal-body">
            </div>
            <div  class="modal-footer">  
                <div class="row">
                    <div class="input-group">
                        <input id="road-comment-input" type="text" class="form-control" placeholder="Write a comment.">
                        <span class="input-group-btn">
                            <button id="road-comment-post-btn" class="btn btn-default" type="button">Comment</button>
                        </span>
                    </div>
                </div>  
                <div class="row">
                    <div class="comment-preview">
                        <ul id="road-comment-list" class="list-group"></ul>
                    </div>
                </div>
                <div class="row">
                    <button id="report-prompt" class="btn btn-danger">
                        <i color="#FFF" class="fa fa-thumbs-down"></i>
                    </button>
                    <button class="btn btn-primary">
                        <i color="#FFF" class="fa fa-thumbs-up"></i>
                    </button>
                </div>
            </div>
        </div>   
    </div>
</div>
<?php include 'report-modal.php' ?>

<script>
        
    $(function(){
        $('.comment-preview').slimScroll({
            height: '200px'
        });
    });
    
     $(document).ready(function(){
         if(!flag){
            $('#road-comment-post-btn').attr('disabled','true');
            $('#road-comment-input').attr('disabled','true');
         }
         
        $('#road-comment-post-btn').on('click',function(){
//            $.ajax({
//                url: "markers/phpsqlajax_comment.php",
//                type: "POST",
//                data: {
//                    eventID:cur_event,
//                    comment:document.getElementById('comment-input').value
//                },
//                async: false
//            });
//            
//                     
//            $.ajax({
//                url: "markers/phpsqlajax_load_comment.php",
//                type: "POST",
//                data: {
//                    eventID:cur_event
//                },
//                success: function (data) {
//                    cur_comments = JSON.parse(data);
//                    loadComments();
//                },
//                async: false
//            }); 
            
            document.getElementById("road-comment-input").value = "";
        });
     });
    
    $('#report-prompt').on('click',function(){
        document.getElementById('event-title-preview').value = "road name";
        document.getElementById('event-user-preview').value = "road user";
        $('#report-modal').modal('toggle');
    });
</script>