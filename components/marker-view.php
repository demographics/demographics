<div id="marker-view" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="marker-header"></div>
            </div>
            <div id="marker-body" class="modal-body">
            </div>
            <div  class="modal-footer">  
                <div class="row">
                    <div class="input-group">
                        <input id="comment-input" type="text" class="form-control" placeholder="Write a comment.">
                        <span class="input-group-btn">
                            <button id="comment-post-btn" class="btn btn-default" type="button">Comment</button>
                        </span>
                    </div>
                </div>  
                <div class="row">
                    <div class="comment-preview">
                        <ul id="comment-list" class="list-group"></ul>
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
    
    
    
    //Function for loading comments for each event
    function loadComments(){
        var index=0;
        $("#comment-list").html('');
        jQuery.each(cur_comments, function(key,value) {
            if(index!=0){
                //Append li element with comment in comment-list ul
                $("#comment-list").append('<li class="list-group-item"><p>'+'<a href="#">'+value.user+'</a>: '+value.content+'</p><p>'+value.datePosted+'</p></li>');
            }
            index=index+1;
        });
    }
    
    //Initialize the slim-scroll on comment list
    $(function(){
        $('.comment-preview').slimScroll({
            height: '200px'
        });
    });
    
     $(document).ready(function(){
         if(!flag){
            $('#comment-post-btn').attr('disabled','true');
            $('#comment-input').attr('disabled','true');
         }
         
        /*
            The ajax caller for the comment post function.
            We call the phpsqlajax_comment.php with the event ID 
            and the comment content passed through the POST 
            variable. If the post is succesfull the comments are 
            added to the specified event's comment list.
        */
        $('#comment-post-btn').on('click',function(){
            var commentValue=document.getElementById('comment-input').value;
            
            if(commentValue!=""){
                $.ajax({
                    url: "markers/phpsqlajax_comment.php",
                    type: "POST",
                    data: {
                        eventID:cur_event,
                        comment:document.getElementById('comment-input').value
                    },
                    async: false
                }); 
                     
                $.ajax({
                    url: "markers/phpsqlajax_load_comment.php",
                    type: "POST",
                    data: {
                        eventID:cur_event
                    },
                    success: function (data) {
                        cur_comments = JSON.parse(data);
                        loadComments();
                    },
                    async: false
                }); 

                document.getElementById("comment-input").value = "";
            }
        });
     });
    
    $('#report-prompt').on('click',function(){
        document.getElementById('event-title-preview').value = cur_JSON.title;
        document.getElementById('event-user-preview').value = cur_JSON.user;
        $('#report-modal').modal('toggle');
    });
</script>