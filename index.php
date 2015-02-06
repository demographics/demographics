<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Demography Prototype</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>       
        <script src="_/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="_/libs/bootstrap/loading/dist/spin.js"></script>
        <script src="_/libs/bootstrap/loading/dist/ladda.min.js"></script>
        <script src="_/libs/bootstrap/sweetalert/lib/sweet-alert.min.js"></script>
        <script src="_/libs/bootstrap/fileinput/js/fileinput.min.js"></script>
        <script src="_/libs/bootstrap/datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWMxUmWeNkBfkGxiaLBLLWBZSw3pxSNM0">
        </script>
        <script src="_/js/demographics.js" type="text/javascript"></script>
        <script src="_/js/googleMaps.js" type="text/javascript"></script>
        <script src="_/js/infobubble.js"></script>
        <script src="_/libs/summernote/summernote.min.js"></script>
        <script src="_/js/jquery.slimscroll.min.js"></script>
        
        <link rel="icon" type="image/ico" href="_/img/favicon.ico">
        <link href="_/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="_/libs/bootstrap/loading/dist/ladda-themeless.min.css" rel="stylesheet">
        <link href="_/libs/bootstrap/fileinput/css/fileinput.min.css" rel="stylesheet">
        <link href="_/libs/bootstrap/sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="_/libs/bootstrap/datepicker/css/datepicker3.css" rel="stylesheet">
        <link href="_/css/reset.css" rel="stylesheet">
        <link href="_/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="_/libs/summernote/summernote.css" rel="stylesheet">

    </head>

    <body> 
        <div id="map-canvas"></div>	
        <?php include 'components/marker-modal.php' ?>
        <?php include 'components/login-modal.php' ?>
        <?php include 'components/marker-view.php' ?>
        
        <?php 
            session_start();
            if(isset($_SESSION['logged_in'])){
                echo "<script>flag=true;</script>";
            }else{
                echo "<script>flag=false;</script>";
            }
        ?>
        
        
        <script>
            if(!flag){
                $('#login-modal').modal('toggle');
            }   
                        
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['misc',['codeview']]
                ]
            });
        </script>

    </body>
</html>