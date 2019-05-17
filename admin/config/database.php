<?php
    $db = mysqli_connect('localhost','root','','demo1');
    if(!$db){
        echo "Kết nối không thành công";
    }else{
        mysqli_set_charset($db,'utf8');
    }
?>