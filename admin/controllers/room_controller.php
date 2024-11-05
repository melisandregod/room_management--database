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

        public function updateForm()
        {
            $id = $_GET['id'];
            $room = Room::getRoom($id); // ดึงข้อมูลห้องที่ต้องการแก้ไข
            $typeid = Room::getType($id); // ดึงประเภทห้องของห้องนี้
            $typeList = Type::getAll(); // รายการประเภทห้องทั้งหมด
            $detailList = Detail::getAll(); // รายการรายละเอียดทั้งหมด
            $roomDetailList = RoomDetails::getByRoomId($id); // ดึง roomdetail เฉพาะที่เชื่อมกับห้องนี้
            require_once('views/room/update_room.php');
        }



        public function update(){
            $id = $_GET['roomid'];
            $typeid = $_GET['typeid'];
            $roomStatus = $_GET['status'];
            $detail = $_GET['detail']; 
            
            // อัปเดตข้อมูลประเภทห้องและสถานะห้อง
            Room::updateRoom($id, $typeid, $roomStatus);
            // ลบรายละเอียดเก่าที่เกี่ยวข้องกับห้องนี้ เพื่อเเก้ bug
            Room::deleteRoomDetails($id);
            // ลบเเล้วเพิ่ทไปใหมมมมมมม่ เเก้นานสัส
            foreach ($detail as $detailid) {
                Room::addRoomDetail($id, $detailid); // เพิ่มรายละเอียดห้องใหม่
            }

           
            // redirect ไปindex_roomเพื่อ clear get
           echo '<script type="text/javascript">';
           echo 'window.location.href = "?controller=room&action=index";';
           echo '</script>';
        }

        }

?>