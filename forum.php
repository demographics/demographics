<?php 

     session_start(); 

    require("phpsqlajax_dbinfo.php");

    $connection=mysql_connect ($host, $username, $password);
    if (!$connection) {
        die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT * FROM $database.COMMUNITY WHERE id=".$_SESSION['pre74'];
    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

    $vill_name="";

    while ($row = @mysql_fetch_assoc($result)){  
        $vill_name=$row['name'];
    }

    $query = "SELECT * FROM $database.SUBJECT WHERE community=".$_SESSION['pre74'];
    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

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
            <h3>Forum for <?= "$vill_name"?> Village</h3>
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
            </div>
            
        </div>

    </body>
</html>

<script>
    <?php
        while ($row = @mysql_fetch_assoc($result)){ 
            $temp_title=$row['title'];
            
            $temp_time=$row['datetime'];
            $query="SELECT * FROM $database.MEMBER WHERE id=".$row['member'];
            $result2=mysql_query($query);
            $temp_email="";
            while ($row2 = @mysql_fetch_assoc($result2)){
            $temp_email=$row2['email'];
            }
            echo "add_theme('$temp_title','$temp_email','$temp_time');"; 
        }
    ?>
    
    $("#forum-add-btn").on("click",function(){
        $("#add-theme-modal").modal("toggle");
    });
    
    function add_theme(t,k,l){
        var a=document.createElement('a');
        a.setAttribute('href','#');
        a.setAttribute('class','list-group-item');
        var kume = document.getElementById('b');
        a.innerHTML="<div class='row'><div class='col-md-10'><h4>"+t+"</h4></div><div class='col-md-2'><p>"+k+"<br>"+l+"</p></div></div>";
        kume.appendChild(a);
    }
                
    
       
</script>