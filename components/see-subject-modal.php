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
                        <div class="form-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            
        </div>
    </div>
</div>

<script>

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