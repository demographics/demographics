<?php
    session_start();
     /*
        A test page to initialize database's member table
        so we can test page functionality. We simply state 
        the additional information and execute the store 
        query.
    */
    
    $email=$_POST['edit-email-input'];
    $post74=$_POST['edit-village-a1974-input'];
    $user_email = $_SESSION['email'];

    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    if(strcmp("$email","$user_email")!=0){
        $query = "SELECT * from $database.MEMBER WHERE email='$email'";
        $result = mysql_query($query);

        if(mysql_num_rows($result)==0){
            $query = "UPDATE $database.MEMBER SET email='$email' WHERE email='$user_email'";
            $_SESSION['email']=$email;
            $result = mysql_query($query);
            $query = "UPDATE $database.MEMBER SET post74='$post74' WHERE email='$user_email'";
            $result = mysql_query($query);
            echo "Your profile has been edited.";
        }
        else{
            echo "1";
            return;
        }
    }else{
        $query = "SELECT * FROM $database.MEMBER WHERE email='$user_email' AND post74=$post74";
        $result = mysql_query($query);
        
        if(mysql_num_rows($result)==0){
            $query = "UPDATE $database.MEMBER SET post74='$post74' WHERE email='$user_email'";
            $result = mysql_query($query);
            echo "Your profile has been edited.";
        }else{
            echo "2";
            return;
        }
    }
?>