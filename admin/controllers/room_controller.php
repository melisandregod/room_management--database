<?php
    class RoomController{
        public function index(){
            $roomList = Room::getAll();
            require_once('views/room/index_room.php');
    }

     
}
?>