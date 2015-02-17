<?php 
    //session_start();
   
    $search_query=$_POST['search_text'];
    
    
    _searchEvent($search_query);

    function _searchEvent($search_query_text){
        require("phpsqlajax_dbinfo.php");
        
        $connection=mysql_connect ($host, $username, $password);
        
        if (!$connection) {
          die('Not connected : ' . mysql_error());
        }
        
        $db_selected = mysql_select_db($database, $connection);

        if (!$db_selected) {
          die ('Can\'t use db : ' . mysql_error());
        }
    
        $query = "SELECT * FROM $database.`event` WHERE MATCH (title, tags) AGAINST ('$search_query_text' IN boolean MODE)";
        $result = mysql_query($query);
        $results=array();
        if (!$result) {
            die('Invalid query: ' . mysql_error());
        }
        
        while ($row = @mysql_fetch_assoc($result)){
            $results[] = $row; 
            }
        
        echo json_encode($results);
    
    }


?>