<?php
    session_start();
    /*
       We receive the lattidute and longitude as well as the event's ID 
       and store them in the markers table of the database.
    */
    $roadName=$_POST['roadname'];
    $path=json_encode($_POST['roadpath']);

    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    $memberID=$_SESSION["member"];

    $query = "INSERT INTO ".$database.".ROAD(name,path,member) VALUES ('$roadName','$path',$memberID)";
    $result = mysql_query($query);

    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }
    else{
        echo json_encode($_POST['roadpath']);
        return;
    }

?>