<?php
    class DetailController{
        public function index(){
            $detailList =  Detail::getAll();
            require_once('views/detail/index_detail.php');
        }
    }
?>