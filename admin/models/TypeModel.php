<?php
    class Type{
        public $id, $name,$price;

        public function __construct($id,$name,$price){  
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
        }

        public static function getAll(){
            $typeList = [];
            require("connection_connect.php");
            $sql = "SELECT * FROM types";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
                $id = $my_row['typeId'];
                $name = $my_row['typeName'];
                $price = $my_row['price'];
                $typeList[] = new Type($id,$name,$price);
            }
            require("connection_close.php");
            return $typeList;
        }
        public static function search($key){
            $typeList = [];
            require("connection_connect.php");
            $sql = "SELECT * FROM `types` WHERE typeId LIKE '%$key%' OR typeName LIKE '%$key%' OR price = '$key';";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
                $id = $my_row['typeId'];
                $name = $my_row['typeName'];
                $price = $my_row['price'];
                $typeList[] = new Type($id,$name,$price);
            }
            require("connection_close.php");
            return $typeList;

        }
        public static function delete($id){
            require_once("connection_connect.php");
            $sql = "DELETE FROM types WHERE typeId = '$id'";
            $result = $conn->query($sql);;
            require("connection_close.php");
            return "delete success $result row";
        }
    }
?>