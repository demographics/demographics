<?php
    session_start(); 

    $email=$_POST['email'];
    $date=$_POST['date'];    
   
    //echo "$date $email"; 
        
    require("../phpsqlajax_dbinfo.php");

    $connection=mysql_connect ($host, $username, $password);
    if (!$connection) {
        die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT * FROM $database.MEMBER WHERE email='$email'";
    $result = mysql_query($query);    
    
    $row = mysql_fetch_row($result); 
    $id=$row[0];

   // echo $id;
    
    $query = "SELECT * FROM $database.SUBJECT WHERE member='$id' AND SUBSTRING(`datetime`,1,LENGTH(`datetime`)-3)=SUBSTRING('$date',1,LENGTH('$date')-3); ";
    $result1 = mysql_query($query); 
    
    $title="";
    $content="";

    while ($row1 = mysql_fetch_row($result1)){  
        $title=$row1[1];
        $content=$row1[2];
    }

    echo "$title#$content";

    //$row1 = mysql_fetch_row($result1); 
    //echo $row1[1];

   // echo "$h";
?>