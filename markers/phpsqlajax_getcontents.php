<?php
    session_start();
    /*
        We receive the event's ID from the ajax called and
        match it in the database so we can get each event's 
        contents and return them to the map via json objects.
    */
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

    $query = "SELECT * FROM EVENT, MEMBER WHERE EVENT.id=$eventID AND EVENT.member = MEMBER.id";
    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

    $event[] = null;

    while ($row = @mysql_fetch_assoc($result)){  
        $event['title'] = $row['title'];
        $event['content'] = $row['content'];
        $event['datePosted'] = $row['datetime'];
        $event['eventDate'] = $row['date'];
        $event['views'] = $row['view'];
        $event['likes'] = $row['like'];
        $event['type'] = $row['type'];
        $event['eventID'] = $row['id'];
        $event['user'] = $row['email'];
        
    }
    echo json_encode($event);
    
?>