<?php

    $firstname='Theodoros';
    $lastname='Charalambous';
    $birthdate='10/08/1992';
    $email='tchara05@cs.ucy.ac.cy';
    $user_password='tchara05';
    $user_password = md5($user_password);
    $gender='M';
    $pre74='2';
    $post74='1';
      
    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    

    $query = "SELECT * from $database.MEMBER WHERE firstname='$firstname'";
    $result = mysql_query($query);
    if(mysql_num_rows($result)==0){
        $query = "INSERT INTO $database.MEMBER(firstname, lastname, birthday, email, password, gender, pre74,post74) VALUES ('$firstname','$lastname',STR_TO_DATE('$birthdate', '%d/%m/%Y'),'$email','$user_password','$gender',$pre74,$post74)";

        $result = mysql_query($query);

        if (!$result) {
            die('Invalid query: ' . mysql_error());
        }
        else{
            echo "$firstname $lastname stored successfully.";
        }

    }
    else{
         echo "$firstname $lastname already exists.";
    }

?>