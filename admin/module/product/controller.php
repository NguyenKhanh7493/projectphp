<?php 
    if (isset($_GET['action']) && $_GET['action'] != ''){
        $action = $_GET['action'];
        switch ($action){
            case 'add' : include_once(path_root.'module/product/add.php');break;
            default : include_once(path_root.'layout/content.php');break;
        }
    }else{
        include_once(path_root.'layout/content.php');
    }
?>