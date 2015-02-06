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

    $query = "SELECT * FROM COMMENT, MEMBER WHERE COMMENT.event=$eventID AND COMMENT.member=MEMBER.id";
    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

    $comments[] = null;
    $index = 1;

    while ($row = @mysql_fetch_assoc($result)){  
        $comment[] = null;
        $comment['content'] = $row['content'];
        $comment['datePosted'] = $row['datetime'];
        $comment['user'] = $row['email']; 
        $comments[$index] = $comment;
        $index+=1;
    }
    echo json_encode($comments);
    
?>