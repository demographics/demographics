<?php
     /*
        We receive the information from the login form and
        if we can match a member from the database with the 
        email and the password, we then start a session with 
        these information, else we flash.
    */

    $data = $_POST['fbData'];
    $json_decoded = json_decode($data);


    $firstname=$json_decoded->{'first_name'};
    $lastname=$json_decoded->{'last_name'};
    $birthdate=null;
    $email=$json_decoded->{'email'};
    findMember($email);

    function checkMember($searching_email)
    {
        require("../phpsqlajax_dbinfo.php");

        $connection = mysql_connect($host, $username, $password);

        if (!$connection) {
            die('Not connected : ' . mysql_error());
        }

        $db_selected = mysql_select_db($database, $connection);

        if (!$db_selected) {
            die ('Can\'t use db : ' . mysql_error());
        }

        $query = "SELECT * from $database.`member` where $database.`member`.email='$searching_email'";

        $result = mysql_query($query);
        $results = array();

        if (!$result) {
            //print_r($searching_email);
            die('Invalid query: ' . mysql_error());
        }

        if ($row = @mysql_fetch_assoc($result)) {
            $results[] = $row;
        } else {
            print_r("NULL");
        }


    }






?>