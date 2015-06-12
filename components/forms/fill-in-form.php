<div class="modal fade" id="fill-in-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Complete to sign up</h4>
            </div>
            <div id="sign-up-body" class="modal-body">
                <form name="sign-up-fb" id="sign-up-form-fb" action="members/phpsqlajax_facebook_signup.php" method="POST" class="form-horizontal">
                    <fieldset>

                        <div class="form-group">
                            <label class="control-label" for="member-date-of-birth-input">Date of Birth:</label>
                            <div class="">
                                <input placeholder="Place your date of birth here" id="member-date-of-birth-input" name="member-date-of-birth-input" placeholder="" class="form-control input-md" required="" type="text">
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


        $('#member-date-of-birth-input').datepicker({
            format: 'dd/mm/yyyy',
        });

        $("#TC-link").on("click",function(){
            $("#TC-modal").modal("toggle");
        });

        //console.log("from modal "+fbData);

        $("form[name='sign-up-fb']").submit(function(e) {
            var formData = new FormData($(this)[0]);
            //formData.append('fb-json',$('#property-type-input option:selected').text());
//            console.log("from modal "+data);
            console.log("from modal "+formData);
            console.log(fbData);
            formData.append("fbData", fbData);
            $.ajax({
                url: "members/phpsqlajax_facebook_signup.php",
                type: "POST",
                data: formData,
                async: false,
                success: function (data) {

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
                    //$("#sign-up-modal").modal('toggle');
                    $("#fill-in-modal").modal("hide");

                },

                cache: false,
                contentType: false,
                processData: false
            });

            e.preventDefault();
        });


</script>