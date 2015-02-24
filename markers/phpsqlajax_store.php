<?php
    /*
       We receive the lattidute and longitude as well as the event's ID 
       and store them in the markers table of the database.
    */
    $lat=$_POST['lat'];
    $lng=$_POST['lng'];
    $eventID=$_POST['event'];

    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    $query = "INSERT INTO ".$database.".marker(event,lat,lng) VALUES ($eventID,$lat,$lng)";
    $result = mysql_query($query);

    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }
    else{
        return;
    }


?>