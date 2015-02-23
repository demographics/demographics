<?php
    session_start();
     /*
        A test page to initialize database's member table
        so we can test page functionality. We simply state 
        the additional information and execute the store 
        query.
    */

    $email=$_SESSION["email"];
    $password1 = $_POST['password1'];
    $password2 = $_POST[];

    require("../phpsqlajax_dbinfo.php");   

    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }


    $query = "UPDATE $database.MEMBER SET password='$password2' WHERE email='$email'";
    $result = mysql_query($query);

        
?>