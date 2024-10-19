<?php 
    class TypeController{
        public function index(){
            $typeList =  Type::getAll();
            require_once('views/type/index_type.php');
        }

        public function search(){
            $key = $_GET['key'];
            $typeList = Type::search($key);
            require_once('views/type/index_type.php');
        }
    }
?>