<?php
    /*
        This is a faulty functional way of storing and updating
        the views of each event. It does not consider whether the 
        users pressed the specified event more than once. It always 
        increments the view of the event.
    */
    require("../phpsqlajax_dbinfo.php");
    $eventID = $_POST['eventID'];

    $connection=mysql_connect ($host, $username, $password);
    if (!$connection) {
        die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }

    $query = "UPDATE event SET view = view + 1 WHERE id=$eventID ";
    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

?>