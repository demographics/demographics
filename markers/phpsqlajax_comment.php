<?php
    /*
        We receive the POST variables from the ajax called and 
        make a connection with the database so we can store the 
        comments. 
    */
    session_start();
    $eventID=$_POST['eventID'];
    $comment=$_POST['comment'];
    $email=$_SESSION['email'];

    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT id FROM $database.member WHERE email='$email'";
        $result = mysql_query($query);
        while ($row = @mysql_fetch_assoc($result)){
            $userID=$row['id'];
    }

    $query = "INSERT INTO ".$database.".comment(`event`,content,`datetime`,member) VALUES ($eventID,'$comment',NOW(),$userID)";
    $result = mysql_query($query);

    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }
    else{
        echo "Comment successfully.";
    }


?>