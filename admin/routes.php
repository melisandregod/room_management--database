<?php
    $controllers = array('pages'=>['home','error'],'room'=>['index','detail','type']);//action

    function call($controller,$action){
        require_once("controllers/".$controller."_controller.php");
        switch($controller){
            case "pages": $controller_obj = new PagesController();
                        break;
            case "room": require_once('models/RoomModel.php');
                        require_once('models/TypeModel.php');
                        require_once('models/DetailModel.php');
                        $controller_obj = new RoomController();
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