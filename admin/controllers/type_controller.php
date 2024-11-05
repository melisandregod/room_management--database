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

        public function addForm()
        {   
            require_once('views/type/add_type.php');
        }

        public function addType(){
            $id = $_GET['typeId'];
            $typeName = $_GET['typeName']; 
            $price = $_GET['price'];
            Type::addType($id,$typeName,$price);
            // redirect ไปindex_detailเพื่อ clear get
            echo '<script type="text/javascript">';
            echo 'window.location.href = "?controller=type&action=index";';
            echo '</script>';
        }

        public function updateForm()
        {
            $id = $_GET['id'];
            $type = Type::get($id);
            require_once('views/type/update_type.php');
        }



        public function update(){
            $id = $_GET['typeId'];
            $typeName = $_GET['typeName'];
            $price = $_GET['price'];
            Type::updateType($id,$typeName,$price);

           
            // redirect ไปindex_roomเพื่อ clear get
           echo '<script type="text/javascript">';
           echo 'window.location.href = "?controller=type&action=index";';
           echo '</script>';
        }
    }
?>