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

        public function delete(){
            $id = $_GET['id'];
            Type::delete($id); // delete room
            // redirect ไปindex_roomเพื่อ clear get
            echo '<script type="text/javascript">';
            echo 'window.location.href = "?controller=type&action=index";';
            echo '</script>';
    
        }
    }
?>