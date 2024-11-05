<?php
    class PagesController{
        public function home(){
            // รับข้อมูลสถิติห้อง
            $roomStats = Room::getRoomStats();

            // รับข้อมูลประเภทห้อง
            $roomTypesStats = Room::getRoomTypesStats();

            // แยกชื่อประเภทห้องและจำนวนห้องออกมา
            $typeNames = [];
            $typeCounts = [];

            foreach ($roomTypesStats as $type) {
                $typeNames[] = $type['typeName'];
                $typeCounts[] = $type['count'];
            }
            require_once('views/pages/home.php');
        }
        public function error(){
            require_once("views/pages/error.php");
        }
    }
?>