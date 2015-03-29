<?php
    /*
       We receive the event ID from the ajax called and match
       it with the event in the comment table in the database,
       then we create a json object containing all the comments 
       of the specified event and return them.
    */
    require("../phpsqlajax_dbinfo.php");

    $connection=mysql_connect ($host, $username, $password);
    if (!$connection) {
        die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT * FROM $database.ROAD";
    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

    $roads=[];
    while ($row = @mysql_fetch_assoc($result)){
        $road=array('id' => $row['id'],'name' => $row['name'],'path' => json_decode($row['path']));
        array_push($roads,$road);
    }

    echo json_encode($roads);
    return;
?>