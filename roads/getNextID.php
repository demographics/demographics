<?php
    session_start();

    require("../phpsqlajax_dbinfo.php");

    $connection=mysql_connect ($host, $username, $password);
    if (!$connection) {
        die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = 'ROAD';";

    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

    $id=[];
    while ($row = @mysql_fetch_assoc($result)){
        $id['id']=$row['AUTO_INCREMENT'];
        $id['email']=$_SESSION['email'];
    }

    echo json_encode($id);
    return;
?>




