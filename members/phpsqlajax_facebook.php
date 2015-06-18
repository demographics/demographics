<?php
     /*
        A test page to initialize database's member table
        so we can test page functionality. We simply state 
        the additional information and execute the store 
        query.
    */
    session_start();

    $str_json = file_get_contents('php://input');
    $json_decoded = json_decode($str_json);


    $firstname=$json_decoded->{'first_name'};
    $lastname=$json_decoded->{'last_name'};
    $birthdate=null;
    $email=$json_decoded->{'email'};
    checkMember($email);

    function checkMember($searching_email){


        require("../phpsqlajax_dbinfo.php");
        $user_password='';
        $connection=mysqli_connect($host, $username, $password,$database) or die("Error " . mysqli_error($connection));


        if($stmt = $connection->prepare("SELECT * from $database.MEMBER WHERE email=? AND password=?")) {
            $stmt->bind_param("ss", $searching_email, $user_password);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_array(MYSQLI_ASSOC);

            $mple = 0;
            $prasino = 0;
            $poios = -1;

            $mple = $row['pre74'];
            $prasino = $row['post74'];
            $poios = $row['id'];

            if ($connection->affected_rows == 1) {
                $_SESSION["email"] = $searching_email;
                $_SESSION["password"] = $user_password;
                $_SESSION["logged_in"] = 1;
                $_SESSION["errorLogin"] = null;
                $_SESSION["pre74"] = $mple;
                $_SESSION["post74"] = $prasino;
                $_SESSION["member"] = $poios;
                header("location:login/login_success.php");
            } else {
                print_r("NULL");

            }
            ob_end_flush();

            $stmt->close();
        }


    }


?>