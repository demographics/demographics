<?php
    session_start();
    
    if(!isset($_SESSION["logged_in"])){
        header("location:../../index.php");
    }else{
        $user=$_SESSION['email'];
        $isLoggedin = $_SESSION['logged_in'];
        header("location:../../index.php?result=$isLoggedin&user=$user");
    }
?>
