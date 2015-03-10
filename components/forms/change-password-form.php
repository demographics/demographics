<div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div id="change-password-body" class="modal-body">
        <form name="change-password-form" id="change-password-form" action="members/phpsqlajax_ch_password.php" method="POST" class="form-horizontal">
        <fieldset> 
         
        <div class="form-group">
          <label class="control-label" for="pre-password-input">Previous Password:</label>
          <div class="">
            <input id="pre-password-input" name="pre-password-input" placeholder="Type your previous password" class="form-control input-md" required="" type="password">
              <p style="color:red" id="password-pre" class="secret-combination" >* The input does not match with your password.</p>
          </div>
        </div>    
        <div class="form-group">
          <label class="control-label" for="change-password-input">New Password:</label>
          <div class="">
            <input id="change-password-input" name="change-password-input" placeholder="Type your password" class="form-control input-md" required="" type="password">
          </div>
        </div>
        <div class="form-group">
          <div class="">
            <input id="change-password-input-again" name="change-password-input-again" placeholder="Retype your password" class="form-control input-md" required="" type="password">
            <p style="color:red" id="password-error1" class="secret-combination" >* The password does not match with the first one.</p>
        </div>
        </div>         
         
      
      <div class="modal-footer">
          <div class="form-group">
            <button id="change-password-btn" type="submit" name="change-password-btn" class="btn btn-primary">Change</button>
            <button id="member-cancel-btn" data-dismiss="modal" name="member-cancel-btn" class="btn btn-default">Cancel</button>
          </div>
        </fieldset>
        </form>
      </div>
    </div>
  </div>
</div> 

    
    
<script>
    $("#change-password-btn").on("click",function(){
        $("#change-password-modal").modal("toggle");
    });
        
    $('#change-password-modal').on('hide.bs.modal', function () { 
        var changePasswordForm = document.getElementById("change-password-form");
        changePasswordForm.reset();
        $("#password-error1").addClass("secret-combination");
         $("#password-pre").addClass("secret-combination");
    });
    
       $("form[name='change-password-form']").submit(function(e) {
        var formData = new FormData($(this)[0]);        
         
        $("#password-error1").addClass("secret-combination");
         $("#password-pre").addClass("secret-combination");
        
         $.ajax({
            url: "members/phpsqlajax_ch_password.php",
            type: "POST",
            data: formData,
            async: false,
            data:{
                previous:$('#pre-password-input').val(),
                password1:$('#change-password-input').val(),
                password2:$('#change-password-input-again').val()
            },
            success: function (data) {
                if (data==2){
                    $("#password-error1").removeClass("secret-combination");
                }
                else if (data==3){
                    $("#password-pre").removeClass("secret-combination");
                }
                else{
                    swal({                     
                      title: "Success!",
                      text: "Your password change done succesfully!",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "Ok",
                      closeOnConfirm: true
                    });
                    $("#change-password-modal").modal('toggle');
                }
            }
        });


        e.preventDefault();
    });    
        

</script>