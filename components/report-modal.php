<div id="report-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h1>Report</h1>
            </div>
            <form name='report_form' method="post" action="members/send_report.php" class="form-horizontal">
                <fieldset>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="event-title-preview">Event's title</label>  
                                <input id="event-title-preview" name="event-title-preview" disabled class="form-control input-md" required="" type="text">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="event-user-preview">Event's user</label>
                                <input id="event-user-preview" name="event-user-preview" disabled class="form-control input-md" required="" type="email">
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="report-content-input">Content</label>
                            <div>                     
                                <textarea placeholder="Report description goes here." class="form-control" id="report-content-input" name="report-content-input"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="login-btn"></label>
                            <div class="col-md-8">
                                <button id="file-report-btn" name="file-report-btn"  class="btn btn-primary">Send</button>
                                <button id="cancel-report-btn" name="cancel-report-btn" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>   
    </div>
</div>

<script>
    $("form[name='report_form']").submit(function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "members/send_report.php",
            type: "POST",
            data: formData,
            async: false,
            success: function () {
                $('#report-modal').modal('hide');
                $('#marker-view').modal('hide');
                 swal({
                      title: "Your report has been sent.",
                      text:"As soon as we are able, we will look into it.",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "Ok",
                      closeOnConfirm: true
                });
            },
            cache: false,
            contentType: false,
            processData: false
        });
        e.preventDefault();
    });  
</script>