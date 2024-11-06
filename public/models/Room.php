<?php
// models/Room.php
require_once 'config.php';

class Room {
    public static function getAll($sort = null) {
        global $conn;
        
        $sql = "SELECT r.roomId, t.typeName, t.price, r.roomStatus, GROUP_CONCAT(d.detailName SEPARATOR ', ') AS roomDetails 
                FROM rooms r 
                LEFT JOIN types t ON r.types_typeId = t.typeId 
                LEFT JOIN roomdetail rd ON r.roomId = rd.rooms_roomId 
                LEFT JOIN details d ON rd.details_detailId = d.detailId 
                GROUP BY r.roomId";
        
        // เพิ่มเงื่อนไขการจัดเรียง
        if ($sort === 'price_asc') {
            $sql .= " ORDER BY t.price ASC";
        } elseif ($sort === 'price_desc') {
            $sql .= " ORDER BY t.price DESC";
        } elseif ($sort === 'available') {
            $sql .= " ORDER BY r.roomStatus ASC";
        } elseif ($sort === 'occupied') {
            $sql .= " ORDER BY r.roomStatus DESC";
        }

        $result = $conn->query($sql);
        $rooms = [];
        while ($row = $result->fetch_assoc()) {
            $rooms[] = $row;
        }
        return $rooms;
    }
}
?>
