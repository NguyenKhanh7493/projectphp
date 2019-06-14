<?php
    $db = include_once(path_root.'config/database.php');
    $img_id = $_POST['id_img'];
    $sql = "DELETE FROM products WHERE id=".$img_id;
    $result = mysqli_query($db,$sql);
    if(isset($result)){
        echo "OK";
    }else{
        echo "NO";
    }
?>