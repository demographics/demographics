<?php

    $data = $_POST['fbData'];
    $json_decoded = json_decode($data);

    $firstname=$json_decoded->{'first_name'};
    $lastname=$json_decoded->{'last_name'};
    $birthdate=$_POST['member-date-of-birth-input'];
    $email=$json_decoded->{'email'};
    $user_password="null";

    $gender = $json_decoded->{'gender'};

    if (strcmp($gender, "male") == 0) {
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
        else{
            echo "1";
        }

        $stmt->close();
    }


?>