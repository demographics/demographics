<?php
    /*
        We receive the POST variables from the ajax called and 
        make a connection with the database so we can store the 
        comments. 
    */
    session_start();
    $roadID=$_POST['roadID'];
    $comment=$_POST['comment'];
    $userID=$_SESSION['member'];
    $ownerID;

    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT * FROM $database.ROAD WHERE ROAD.id=$roadID";
        $result = mysql_query($query);
        while ($row = @mysql_fetch_assoc($result)){
            $ownerID=$row['member'];
    }

    $query = "INSERT INTO ".$database.".ROAD_COMMENT(`road`,content,`datetime`,member) VALUES ($roadID,'$comment',NOW(),$userID)";
    $result = mysql_query($query);
    
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }
    else{
        $query = "INSERT INTO $database.NOTIFICATION(`member`, `owner`, `event`, `type`, `status`, `datetime`) VALUES ($userID, $ownerID, $roadID, 1, 'unseen', NOW())";
        $result = mysql_query($query);
        echo "Comment successfully.";
    }

    

?>