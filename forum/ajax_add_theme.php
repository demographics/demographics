<?php
    session_start(); 

    $title=$_POST['title'];
    $content=$_POST['content'];
    $community=$_SESSION['pre74'];
    $member_id=$_SESSION['member'];
        
    require("../phpsqlajax_dbinfo.php");

    $connection=mysql_connect ($host, $username, $password);
    if (!$connection) {
        die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }

    $query = "INSERT INTO $database.SUBJECT(title,content,datetime,view,community,member) VALUES ('$title','$content',NOW(),0,$community,$member_id);";
    mysql_query($query);
    echo $query;
?>