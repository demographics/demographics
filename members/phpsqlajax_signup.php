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

//    $p=$_POST['member-village-b1974-input'];
//    session_start();
//    $_SESSION["p_vill"]=$p;
    
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

    $_SESSION["p_vill"]=$pre74;
    $_SESSION["n_vill"]=$post74;
      
    require("../phpsqlajax_dbinfo.php");   
    
    $connection=mysqli_connect ($host, $username, $password,$database) or die("Error " . mysqli_error($connection));
    if($stmt = $connection->prepare("SELECT * from $database.MEMBER WHERE email=?")){
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row= $result->fetch_array(MYSQLI_ASSOC);

        if($connection->affected_rows==0){
            $query = "INSERT INTO $database.MEMBER(firstname, lastname, birthday, email, password, gender, pre74,post74) VALUES ('$firstname','$lastname',STR_TO_DATE('$birthdate', '%d/%m/%Y'),'$email','$user_password','$gender',$pre74,$post74)";

            $result1 = $connection->query($query);

            if (!$result1) {
                die('Invalid query: ' . mysql_error());
            }
            else{
                echo $firstname." ".$lastname;
            }

        }

        
        $stmt->close();
    }

?>