<div id="marker-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Post event</h4>
            </div>
            
            <form id="event-form" name='uploader' action="upload.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    
                    <div class="modal-body">
                         <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Title&nbsp;</span>
                                <input required pattern="[A-Za-z ]{1,30}" id="event-title-input" name="event-title-input" class="form-control" placeholder="Event's title goes here." type="text">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group secret-input">
                                <span class="input-group-addon">Type</span>
                                <input id="event-type-input" name="event-type-input" class="form-control" value="memoir" type="text">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Date</span>
                                <input required data-provide="datepicker" pattern="[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]" id="event-date-input" name="event-date-input" class="form-control" placeholder="Pick the event's date." type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <div id="tags-input-group" class="input-group">
                                <div>
                                    <input data-role="tagsinput" id="event-tags-input" name="event-tags-input" class="form-control" placeholder="Tags" type="text">
                                </div>
                            </div>
                        </div>
                        
                        <ul id='eventTabs' class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#memoir" role="tab" data-toggle="tab">Memoir</a></li>
                            <li role="presentation"><a href="#article" role="tab" data-toggle="tab">Article</a></li>
                            <li role="presentation"><a href="#property" role="tab" data-toggle="tab">Property</a></li>
                            <li role="presentation"><a href="#photo" role="tab" data-toggle="tab">Photo</a></li>
                        </ul>
                        
                        <div class="tab-content">
                            
                            <div role="tabpanel" class="tab-pane fade in active" id="memoir">
                                <?php include 'forms/memoir-form.php'?>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="article">
                                <?php include 'forms/article-form.php'?>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="property">
                                <?php include 'forms/property-form.php'?>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="photo">
                                <?php include 'forms/photo-form.php'?>
                            </div>
                            
                        </div>
        
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" >Post</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            
        </div>
    </div>
</div>

<script>       
    $(document).ready(function(){
        /*Initialize the bootstrap's datepicker
        for event's date selector.*/
        $('#event-date-input').datepicker({
            format: 'dd/mm/yyyy',
        });
                
        var eventForm = document.getElementById("event-form"); 
        var currentTab = 'memoir';
        $('#memoir-content-input').attr('required','required');
        
        //Setup the event on form submition
        $("form[name='uploader']").submit(function(e) {
            //Create formdata to store form's values including photos
            var formData = new FormData($(this)[0]);
            formData.append('summernote',$('#summernote').code());
            //Send data to upload.php using ajax
            $.ajax({
                url: "upload.php",
                type: "POST",
                data: formData,
                async: false,
                //If ajax is successful, execute the followings
                success: function (data) {
                    $('#marker-modal').modal('hide');
                    insertMarker(data);
                },
                cache: false,
                contentType: false,
                processData: false
            });
            //Prevent the default reaction on form's submit
            e.preventDefault();
        });
            
        
        $('#marker-modal').on('shown.bs.modal', function () {
            $('#event-title-input').focus();
            eventForm.reset();
        });
        
        $('#marker-modal').on('hide.bs.modal', function () {            
            var info = document.getElementById ("info");
            info.innerHTML = "";
            $('input[data-role="tagsinput"]').tagsinput('removeAll');
            $('#photo-preview').attr('src', "");
        });
        
        
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var eventTitle = document.getElementById("event-title-input").value;       
            var eventDate = document.getElementById("event-date-input").value;  
            
            $('#memoir-content-input').removeAttr('required');
            $('#summernote').removeAttr('required');
            $('#photo-description-input').removeAttr('required');
            $('#fileInput').removeAttr('required');
            $('#property-type-input').removeAttr('required');
            $('#property-description-input').removeAttr('required');
            
            var currentTab = $(e.target).text().toLowerCase();
                    
            eventForm.reset();
            document.getElementById("event-title-input").value = eventTitle;
            document.getElementById("event-date-input").value = eventDate;
            document.getElementById('event-type-input').value = currentTab;
            
             switch(currentTab){
                case 'memoir':
                    $('#memoir-content-input').attr('required','required');
                    break;
                case 'article':
                    $('#summernote').attr('required','required');
                    break;
                case 'photo':
                    $('#photo-description-input').attr('required','required');
                    $('#fileInput').attr('required','required');
                    break;
                case 'property':
                    $('#property-type-input').attr('required','required');
                    $('#property-description-input').attr('required','required');
                    break;
            }
            
        });          
    });
</script>
