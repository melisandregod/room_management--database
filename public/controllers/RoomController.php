<?php
// controllers/RoomController.php
require_once 'models/Room.php';

class RoomController {
    public function index() {
        $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
        $rooms = Room::getAll($sort);
        require 'views/rooms/index.php';
    }
}
?>
