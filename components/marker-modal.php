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
                                <input id="event-title-input" name="event-title-input" class="form-control" placeholder="Event's title goes here." required="" type="text">
                            </div>
                        </div>
                        
                        <div class="secret-input form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Type&nbsp;</span>
                                <input id="event-type-input" name="event-type-input" class="form-control" value="memoir" placeholder="Event's type goes here." required="" type="text">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Date</span>
                                <input data-provide="datepicker" id="event-date-input" name="event-date-input" class="form-control" placeholder="Pick the event's date." required="" type="text">
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
        $('#event-date-input').datepicker({
            format: 'dd/mm/yyyy',
        });
        
        var eventForm = document.getElementById("event-form"); 
        var currentTab = 'memoir';
        
        $("form[name='uploader']").submit(function(e) {
            var formData = new FormData($(this)[0]);
            
            $.ajax({
                url: "upload.php",
                type: "POST",
                data: formData,
                async: false,
                success: function (data) {
                    console.log(data);
                    $('#marker-modal').modal('hide');
                    insertMarker(data);
                },
                cache: false,
                contentType: false,
                processData: false
            });

            e.preventDefault();
        });
            
        $('#marker-modal').on('shown.bs.modal', function () {
            $('#event-title-input').focus();
            eventForm.reset();
        });
        
        $('#marker-modal').on('hide.bs.modal', function () {            
            var info = document.getElementById ("info");
            info.innerHTML = "";
            $('#photo-preview').attr('src', "");
        });
        
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var eventTitle = document.getElementById("event-title-input").value;       
            var eventDate = document.getElementById("event-date-input").value;  
            var currentTab = $(e.target).text().toLowerCase();
                    
            eventForm.reset();
            document.getElementById("event-title-input").value = eventTitle;
            document.getElementById("event-date-input").value = eventDate;
            document.getElementById('event-type-input').value = currentTab;
        });          
    });
</script>
