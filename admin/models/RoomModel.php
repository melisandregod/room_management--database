<?php 
    class Room{
        public $id; //roomId
        public $type; 
        public $price;
        public $detail; //detail
        public $roomStatus; //status
        public $typeid;

        public function __construct($id, $type, $detail,$roomStatus,$price) {
            $this->id = $id;
            $this->type = $type;
            $this->detail = $detail;
            $this->roomStatus = $roomStatus;
            $this->price = $price;

    }
        public static function getAll(){
            {
                $roomList = [];
                require("connection_connect.php");
                $sql = "SELECT r.roomId, t.typeName, t.price, r.roomStatus, GROUP_CONCAT(d.detailName SEPARATOR ', ') AS roomDetails FROM rooms r 
                        LEFT JOIN types t ON r.types_typeId = t.typeId 
                        LEFT JOIN roomDetail rd ON r.roomId = rd.rooms_roomId 
                        LEFT JOIN details d ON rd.details_detailId = d.detailId 
                        GROUP BY r.roomId;"; //เก็บเทเบิ้ลที่โชว์
                $result = $conn->query($sql);
                while ($my_row = $result->fetch_assoc()){
                    $id = $my_row['roomId'];
                    $type = $my_row['typeName'];
                    $detail = $my_row['roomDetails'];
                    $roomStatus = $my_row['roomStatus'];
                    $price = $my_row['price'];
                    $roomList[] = new Room($id, $type, $detail, $roomStatus, $price);
                }
                require("connection_close.php");
                return $roomList;
            }

        }

        public static function search($key)
            {
                $roomList = [];
                require("connection_connect.php");
                $sql = "SELECT 
                        r.roomId, 
                        t.typeName, 
                        t.price, 
                        r.roomStatus, 
                        GROUP_CONCAT(d.detailName SEPARATOR ', ') AS roomDetails 
                    FROM 
                        rooms AS r 
                    LEFT JOIN 
                        types AS t ON r.types_typeId = t.typeId 
                    LEFT JOIN 
                        roomDetail AS rd ON r.roomId = rd.rooms_roomId 
                    LEFT JOIN 
                        details AS d ON rd.details_detailId = d.detailId 
                    WHERE 
                        (r.roomId IN (
                            SELECT 
                                r2.roomId 
                            FROM 
                                rooms AS r2 
                            LEFT JOIN 
                                roomDetail AS rd2 ON r2.roomId = rd2.rooms_roomId 
                            LEFT JOIN 
                                details AS d2 ON rd2.details_detailId = d2.detailId 
                            WHERE 
                                d2.detailName LIKE '%$key%'  -- ค้นหา detail ที่ตรงตามคำค้น
                        ) 
                        OR r.roomId LIKE '%$key%' OR 
                            t.typeName LIKE '%$key%' OR 
                            t.price LIKE '%$key%' OR 
                            r.roomStatus LIKE '%$key%')  -- เพิ่มเงื่อนไขการค้นหาสำหรับ roomId, typeName, price, roomStatus
                    GROUP BY 
                        r.roomId, t.typeName, t.price, r.roomStatus 
                    ORDER BY 
                        r.roomId;";
                $result = $conn->query($sql);
                while ($my_row = $result->fetch_assoc()){
                    $id = $my_row['roomId'];
                    $type = $my_row['typeName'];
                    $detail = $my_row['roomDetails'];
                    $roomStatus = $my_row['roomStatus'];
                    $price = $my_row['price'];
                    $roomList[] = new Room($id, $type, $detail, $roomStatus, $price);
                }
                require("connection_close.php");
                return $roomList;  
            }


            public static function getRoomStats() { // ฟังก์ชันเพื่อดึงข้อมูลห้องทั้งหมด
                require("connection_connect.php");
            
                $sql = "SELECT 
                            COUNT(*) AS totalRooms,
                            SUM(CASE WHEN roomStatus = 0 THEN 1 ELSE 0 END) AS availableRooms,
                            SUM(CASE WHEN roomStatus = 1 THEN 1 ELSE 0 END) AS occupiedRooms
                        FROM rooms;";
            
                $result = $conn->query($sql);
                require("connection_close.php");
                return $result->fetch_assoc();
                
            }

            public static function getRoomTypesStats() { // ฟังก์ชันเพื่อดึงข้อมูลประเภทห้องและจำนวนห้องในแต่ละประเภท
                require("connection_connect.php");
                $sql = "SELECT types.typeName AS typeName, COUNT(rooms.roomId) AS count FROM rooms LEFT JOIN types ON rooms.types_typeId = types.typeId GROUP BY types.typeName;";
            
                $result = $conn->query($sql);
                $roomTypes = [];
                while ($row = $result->fetch_assoc()) {
                    $roomTypes[] = $row;
                }
                require("connection_close.php");
                return $roomTypes;
            }

            public static function addRoom($id,$typeid,$roomStatus){
                require("connection_connect.php");
                $sql = "INSERT INTO rooms (roomId,types_typeId,roomStatus)
                VALUES ('$id','$typeid','$roomStatus');";
                $result = $conn->query($sql);
                require("connection_close.php");
                return "add sucesss $result rows"; 
            }

            public static function addRoomDetail($id,$detailid){
                require("connection_connect.php");
                $sql = "INSERT INTO roomDetail (rooms_roomId,details_detailId)
                VALUES ('$id','$detailid');";
                $result = $conn->query($sql);
                require("connection_close.php");
                return "add sucesss $result rows"; 
            }


    }
?>