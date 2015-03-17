<?php 
    $vill_name="Peristeronopigi"; 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Demographics forum</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>       
        <script src="_/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="_/js/jquery.slimscroll.min.js"></script>
        <script src="_/libs/bootstrap/tags/bootstrap-tagsinput.min.js"></script>
        
        <link rel="icon" type="image/ico" href="_/img/favicon.ico">
        <link href="_/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="_/libs/bootstrap/tags/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="_/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="_/css/community.css" rel="stylesheet">
        
        
    </head>

    <body>  
    
       <?php include 'components/add-theme-form.php'?>
        
        <div class="container">
            <h2>Demographics Forum</h2>
            <hr>
            <h3>Forum for <?php echo "$vill_name"?> Village</h3>
            <br>
                <nav class="navbar navbar-default">
                    
                    <div class="navbar-header">
                        <ul class="nav navbar-nav">
                    <li><button id="forum-add-btn" class="btn btn-default" type="submit">
                        <i class="fa fa-plus fa-2x"></i></button></li>
                            <li><input id="forum-search-text" type="text" class="form-control" placeholder="Search"></li>
                            <li><button id="forum-search" type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                </button></li>
                            </ul>                   
                    </div>
  
                </nav>
            
            <div id="b" class="list-group">
                <a href="#" class="list-group-item">Visit Church of Archangel Michael</a>                
                <a href="#" class="list-group-item">Collect money for poor families</a>
                <a href="#" class="list-group-item">Festival for Saint Anastasios</a>
                <a href="#" class="list-group-item">Meeting for our Village</a>
                <a href="#" class="list-group-item">Visit our Village</a>
            </div>
            
        </div>

    </body>
</html>

<script>
 
    
    $("#forum-add-btn").on("click",function(){
        $("#add-theme-modal").modal("toggle");
    });
    
            function add_theme(){
                var a=document.createElement('a');
                a.setAttribute('href','#');
                a.setAttribute('class','list-group-item');
                var kume = document.getElementById('b');
                a.innerHTML= document.getElementById("event-title-input").value;
                kume.appendChild(a);
                

            }
        
   /*     
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
    });    */
        

</script>