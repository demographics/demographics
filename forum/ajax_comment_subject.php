<?php
    /*
        We receive the POST variables from the ajax called and 
        make a connection with the database so we can store the 
        comments. 
    */
    session_start();
    $subjectID=$_POST['subjectID'];
    $comment=$_POST['comment'];
    $email=$_SESSION['email'];

    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT id FROM $database.member WHERE email='$email'";
        $result = mysql_query($query);
        while ($row = @mysql_fetch_assoc($result)){
            $userID=$row['id'];
    }

    $query = "SELECT * FROM $database.SUBJECT WHERE SUBJECT.id=$subjectID";
        $result = mysql_query($query);
        while ($row = @mysql_fetch_assoc($result)){
            $ownerID=$row['member'];
    }

    $query = "INSERT INTO ".$database.".REPLY(`subject`,content,`datetime`,member) VALUES ($subjectID,'$comment',NOW(),$userID)";
    $result = mysql_query($query);

    $replyID="";
    $query = "SELECT id FROM $database.REPLY ORDER BY id DESC LIMIT 1;";
        $result = mysql_query($query);
        while ($row = @mysql_fetch_assoc($result)){
            $replyID=$row['id'];
    }
    
    
    $replyDate="";
    $query = "SELECT * FROM $database.REPLY WHERE id=$replyID";
        $result = mysql_query($query);
        while ($row = @mysql_fetch_assoc($result)){
            $replyDate=$row['datetime'];
    }

    $content=array('id'=>$replyID,'user'=>$email,'datePosted'=>$replyDate,'content'=>$comment);
    echo json_encode($content);
    
    return;
    /*   
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }
    else{
        $query = "INSERT INTO $database.NOTIFICATION(`member`, `owner`, `event`, `type`, `status`, `datetime`) VALUES ($userID, $ownerID, $eventID, 1, 'unseen', NOW())";
        $result = mysql_query($query);
        echo "Comment successfully.";
    }
    */
    

?>