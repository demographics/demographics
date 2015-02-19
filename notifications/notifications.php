<?php 
    session_start();
    $email=$_SESSION['email'];
    $userID=null;

    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT id FROM $database.MEMBER WHERE email='$email'";
    $result = mysql_query($query);
    while ($row = @mysql_fetch_assoc($result)){
        $userID=$row['id'];
    }

    $query = "SELECT NOTIFICATION.member AS member, NOTIFICATION.id AS id, NOTIFICATION.status AS status, MEMBER.email AS email, NOTIFICATION.`datetime` AS `datetime`, EVENT.title AS title, NOTIFICATION.event AS eventID FROM $database.NOTIFICATION, $database.EVENT, $database.MEMBER WHERE NOTIFICATION.owner=$userID AND NOTIFICATION.event=EVENT.id AND NOTIFICATION.member=MEMBER.id";
    $result = mysql_query($query);

    $index = 1;

    while ($row = @mysql_fetch_assoc($result)){
        if($row['member'] != $userID){
            $notification['member'] = $row['email'];
            $notification['datePosted'] = $row['datetime'];
            $notification['eventID'] = $row['eventID'];
            $notification['eventTitle'] = $row['title'];
            if($row['status']=="seen")
                $notification['seen'] = true;
            else
                $notification['seen'] = false;
            $notification['id']=$row['id'];
            $notifications[$index] = $notification;
            $index+=1;
        }
    }
    if(empty($notifications))
        echo "";
    else
        echo json_encode($notifications);
?>