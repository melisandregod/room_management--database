<?php
    class Detail{
        public $id, $name;

        public function __construct($id, $name){
            $this->id = $id;
            $this->name = $name;
        }

        public static function getAll(){
            $detailList = [];
            require("connection_connect.php");
            $sql = "select * from details";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
                $id = $my_row['detailId'];
                $name = $my_row['detailName'];
                $detailList[] = new Detail($id, $name);
            }
            require("connection_close.php");
            return $detailList;
    }
        public static function search($key){
            $detailList = [];
            require("connection_connect.php");
            $sql = "SELECT * FROM `details` WHERE detailId LIKE '%$key%' OR detailName LIKE '%$key%'";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
                $id = $my_row['detailId'];
                $name = $my_row['detailName'];
                $detailList[] = new Detail($id, $name);
            }
            require("connection_close.php");
            return $detailList;

        }
        public static function delete($id){
            require_once("connection_connect.php");
            $sql1 = "DELETE FROM roomdetail WHERE details_detailId = '$id'";
            $result1 = $conn->query($sql1);;
            $sql = "DELETE FROM details WHERE detailId = '$id'";
            $result = $conn->query($sql);;
            require("connection_close.php");
            return "delete success $result row";
        }

        public static function addDetail($id,$detail){
            require("connection_connect.php");
            $sql = "INSERT INTO details (detailId,detailName)
            VALUES ('$id','$detail');";
            $result = $conn->query($sql);
            require("connection_close.php");
            return "add sucesss $result rows"; 
        }

        public static function updateDetail($id, $detailName) {
            require("connection_connect.php");
            $sql = "UPDATE details
                    SET detailName = '$detailName'
                    WHERE detailId = '$id'"; 
            $result = $conn->query($sql);
            require("connection_close.php");
            
            return "add sucesss $result rows"; 
        }
        


        public static function get($id)

        {
            require("connection_connect.php");
            $sql = "SELECT * FROM `details`
                    WHERE detailId = '$id'";
            $result = $conn->query($sql);
            $my_row = $result->fetch_assoc();
            $id = $my_row['detailId'];
            $detailName = $my_row['detailName'];
            require("connection_close.php");
            return new Detail($id,$detailName);

        }
}
?>