<div id="see-subject-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Subject</h4>
            </div>
                                                <!--action="phpsqlajax_add_theme.php"-->
            <form id="see-subject-form" name='theme-form' method="post" action="forum/ajax_add_theme.php" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    <span class="subject-id hidden"></span>
                    <div id="forum-texts" class="modal-body">
                         <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Title&nbsp;</span>
                                <input pattern="[A-Za-z ]{1,30}" id="subject-title-input" name="subject-title-input" disabled class="form-control" placeholder="" type="text">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="theme-content-input">Content</label>
                                <div>                     
                                    <textarea class="form-control" id="subject-content-input" name="subject-content-input" disabled></textarea>
                                </div>
                        </div>
        
                    </div>
                    <div id="forum-btns" class="modal-footer">  
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
                </fieldset>
            </form>
            
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
         if(!<?php if(isset($_SESSION["logged_in"])){if($_SESSION["logged_in"]=1){echo 'true';}}else{echo 'false';}?>){
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
            $.ajax({
                url: "forum/ajax_comment_subject.php",
                type: "POST",
                data: {
                    subjectID:$('.subject-id').html(),
                    comment:document.getElementById('comment-input').value
                },
                async: true,
                success:function(data){
                    data=JSON.parse(data);
                    $('#comment-list').prepend('<li class="list-group-item"><p>'+'<a href="#">'+data.user+'</a>: '+data.content+'</p><p>'+data.datePosted+'</p></li>');
                }
            });      

            document.getElementById("comment-input").value = "";
        });
     });
    
    $('#report-prompt').on('click',function(e){
        $('#report-title').html('Subject\'s title');
        $('#report-user').html('Subject\'s user');
        $('#report-modal').modal('toggle');
        e.preventDefault();
    });
    
  /*  $("form[name='see-subject-form']").submit(function(e) {
        $.ajax({
            url: "forum/ajax_comment_subject.php",
            type: "POST",
            data:{
                title:$("#theme-title-input").val(),
                content:$("#theme-content-input").val()
            },
            success: function (data) {
                //console.log(data);
//                var now = new Date();
//                now.format("dd/M/yy h:mm tt");
                var d = new Date();
                var n = d.toString();
                
                $('#add-theme-modal').modal('toggle');
                add_theme($("#theme-title-input").val(),"<?=$_SESSION['email'];?>","<?=date('Y-m-d H:i:s');?>");
            }
        });
        e.preventDefault();
    });*/

</script>