<?php
    $controllers = array('pages'=>['home','error'],'room'=>['index','search','addForm','addRoom','update','delete','updateForm'],'detail'=>['index','search','addForm','addDetail','update','delete','updateForm'],'type'=>['index','search','addType','update','delete','updateForm','addForm']);//action

    function call($controller,$action){
        require_once("controllers/".$controller."_controller.php");
        switch($controller){
            case "pages":   require_once('models/RoomModel.php');
                            $controller_obj = new PagesController();
                        break;
            case "room": require_once('models/RoomModel.php');
                        require_once('models/TypeModel.php');
                        require_once('models/DetailModel.php');
                        require_once('models/RoomDetailModel.php');
                        $controller_obj = new RoomController();
                        break;
            case "detail": require_once('models/DetailModel.php');
                           $controller_obj = new DetailController();
                            break;  
            case "type": require_once('models/TypeModel.php');
            $controller_obj = new TypeController();
            break;
        }
        $controller_obj->{$action}(); //เรียก function(action) ของ controller
    }

    if(array_key_exists($controller,$controllers)){
        if(in_array($action,$controllers[$controller])){
            call($controller,$action);
        }else{
            call('pages','error');
        }
    }else{
        call('pages','error');
    }
?>