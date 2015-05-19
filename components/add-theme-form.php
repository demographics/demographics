<div id="add-theme-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Post Subject</h4>
            </div>
            <form id="theme-form" name='theme-form' method="post" action="forum/ajax_add_theme.php" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    
                    <div id="forum-texts" class="modal-body">
                         <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Title&nbsp;</span>
                                <input pattern="[A-Za-z ]{1,30}" required="" id="theme-title-input" name="theme-title-input" class="form-control" placeholder="Subject's title goes here." type="text">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="theme-content-input">Content</label>
                                <div>                     
                                    <textarea pattern="[^# ]" required="" placeholder="Subject content goes here." class="form-control" id="theme-content-input" name="theme-content-input"></textarea>
                                </div>
                        </div>
        
                    </div>
                    <div id="forum-btns" class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            
        </div>
    </div>
</div>

<script>
    
    $("#add-theme-modal").on('hide.bs.modal', function () {       
        $("#theme-title-input").val("");
        $("#theme-content-input").val("")
    });
            
    $("#theme-form").submit(function(e) {
        
        $.ajax({
            url: "forum/ajax_add_theme.php",
            type: "POST",
            data:{
                title:$("#theme-title-input").val(),
                content:$("#theme-content-input").val()
            },
            success: function (data) {
                
            }
        });
        
       
        var currentdate = new Date(); 
        var datetime =currentdate.getFullYear() + "-"
                + ("0"+(currentdate.getMonth()+1)).slice(-2)  + "-" 
                +("0"+currentdate.getDate()).slice(-2) + " "  
                + ("0"+currentdate.getHours()).slice(-2) + ":"  
                + ("0"+currentdate.getMinutes()).slice(-2) + ":" 
                + ("0"+currentdate.getSeconds()).slice(-2);
        
        add_theme($("#theme-title-input").val(),"<?=$_SESSION['email'];?>",datetime);
        $('#add-theme-modal').modal('toggle');
        e.preventDefault();
    });

</script>
