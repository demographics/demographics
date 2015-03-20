<?php 
    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysql_connect ($host, $username, $password);
    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT * FROM $database.EVENT,$database.MARKER WHERE EVENT.id=MARKER.event ORDER BY date DESC;";
    $result = mysql_query($query);
    $rows = array();
    while($row = mysql_fetch_assoc($result)) {
        $rows[] = $row;
    }

    echo json_encode($rows);
?>