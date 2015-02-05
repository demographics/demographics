<?php
    require("../phpsqlajax_dbinfo.php");
    $eventID = $_POST['eventID'];

    $connection=mysql_connect ($host, $username, $password);
    if (!$connection) {
        die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT * FROM event WHERE id=$eventID";
    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

    $contents[] = null;

    while ($row = @mysql_fetch_assoc($result)){  
        $contents['title'] = $row['title'];
        $contents['content'] = $row['content'];
    }
    echo json_encode($contents);
    
?>