<?php
    function returnRow($result){
        if($result){
            $data = array();
            while($da = mysqli_fetch_assoc($result)){
                $data = $da;
            }
            return $data;
        }else{
            return false;
        }
    }
    function returnDataRow($result){
        if($result){
            $data = array();
            while($da = mysqli_fetch_assoc($result)){
                $data[] = $da;
            }
            return $data;
        }else{
            return false;
        }
    }

    function pre($data = NULL){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
?>