<div id="add-theme-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Post Theme</h4>
            </div>
                                                <!--action="phpsqlajax_add_theme.php"-->
            <form id="event-form" name='uploader' method="post" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    
                    <div id="forum-texts" class="modal-body">
                         <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Title&nbsp;</span>
                                <input pattern="[A-Za-z ]{1,30}" id="event-title-input" name="event-title-input" class="form-control" placeholder="Event's title goes here." type="text">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="memoir-content-input">Content</label>
                                <div>                     
                                    <textarea placeholder="Memoir's content goes here." class="form-control" id="memoir-content-input" name="memoir-content-input"></textarea>
                                </div>
                        </div>
        
                    </div>
                    <div id="forum-btns" class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="add_theme();">Post</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            
        </div>
    </div>
</div>

