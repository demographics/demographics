<?php
    class   Notifications{
        
        public $mysqli;
        public function _construct{
            $this->mysqli = new mysqli($host, $username, $password, $database);
        }
        
        public function storeNotification($eventID, $ownerID, $memberID, $typeID){
            $this->mysqli->query("INSERT INTO $database.NOTIFICATION(`member`, `owner`, `event`, `type`, `status`, `datetime`) VALUES ($memberID, $ownerID, $eventID, $typeID, 'unseen', NOW())");
        
        }
        
        public function loadNotification(){
        
        }
        
    }
?>