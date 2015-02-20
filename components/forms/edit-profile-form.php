<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit your profile</h4>
      </div>
      <div id="edit-body" class="modal-body">
        <form name="edit-form" id="edit-form" action="members/phpsqlajax_signup.php" method="POST" class="form-horizontal">
        <fieldset>

        <div class="form-group">
          <label class="control-label" for="edit-name-input">Name:</label>  
          <div class="">
          <input id="edit_name_input" disabled name="edit_name_input" placeholder="Type your name" class="form-control input-md" required="" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label" for="edit-surname">Surname:</label>  
          <div class="">
          <input id="edit-surname" disabled name="edit-surname" placeholder="Type your surname" class="form-control input-md" required="" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label" for="edit-date-of-birth-input">Date of Birth:</label>  
          <div class="">
          <input placeholder="Place your date of birth here" disabled id="edit-date-of-birth-input" name="edit-date-of-birth-input" placeholder="" class="form-control input-md" required="" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class=" control-label" for="edit-sex-input">Sex:</label>
          <div class=""> 
            <label class="radio-inline" for="edit-sex-input-0">
              <input disabled name="edit-sex-input" id="edit-sex-input-0" value="1" checked="checked" type="radio">
              Male
            </label> 
            <label class="radio-inline" for="edit-sex-input-1">
              <input disabled name="edit-sex-input" id="edit-sex-input-1" value="2" type="radio">
              Female
            </label>
          </div>
        </div>

        <div class="form-group">
          <label class=" control-label" for="edit-village-b1974-input">Place of living before 1974:</label>
          <div class="">
            <select disabled id="edit-village-b1974-input" name="edit-village-b1974-input" class="form-control">
              <option value="1">Peristerona</option>
              <option value="2">Pigi</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label" for="edit-village-a1974-input">Place of living after 1974:</label>
          <div class="">
            <select id="edit-village-a1974-input" name="edit-village-a1974-input" class="form-control">
              <option value="1">Strovolos</option>
              <option value="2">Egwmi</option>
            </select>
          </div>
            <p style="color:red" id="edit-post74-error" class="secret-combination" >* You already live here.</p>
        </div>

        <div class="form-group">
          <label class=" control-label" for="edit-email-input">Email:</label>  
          <div class="">
          <input id="edit-email-input" name="edit-email-input" placeholder="Type your e-mail:" class="form-control input-md" required="" type="email">
          <p style="color:red" id="edit-email-error" class="secret-combination" >* This email is already stored in the system.</p>
        </div>
        </div>
                
      </div>
      <div class="modal-footer">
          <div class="form-group">
            <button id="edit-btn" type="submit" name="edit-btn" class="btn btn-primary">Edit</button>
            <button id="edit-cancel-btn" data-dismiss="modal" name="edit-cancel-btn" class="btn btn-default">Cancel</button>
          </div>
        </fieldset>
        </form>
      </div>
    </div>
  </div>
</div> 

<script>
    $("#edit-pr-btn").on("click",function(){
        $("#edit-modal").modal("toggle");
        
        $.ajax({
            url: "members/phpsqlajax_edit.php",
            type: "POST",
            async: false,
            success: function (data) {
         
                var form_data = JSON.parse(data);
                
                $('#edit_name_input').val(form_data.firstname);
                $('#edit-surname').val(form_data.lastname);
                
                
                var bday=(form_data.birthday);
                
                var xronia=bday.substring(0,4);
                var minas=bday.substring(4,8);
                var mera=bday.substring(8,10);
                
                $('#edit-date-of-birth-input').val(mera+minas+xronia);
                
                if(form_data.gender == 'M')
                    $('#edit-sex-input-0').attr('checked',"checked");
                else
                    $('#edit-sex-input-1').attr('checked',"checked");
                
                $('#edit-village-a1974-input').val(form_data.post74);
                $('#edit-village-b1974-input').val(form_data.pre74);
                
                $('#edit-email-input').val(form_data.email);
            }
        });
    });
    
    $("form[name='edit-form']").submit(function(e) {
        var formData = new FormData($(this)[0]);
        
        $("#edit-email-error").addClass("secret-combination");
        $("#edit-post74-error").addClass("secret-combination");
        
        $.ajax({
            url: "members/phpsqlajax_update.php",
            type: "POST",
            data: formData,
            async: false,
            success: function (data) {
                if (data==1){
                    $("#edit-email-error").removeClass("secret-combination");
                }else if(data==2){
                    $("#edit-post74-error").removeClass("secret-combination");
                }
                else{
                    swal({
                      title: "Success!",
                      text: data,
                      type: "success",
                      showCancelButton: false,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "Ok",
                      closeOnConfirm: true
                    });
                    $("#edit-modal").modal('toggle');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });

        e.preventDefault();
    });

</script>

