<?php 
   
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
    
        //$query = "SELECT * FROM $database.`event` WHERE MATCH (title, tags) AGAINST ('$search_query_text' IN boolean MODE)";
        
        $query = "SELECT $database.MARKER.lat, $database.MARKER.lng, $database.`event`.type FROM (`event`) INNER JOIN MARKER ON $database.`event`.id = $database.MARKER.EVENT WHERE MATCH (title, tags) AGAINST ('$search_query_text' IN boolean MODE)";
        
        //$query = "SELECT $database.MARKER.lat, $database.MARKER.lng, $database.`event`.type FROM ($database.`event`, $database.MARKER) WHERE $database.`event`.id NOT IN (SELECT $database.`event`.id FROM $database.`event` WHERE MATCH (title, tags) AGAINST ('$search_query_text' IN boolean MODE)) AND ($database.`event`.id = $database.MARKER.EVENT)";

        $result = mysql_query($query);
        $results=array();
        if (!$result) {
            die('Invalid query: ' . mysql_error());
        }
        
        while ($row = @mysql_fetch_assoc($result)){
            $results[] = $row; 
            }
        
        //print_r($results);
        echo json_encode($results);
    
    }


?>