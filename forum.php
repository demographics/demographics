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
        
    </head>

    <body>  
    
       
        
        <div class="container">
            <h2>Demographics Forum</h2>
            <hr>
            <h3>Forum for <?php echo "$vill_name"?> Village</h3>
            <div class="list-group">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                    <div class="navbar-header">
                    <button style="padding:0px; height:24px; mergin:0px; " class="btn btn-default" type="submit">
                        <i class="fa fa-plus fa-2x"></i></button>                       
                    <a class="navbar-brand" href="#">   
                    </a>
                        
    </div>
  </div>
</nav>
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">...</p>
                </a>
                <a href="#" class="list-group">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">...</p>
                </a>
                
            
            
            
            </div>
        </div>

    </body>
</html>