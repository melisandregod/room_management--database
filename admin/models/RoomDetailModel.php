<?php
class RoomDetails{
        public $id;
        public $roomid;
        public $detailid;

        public function __construct($id, $roomid, $detailid) {
            $this->id = $id;
            $this->roomid = $roomid;
            $this->detailid = $detailid;

    }

        public static function getAll() {
            $roomDetailList = []; 
            require("connection_connect.php"); 
    
            $sql = "SELECT * FROM roomdetail"; 
            $result = $conn->query($sql);
    
            while($my_row = $result->fetch_assoc()) {
                
                $roomDetailId = $my_row['roomDetailId'];
                $rooms_roomId = $my_row['rooms_roomId'];
                $details_detailId = $my_row['details_detailId'];
    
                
                $roomDetailList[] = new RoomDetails($roomDetailId, $rooms_roomId, $details_detailId);
            }
    
            require("connection_close.php"); 
            return $roomDetailList; // 
        }
               
        
        public static function getByRoomId($roomId) {
            $roomDetailList = []; 
            require("connection_connect.php"); 
        
            $sql = "SELECT * FROM roomdetail WHERE rooms_roomId = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $roomId);
            $stmt->execute();
            $result = $stmt->get_result();
        
            while($my_row = $result->fetch_assoc()) {
                $roomDetailId = $my_row['roomDetailId'];
                $rooms_roomId = $my_row['rooms_roomId'];
                $details_detailId = $my_row['details_detailId'];
        
                $roomDetailList[] = new RoomDetails($roomDetailId, $rooms_roomId, $details_detailId);
            }
        
            require("connection_close.php"); 
            return $roomDetailList;
        }
        
        
    }
    
    

?>