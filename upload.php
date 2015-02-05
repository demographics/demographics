<?php
 
    session_start();
    $eventType = $_POST['event-type-input'];
    $eventTitle = $_POST['event-title-input'];
    $eventDate = $_POST['event-date-input'];
    $userEmail =  $_SESSION["email"];
    $eventContent = null;

    switch($eventType){
        case "memoir":
            $eventContent=$_POST['memoir-content-input'];
            break;
        
        case "photo":
            $eventContent=$_POST['photo-description-input'];
            for($i=0; $i<count($_FILES['file']['name']); $i++) {
                move_uploaded_file($_FILES["file"]["tmp_name"][$i],
                "uploads/" . $_FILES["file"]["name"][$i]);
                $eventContent.='<img src="uploads/'.$_FILES["file"]["name"][$i].'"/>';
            }
            
            break;
        
        case "property":
            $eventContent='Type = '.$_POST['property-type-input'].', Description = '.$_POST['property-description-input'];
            break;
        
        case "article":
            $eventContent=$_POST['article-input'];
            break;
        
        default:
            ;
    }
    
    _storeEvent($eventTitle,$eventType,$eventDate,$eventContent);
        
    function _storeEvent($title,$type,$date,$content){
        require("phpsqlajax_dbinfo.php");  
        
        $email= $_SESSION['email'];
        $currentDatetime=null;
        $userID=null;
        $eventID=null;
        $connection=mysql_connect ($host, $username, $password);
        
//        $email = 'dpasch01@cs.ucy.ac.cy';
//        $title = 'Test title.';
//        $type = 'memoir';
//        $date = '03/02/2015';
//        $content = 'This is some test content.';
        
        if (!$connection) {
          die('Not connected : ' . mysql_error());
        }

        $db_selected = mysql_select_db($database, $connection);

        if (!$db_selected) {
          die ('Can\'t use db : ' . mysql_error());
        }
        $query = "SELECT id FROM $database.member WHERE email='$email'";
        $result = mysql_query($query);
        while ($row = @mysql_fetch_assoc($result)){
            $userID=$row['id'];
        }

        $query = "INSERT INTO $database.event(title,`type`,content,`datetime`,`date`,`view`,`like`,member) VALUES ('$title','$type','$content',NOW(),STR_TO_DATE('$date', '%d/%m/%Y'),0,0,$userID)";
        $result = mysql_query($query);        
        
        if (!$result) {
            die('Invalid query: ' . mysql_error());
        }
        else{
            $query = "SELECT id FROM $database.event WHERE title='$title' AND `type`='$type' AND `date`=STR_TO_DATE('$date', '%d/%m/%Y')";
            $result = mysql_query($query);        
            while ($row = @mysql_fetch_assoc($result)){
               $eventID=$row['id'];
            }
            echo $eventID;
           // echo 'Event stored successfully';
        }
    }
?>