<div id="marker-view" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button class="btn btn-default">
                    <i class="fa fa-thumbs-down"></i>
                </button>
                <button class="btn btn-default">
                    <i class="fa fa-thumbs-up"></i>
                </button>
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
                        <ul id="comment-list" class="list-group">
                        </ul>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>

<script>
    function loadComments(){
        var index=0;
        jQuery.each(cur_comments, function(key,value) {
            if(index!=0){
                $("#comment-list").append('<li class="list-group-item"><p>'+value.content+'</p></li>');
            }
            index=index+1;
        });
    }
    
     $(document).ready(function(){
         
        $('#comment-post-btn').on('click',function(){
            $.ajax({
                url: "markers/phpsqlajax_comment.php",
                type: "POST",
                data: {
                    eventID:cur_event,
                    comment:document.getElementById('comment-input').value
                },
                async: false
            });
            $("#comment-list").append('<li class="list-group-item"><p>'+document.getElementById('comment-input').value+'</p></li>');
            document.getElementById("comment-input").value = "";
        });
     });
</script>