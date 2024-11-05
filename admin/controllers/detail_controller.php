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
    }
    
?>