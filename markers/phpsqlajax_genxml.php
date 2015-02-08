<?php 
    /*
       We generate an XML file containing the markers of the events
       by executing the query and returning contents of type text/xml. 
       This is made easier on the server, instead of requesting each marker
       it requests all of them via the XML file.
    */
    require("../phpsqlajax_dbinfo.php");

    function parseToXML($htmlStr)
    {
        $xmlStr=str_replace('<','&lt;',$htmlStr);
        $xmlStr=str_replace('>','&gt;',$xmlStr);
        $xmlStr=str_replace('"','&quot;',$xmlStr);
        $xmlStr=str_replace("'",'&#39;',$xmlStr);
        $xmlStr=str_replace("&",'&amp;',$xmlStr);
        return $xmlStr;
    }

    $connection=mysql_connect ($host, $username, $password);
    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    $query = "SELECT * FROM marker WHERE 1";
    $result = mysql_query($query);
    if (!$result) {
      die('Invalid query: ' . mysql_error());
    }
    
    header("Content-type: text/xml");

    echo '<markers>';

    while ($row = @mysql_fetch_assoc($result)){  
      echo '<marker ';
      echo 'lat="' . $row['lat'] . '" ';
      echo 'lng="' . $row['lng'] . '" ';
      echo 'eventID="' . $row['event'] . '" ';
      echo '/>';
    }

    echo '</markers>';

?>