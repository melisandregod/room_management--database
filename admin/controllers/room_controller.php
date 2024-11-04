<?php
    class RoomController{
        public function index(){
            $roomList = Room::getAll();
            require_once('views/room/index_room.php');
    }
        public function search()
    {
            $key = $_GET['key'];
            $roomList = Room::search($key);
            require_once('views/room/index_room.php');
    }
        public function addForm()
        {
            $typeList =  Type::getAll();
            $detailList = Detail::getAll();
            require_once('views/room/add_room.php');
        }

        public function addRoom(){
            $id = $_GET['roomid'];
            $typeid = $_GET['typeid'];
            $roomStatus = $_GET['status'];
            $detail = $_GET['detail']; 
            Room::addRoom($id,$typeid, $roomStatus);
            // ลูป ตามจำนวนอาเร detailที่รับมา เพื่อใช้ addRoomDetail
            foreach ($detail as $detailid) {
                Room::addRoomDetail($id, $detailid); // เพิ่มรายละเอียดห้อง
            }
            // redirect ไปindex_roomเพื่อ clear get
            echo '<script type="text/javascript">';
            echo 'window.location.href = "?controller=room&action=index";';
            echo '</script>';
        }

        public function delete(){
            $id = $_GET['id'];
            Room::delete($id); // delete room
            // redirect ไปindex_roomเพื่อ clear get
            echo '<script type="text/javascript">';
            echo 'window.location.href = "?controller=room&action=index";';
            echo '</script>';
    
        }

        }

?>