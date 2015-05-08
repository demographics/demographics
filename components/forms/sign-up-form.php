<div class="modal fade" id="sign-up-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Complete to sign up</h4>
      </div>
      <div id="sign-up-body" class="modal-body">
        <form name="sign-up-form" id="sign-up-form" action="members/phpsqlajax_signup.php" method="POST" class="form-horizontal">
        <fieldset>

        <div class="form-group">
          <label class="control-label" for="member-name-input">Name:</label>  
          <div class="">
          <input id="member_name_input" pattern="[A-Za-z]+" title="You can only use characters" name="member_name_input" placeholder="Type your name" class="form-control input-md" required="" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class=" control-label" for="member-surname-input">Surname:</label>  
          <div class="">
          <input id="member-surname-input" pattern="[A-Za-z]+" title="You can only use characters" name="member-surname-input" style="-webkit-appearance:none" placeholder="Type your surname" class="form-control input-md" required="" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label" for="member-date-of-birth-input">Date of Birth:</label>  
          <div class="">
          <input placeholder="Place your date of birth here" id="member-date-of-birth-input" name="member-date-of-birth-input" placeholder="" class="form-control input-md" required="" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class=" control-label" for="member-sex-input">Sex:</label>
          <div class=""> 
            <label class="radio-inline" for="member-sex-input-0">
              <input name="member-sex-input" id="member-sex-input-0" value="1" checked="checked" type="radio">
              Male
            </label> 
            <label class="radio-inline" for="member-sex-input-1">
              <input name="member-sex-input" id="member-sex-input-1" value="2" type="radio">
              Female
            </label>
          </div>
        </div>

        <div class="form-group">
          <label class=" control-label" for="member-village-b1974-input">Place of living before 1974:</label>
          <div class="">
            <select id="member-village-b1974-input" name="member-village-b1974-input" class="form-control">
              <option value="1">Peristerona</option>
              <option value="2">Pigi</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label" for="member-village-a1974-input">Place of living after 1974:</label>
          <div class="">
            <select id="member-village-a1974-input" name="member-village-a1974-input" class="form-control">
              <option value="1">Strovolos</option>
              <option value="2">Egwmi</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class=" control-label" for="member-email-input">Email:</label>  
          <div class="">
          <input id="member-email-input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="member-email-input" placeholder="Type your e-mail:" class="form-control input-md" required="" type="email">
          <p style="color:red" id="email-error" class="secret-combination" >* This email is already stored in the system.</p>
        </div>
        </div>

        <div class="form-group">
          <label class=" control-label" for="member-password-input">Password:</label>
          <div class="">
            <input id="member-password-input" name="member-password-input" placeholder="Type your password" class="form-control input-md" required="" type="password">

          </div>
        </div>
            
        <div class="form-group">
          <div class="">
            <input id="member-password-input-again" name="member-password-input-again" placeholder="Retype your password" class="form-control input-md" required="" type="password">
            <p style="color:red" id="password-error" class="secret-combination" >* The password does not match with the first one.</p>
        </div>
        </div>   
            
            
        <div class="form-group">
          <label class="control-label" for="accept-terms">
              You have to accept our <a href="#" id="TC-link">Terms&Conditions</a>
            </label>
          <div class="">
          <div class="checkbox">
            <label for="accept-terms-0">
              <input id="terms-checkbox" required="" name="accept-terms" id="accept-terms-0" value="1" type="checkbox">
              I do.
            </label>
            </div>
          </div>
        </div>
    
      </div>
      <div class="modal-footer">
          <div class="form-group">
            <button id="member-sign-up-btn" type="submit" name="member-sign-up-btn" class="btn btn-primary">Sign up</button>
            <button id="member-cancel-btn" data-dismiss="modal" name="member-cancel-btn" class="btn btn-default">Cancel</button>
          </div>
        </fieldset>
        </form>
      </div>
    </div>
  </div>
</div> 

<script>
    $("#sign-up-btn").on("click",function(){
        $("#sign-up-modal").modal("toggle");
    });
    
    $('#member-date-of-birth-input').datepicker({
        format: 'dd/mm/yyyy',
    });
    
    $("#TC-link").on("click",function(){
        $("#TC-modal").modal("toggle");
    });
    
    $('#sign-up-modal').on('shown.bs.modal', function () { 
        var signupForm = document.getElementById("sign-up-form");
        signupForm.reset();
        $("#password-error").addClass("secret-combination");
    });
    
    $("form[name='sign-up-form']").submit(function(e) {
        var formData = new FormData($(this)[0]);
        
        $("#password-error").addClass("secret-combination");
        $("#email-error").addClass("secret-combination");
        
        $.ajax({
            url: "members/phpsqlajax_signup.php",
            type: "POST",
            data: formData,
            async: false,
            success: function (data) {
                if (data==2){
                    $("#password-error").removeClass("secret-combination");
                }
                else if (data==1){
                    $("#email-error").removeClass("secret-combination");
                }
                else{
                    swal({
                      title: "Success!",
                      text: data+" welcome to Demographics!",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "Ok",
                      closeOnConfirm: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $('#tutorial_modal').modal('toggle');
                        }
                    });
                    $("#sign-up-modal").modal('toggle');
                }
            },
            
            cache: false,
            contentType: false,
            processData: false
        });

        e.preventDefault();
    });

</script>

