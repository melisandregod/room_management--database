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
                        LEFT JOIN roomdetail rd ON r.roomId = rd.rooms_roomId 
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
                        roomdetail AS rd ON r.roomId = rd.rooms_roomId 
                    LEFT JOIN 
                        details AS d ON rd.details_detailId = d.detailId 
                    WHERE 
                        (r.roomId IN ( -- หา roomId ที่ตรงตาม key ใช้ in เพราะ อาจจะ มี roomid หลายอัน LIKE ไม่สามารถใช้ได้หลายอัน
                            SELECT 
                                r2.roomId 
                            FROM 
                                rooms AS r2 
                            LEFT JOIN 
                                roomdetail AS rd2 ON r2.roomId = rd2.rooms_roomId 
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
                $sql = "INSERT INTO roomdetail (rooms_roomId,details_detailId)
                VALUES ('$id','$detailid');";
                $result = $conn->query($sql);
                require("connection_close.php");
                return "add sucesss $result rows"; 
            }

            public static function delete($id){
                require_once("connection_connect.php");
                $sql = "DELETE FROM roomdetail WHERE rooms_roomId = '$id'";
                $sql1 = "DELETE FROM rooms WHERE roomId = '$id'";
                $result = $conn->query($sql);
                $result1 = $conn->query($sql1);
                require("connection_close.php");
                return "delete success $result row";
            }
            public static function updateRoomDetail($id,$detailid)
            {
                    require("connection_connect.php");
                    $sql = "UPDATE roomdetail
                            SET rooms_roomId = '$id',detailid = '$detailid'
                            WHERE roomId = '$id' ";//ใช้ id ในก่ารหา เเละลบได้เเค่ name,offid
                    $result = $conn->query($sql);
                    require("connection_close.php");
                    return "update success $result row";
            }

            public static function updateRoom($id, $typeid, $roomStatus) {
                require("connection_connect.php");
                $sql = "UPDATE rooms 
                        SET roomStatus = ?, types_typeId = ?
                        WHERE roomId = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iii", $roomStatus, $typeid, $id);
                $stmt->execute();
                $stmt->close();
                require("connection_close.php");
            }
            


            public static function getRoom($id)

            {
                require("connection_connect.php");
                $sql = "SELECT r.roomId, t.typeName, t.price, r.roomStatus, GROUP_CONCAT(d.detailName SEPARATOR ', ') AS roomDetails FROM rooms r 
                        LEFT JOIN types t ON r.types_typeId = t.typeId 
                        LEFT JOIN roomdetail rd ON r.roomId = rd.rooms_roomId 
                        LEFT JOIN details d ON rd.details_detailId = d.detailId 
                        WHERE r.roomId = '$id'";
                $result = $conn->query($sql);
                $my_row = $result->fetch_assoc();
                $id = $my_row['roomId'];
                    $type = $my_row['typeName'];
                    $detail = $my_row['roomDetails'];
                    $roomStatus = $my_row['roomStatus'];
                    $price = $my_row['price'];
                    require("connection_close.php");
                    return new Room($id, $type, $detail, $roomStatus, $price);

            }
            public static function getType($id)

            {
                require("connection_connect.php");
                $sql = "SELECT types.typeName AS typeName,types.typeId As typeId FROM rooms 
                        LEFT JOIN types ON rooms.types_typeId = types.typeId 
                        WHERE rooms.roomId = '$id'";
                $result = $conn->query($sql);
                $my_row = $result->fetch_assoc();
                $id = $my_row['typeId'];
                require("connection_close.php");
                return $id;
            }

            public static function deleteRoomDetails($roomId) {
                require("connection_connect.php");
                $sql = "DELETE FROM roomdetail WHERE rooms_roomId = $roomId";
                $result = $conn->query($sql);
                require("connection_close.php");
                return "delete success $result row";
            }


            
        

            
       



    }
?>