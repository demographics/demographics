<?php
    /*
       We receive the event ID from the ajax called and match
       it with the event in the comment table in the database,
       then we create a json object containing all the comments 
       of the specified event and return them.
    */
    require("../phpsqlajax_dbinfo.php");
    $subjectID = $_POST['subjectID'];

    $connection=mysql_connect ($host, $username, $password);
    if (!$connection) {
        die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT * FROM REPLY, MEMBER WHERE REPLY.subject=$subjectID AND REPLY.member=MEMBER.id ORDER BY REPLY.datetime DESC";
    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

    $comments = array(); 

    while ($row = @mysql_fetch_assoc($result)){  
        $comment=array();
        $comment['content'] = $row['content'];
        $comment['datePosted'] = $row['datetime'];
        $comment['user'] = $row['email']; 
        array_push($comments,$comment);
    }
    echo json_encode($comments);
    return;
?>