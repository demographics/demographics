<?php 
    session_start();
    $to = "paschalidesdemetris@gmail.com"; 
    $subject = 'Event Report';
    $message = $_POST['report-content-input'];
    $from = $_SESSION['email'];
    $headers = "From:" . $from;
    //mail($to,$subject,$message,$headers);
?>