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
     
}
?>