<?php
    session_start();
    /*
        We receive the event's ID from the ajax called and
        match it in the database so we can get each event's 
        contents and return them to the map via json objects.
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

    $query = "SELECT EVENT.*,MEMBER.email FROM EVENT, MEMBER WHERE EVENT.member = MEMBER.id;";
    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

    $events;

    while ($row = @mysql_fetch_assoc($result)){  
        $event=array();
        $event['title'] = $row['title'];
        $event['content'] = $row['content'];
        $event['datePosted'] = $row['datetime'];
        $event['eventDate'] = $row['date'];
        $event['views'] = $row['view'];
        $event['likes'] = $row['like'];
        $event['type'] = $row['type'];
        $event['eventID'] = $row['id'];
        $event['user'] = $row['email'];
        
    
        $eventID=$row['id'];
        
        $query1 = "SELECT * FROM `comment`,`event`,`member` WHERE `comment`.event=`event`.id AND `member`.id=`comment`.member AND `event`.id=$eventID ORDER BY COMMENT.datetime DESC";
        $result1 = mysql_query($query1);
        if (!$result1) {
            die('Invalid query: ' . mysql_error());
        }

        $comments=array();

        while ($row1 = @mysql_fetch_assoc($result1)){  
            $comment;
            $comment['content'] = $row1['content'];
            $comment['datePosted'] = $row1['datetime'];
            $comment['user'] = $row1['email']; 
            array_push($comments,$comment);
        } 
        $event['comments']=$comments;
        $events[]=$event;
    }

    echo json_encode($events);
    
?>