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
//
//    $query = "SELECT * from $database.MEMBER WHERE email='$email'";
//    $result = mysql_query($query);
//
//    $json_return;
//
//    while ($row = @mysql_fetch_assoc($result)){
//        $json_return = json_encode($row);
//    }
//
//    echo $json_return;
        
?>






if($stmt = $connection->prepare("SELECT * from $database.MEMBER WHERE email=? AND password=?")){
$stmt->bind_param("ss", $email,$user_password);
$stmt->execute();
$result = $stmt->get_result();
$row= $result->fetch_array(MYSQLI_ASSOC);


$mple=0;
$prasino=0;
$poios=-1;

$mple=$row['pre74'];
$prasino=$row['post74'];
$poios=$row['id'];

if($connection->affected_rows==1){
$_SESSION["email"]=$email;
$_SESSION["password"]=$user_password;
$_SESSION["logged_in"]=1;
$_SESSION["errorLogin"]=null;
$_SESSION["pre74"]=$mple;
$_SESSION["post74"]=$prasino;
$_SESSION["member"]=$poios;
header("location:login_success.php");
}else{
$_SESSION["errorLogin"]=1;
header("location:../../index.php");
}
ob_end_flush();

$stmt->close();
}