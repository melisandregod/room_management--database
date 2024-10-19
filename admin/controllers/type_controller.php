<?php 
    class TypeController{
        public function index(){
            $typeList =  Type::getAll();
            require_once('views/type/index_type.php');
        }
    }
?>