<?php
     /*
        A test page to initialize database's member table
        so we can test page functionality. We simply state 
        the additional information and execute the store 
        query.
    */
    //$str_json = $_POST['str_json'];
    $str_json = file_get_contents('php://input');
    $json_decoded = json_decode($str_json);

    //print_r($json_decoded);
   // print_r($json_decoded->{'first_name'});


    $firstname=$json_decoded->{'first_name'};
    $lastname=$json_decoded->{'last_name'};
    $birthdate=null;
    $email=$json_decoded->{'email'};
    checkMember($email);

    function checkMember($searching_email){
        require("../phpsqlajax_dbinfo.php");

        $connection=mysql_connect ($host, $username, $password);

        if (!$connection) {
            die('Not connected : ' . mysql_error());
        }

        $db_selected = mysql_select_db($database, $connection);

        if (!$db_selected) {
            die ('Can\'t use db : ' . mysql_error());
        }

        $query = "SELECT * from $database.`member` where $database.`member`.email='$searching_email'";

        $result = mysql_query($query);
        $results=array();

        if (!$result) {
            //print_r($searching_email);
            die('Invalid query: ' . mysql_error());
        }

        if ($row = @mysql_fetch_assoc($result)){
            $results[] = $row;
        }
        else{
            print_r("NULL");
        }

//        $quantity = count($results);
//        print_r($quantity);
//        if ($quantity==0){
//            print_r($searching_email);
//        }


    }
//    $user_password_again=$_POST['member-password-input-again'];
//    $user_password=$_POST['member-password-input'];

//    $p=$_POST['member-village-b1974-input'];
//    session_start();
//    $_SESSION["p_vill"]=$p;
    
//    if (strcmp("$user_password_again","$user_password")!=0){
//        echo "2";
//        return;
//    }
//
//    $user_password = md5($user_password);
//    $gender=$_POST['member-sex-input'];
//
//    if($gender==1){
//        $gender='M';
//    }else{
//        $gender='F';
//    }
//
//    $pre74=$_POST['member-village-b1974-input'];
//    $post74=$_POST['member-village-a1974-input'];
//
//    $_SESSION["p_vill"]=$pre74;
//    $_SESSION["n_vill"]=$post74;
//
//    require("../phpsqlajax_dbinfo.php");
//
//    $connection=mysql_connect ($host, $username, $password);
//
//    if (!$connection) {
//      die('Not connected : ' . mysql_error());
//    }
//
//    $db_selected = mysql_select_db($database, $connection);
//
//    if (!$db_selected) {
//      die ('Can\'t use db : ' . mysql_error());
//    }
//
//    $query = "SELECT * from $database.MEMBER WHERE email='$email'";
//    $result = mysql_query($query);
//    if(mysql_num_rows($result)==0){
//        $query = "INSERT INTO $database.MEMBER(firstname, lastname, birthday, email, password, gender, pre74,post74) VALUES ('$firstname','$lastname',STR_TO_DATE('$birthdate', '%d/%m/%Y'),'$email','$user_password','$gender',$pre74,$post74)";
//
//        $result = mysql_query($query);
//
//        if (!$result) {
//            die('Invalid query: ' . mysql_error());
//        }
//        else{
//            echo $firstname." ".$lastname;
//        }
//
//    }
//    else{
//         echo "1";
//    }

?>