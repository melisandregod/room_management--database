<?php
    class DetailController{
        public function index(){
            $detailList =  Detail::getAll();
            require_once('views/detail/index_detail.php');
        }

        public function search(){
                $key = $_GET['key'];
                $detailList = Detail::search($key);
                require_once('views/detail/index_detail.php');
        }

        public function delete(){
            $id = $_GET['id'];
            Detail::delete($id); // delete room
            // redirect ไปindex_roomเพื่อ clear get
            echo '<script type="text/javascript">';
            echo 'window.location.href = "?controller=detail&action=index";';
            echo '</script>';
    
        }

        public function addForm()
        {   
            require_once('views/detail/add_detail.php');
        }

        public function addDetail(){
            $id = $_GET['detailid'];
            $detail = $_GET['detail']; 
            Detail::addDetail($id,$detail);
            // redirect ไปindex_detailเพื่อ clear get
            echo '<script type="text/javascript">';
            echo 'window.location.href = "?controller=detail&action=index";';
            echo '</script>';
        }


        public function updateForm()
        {
            $id = $_GET['id'];
            $detail = Detail::get($id);
            require_once('views/detail/update_detail.php');
        }



        public function update(){
            $id = $_GET['detailId'];
            $detailName = $_GET['detailName'];
            Detail::updateDetail($id, $detailName);

           
            // redirect ไปindex_roomเพื่อ clear get
           echo '<script type="text/javascript">';
           echo 'window.location.href = "?controller=detail&action=index";';
           echo '</script>';
        }

        
    }
    
?>