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

    $query = "SELECT * FROM $database.NOTIFICATION WHERE owner=$userID";
    $result = mysql_query($query);
    echo mysql_num_rows($result);
?>