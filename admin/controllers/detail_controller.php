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
    }
    
?>