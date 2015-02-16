<?php
    /*
        A test page to initialize database's community table
        so we can test page functionality. We simply state 
        the additional information and execute the store 
        query.
    */
    $name='Nicosia';
    
    require("../phpsqlajax_dbinfo.php");   
    $connection=mysql_connect ($host, $username, $password);

    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);

    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT * from $database.COMMUNITY WHERE name='$name'";
    $result = mysql_query($query);
    if(mysql_num_rows($result)==0){
        $query = "INSERT INTO $database.COMMUNITY(name) VALUES ('$name')";
        $result = mysql_query($query);

        if (!$result) {
            die('Invalid query: ' . mysql_error());
        }
        else{
            echo "Community '$name' stored successfully.";
        }
    }
    else{
         echo "Community '$name' already exists.";
    }


    

    

?>