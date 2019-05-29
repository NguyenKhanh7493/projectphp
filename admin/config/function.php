
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

    if(!function_exists("replace"))
	{
	    function replace($str) {
	        if(!$str) return false;
	        $unicode = array(
	            'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
	            'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
	            'd'=>array('đ'),
	            '-'=>array('-'),
	            'D'=>array('Đ'),
	            'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
	            'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
	            'i'=>array('í','ì','ỉ','ĩ','ị'),
	            'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
	            'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
	            '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
	            'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
	            'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
	            'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
	            'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
	            '-'=>array(', ','. ','+'),
	            '' =>array(',','.',', ','+'),
	            '' =>array('(',')','+'),
	            '-'=>array(' .',' ;','; ',' :',': ',', ','+'),
	            '-'=>array(';',':'),
	            '-'=>array(' - ',' , ',',',', ','+'),
	        );

	        foreach($unicode as $nonUnicode=>$uni){
	            foreach($uni as $value)
	                $str = str_replace($value,$nonUnicode,$str);
	        }
	        $str =  str_replace('---','-', $str);
	        $str =  str_replace('--','-', $str);
	        return $str;
	    }
	}
	//upload 1 ảnh avatar
//	function upload_image($file = null,$folder = ''){
//        $img_name = '';
//        $type = $file['type'];
//        $name = $file['name'];
//        $tmp_name = $file['tmp_name'];
//        $size = $file['size'];
//        if ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
//            if ($size < 10485760){
//                if (move_uploaded_file($tmp_name,$folder.$name)){
//                    $img_name = $name;
//                }
//            }else{
//                echo "kích thước ảnh quá lớn";
//            }
//        }else{
//            echo "Bạn nhập sai định dạng ảnh";
//        }
//
//            return $img_name;
//    }

    //Hàm 1 ảnh được cải tiến
    function upload_avatar($file = null,$folder = ''){
        $avatar_name = '';
        $name = $file['name'];
        $type = $file['type'];
        $tmp_name = $file['tmp_name'];
        $size = $file['size'];
        if ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
            if ($size < 10485760){
                if (move_uploaded_file($tmp_name,$folder.$name)){
                    $avatar_name = $name;
                }else{
                    return ["errors"=>translate('Kích thước ảnh quá lớn')];
                }
            }else{
                return ["errors"=>"Kích thước ảnh quá lớn"];
            }
        }else{
            return ["errors" => "Bạn nhập sai định dạng ảnh"];
        }
        return $avatar_name;
    }

    //Upload nhiều ảnh được cải tiến
    function upload_images_arr($file = null,$folder = ''){
        if (!is_array($file)){
            return upload_images_arr($file,$folder);
        }
        $image_count = count($file['name']);
        $return_name = [];
        $return_err = [];
        for ($i=0;$i<$image_count;$i++){
            $name = $file['name'][$i];
            $type = $file['type'][$i];
            $tmp_name = $file['tmp_name'][$i];
            $size = $file['size'][$i];
            if ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
                if ($size < 10485760){
                    if (move_uploaded_file($tmp_name,$folder.$name)){
                        $return_name['success'][$i] = $name;
                    }
                }else{
                    $return_err['errors'][$i] = "Bạn nhập kích thước ảnh quá lớn";
                }
            }else{
                $return_err['errors'][$i] = "Bạn nhập sai định dạng ảnh";
            }
        }
        if ($return_err){
            return $return_err;
        }
        return $return_name;
    }

    //hàm upload nhiều ảnh
//    function muitiple_upload($file = NULL,$folder = ''){
//        $imgNameArray = array();
//        $num_img 	  = count($file['name']);
//        if($num_img > 0){
//            pre ($file['name'][0]);
//            for ($i=0; $i < $num_img ; $i++) {
//                $type   	=  $file['type'][$i];
//                $name  		=  $file['name'][$i];
//                $tmp_name   =  $file['tmp_name'][$i];
//                $size   	=  $file['size'][$i];
//                if($type == 'image/jpeg' || $type =='image/png' || $type == 'image/gif'){
//                    if($size < 10485760){
//                        if(move_uploaded_file($tmp_name,$folder.$name )){
//                            $imgNameArray[$i] = $name;
//                        }
//                    }
//                }
//            }
//        }
//        return $imgNameArray;
//    }

    function stripUnicode($str){
        if(!$str) return false;
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ',
            'D'=>'Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ');
        foreach($unicode as $khongdau=>$codau) {
            $arr=explode("|",$codau);$str = str_replace($arr,$khongdau,$str);
        }
        return $str;
    }

    function changeTitle($str){
        $str = trim($str);
        if($str == "") return "";
        $str = str_replace('"', '', $str);
        $str = str_replace("'", '', $str);
        $str = stripUnicode($str);
        $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
        $str = str_replace(' ', '-', $str);
        return $str ;
    }
    function controller(){
        if(isset($_GET['module']) && $_GET['module'] != ''){
            $module = $_GET['module'];
            switch ($module){
                case 'product' : include_once(path_root.'module/product/controller.php');break;
                default : include_once(path_root.'layout/content.php');break;
            }
        }else{
            include_once(path_root.'layout/content.php');
        }
    }
    function translate($key,$file = 'sys'){
        $folder_langague = isset($_SESSION['language']) ? $_SESSION['language'] : 'vi';
        $langugae = require_once(path_root.'langugues/'.$folder_langague.'/'.$file.'.php');
        return isset($langugae[$key])?$langugae[$key]:$key;
    }
?>