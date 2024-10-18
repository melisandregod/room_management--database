<?php
    if(isset($_GET['controller'])&&isset($_GET['action'])){
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    }else{
        $controller = 'pages';
        $action = 'home';
    }
    //ดึงค่าจาก url
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Room Management</title>
    </head>
    <body>
        <?php  echo "controller = $controller, action = $action<br>" ?>
        <br>[<a href="?controller=pages&action=home">Home</a>]<br>
        <br>[<a href="?controller=room&action=index">Room</a>]<br>
        <?php  require_once("routes.php"); ?>
    </body>
</html>