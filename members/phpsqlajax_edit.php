<?php
    session_start();
     /*
        A test page to initialize database's member table
        so we can test page functionality. We simply state 
        the additional information and execute the store 
        query.
    */

    $email=$_SESSION["email"];
      
    require("../phpsqlajax_dbinfo.php");   


    $connection=mysqli_connect ($host, $username, $password,$database) or die("Error " . mysqli_error($connection));

    if($stmt = $connection->prepare("SELECT * from $database.MEMBER WHERE email=?")){
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row= $result->fetch_array(MYSQLI_ASSOC);

        if($connection->affected_rows==1){

            $json_return = json_encode($row);

        }


        echo $json_return;
        $stmt->close();
    }

        
?>



