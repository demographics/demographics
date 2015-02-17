<?php
     /*
        A test page to initialize database's member table
        so we can test page functionality. We simply state 
        the additional information and execute the store 
        query.
    */

    $firstname=$_POST['member_name_input'];
    $lastname=$_POST['member-surname-input'];
    $birthdate=$_POST['member-date-of-birth-input'];
    $email=$_POST['member-email-input'];
    $user_password_again=$_POST['member-password-input-again'];
    $user_password=$_POST['member-password-input'];
    
    if (strcmp("$user_password_again","$user_password")!=0){
        echo "2";
        return;
    }

    $user_password = md5($user_password);
    $gender=$_POST['member-sex-input'];

    if($gender==1){
        $gender='M';
    }else{
        $gender='F';
    }

    $pre74=$_POST['member-village-b1974-input'];
    $post74=$_POST['member-village-a1974-input'];
      
    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT * from $database.MEMBER WHERE email='$email'";
    $result = mysql_query($query);
    if(mysql_num_rows($result)==0){
        $query = "INSERT INTO $database.MEMBER(firstname, lastname, birthday, email, password, gender, pre74,post74) VALUES ('$firstname','$lastname',STR_TO_DATE('$birthdate', '%d/%m/%Y'),'$email','$user_password','$gender',$pre74,$post74)";

        $result = mysql_query($query);

        if (!$result) {
            die('Invalid query: ' . mysql_error());
        }
        else{
            echo $firstname." ".$lastname;
        }

    }
    else{
         echo "1";
    }

?>