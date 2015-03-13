<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Demographics timeline</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>       
        <script src="_/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="_/js/jquery.slimscroll.min.js"></script>
        <script src="_/js/timeline.js"></script>
        
        <link rel="icon" type="image/ico" href="_/img/favicon.ico">
        <link href="_/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="_/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="_/css/timeline.css" rel="stylesheet">

    </head>

    <body>  
        <?php include 'timeline/timeline_modal.php'?>
        <script>
            $("#timeline_modal").modal('toggle');
        </script>
    </body>
</html>