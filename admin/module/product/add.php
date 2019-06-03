<?php
$db = include_once('config/database.php');
$sql = "select * from users WHERE status = 1";
$result = mysqli_query($db,$sql);
$user_id = returnDataRow($result);
pre($user_id);
?>


<?php
if (isset($_POST['add_pro'])){
    $errors = array();
    $name = $_POST['name'];
    $cate = $_POST['cate_id'];
    $user = $_POST['user_id'];
    $status = $_POST['status'];
    $img = $_FILES['avatar'];
    $success = '';
    $img_arr = $_FILES['image_pro'];

    if(empty($name)){
        $errors['name'] = translate("1");
        // $errors['name'] = translate('Please! input your name');
    }

    if (empty($cate)){
        // $errors['cate_id'] = translate('Please! input category');
        $errors['cate_id'] = translate("2",'sys');
    }
    if (empty($user)){
        $errors['user_id'] = translate('Please! input user');
    }
    if (empty($status)){
        $errors['status'] = translate('Please! input status');
    }
    if (empty($img)){
        $errors['img'] = translate('Please! input avatar');
    }
    if (empty($img_arr)){
        $errors['img_arr'] = translate('Please! input image product');
    }

    $img_avatar_name = upload_avatar($img,'../../public/images/product/avatar/');
    if (isset($img_avatar_name['errors'])){
        $errors['img_name'] = $img_avatar_name['errors'];
    }

    $img_arr_name = upload_images_arr($img_arr,'../../public/images/product/');
    if (isset($img_arr_name['errors'])){

        $errors['image_pro'] = $img_arr_name['errors'][0];
    }





    $rewrite = changeTitle($name);

    //xong rồi đó a còn lại a check nốt hen, e làm a hiểểu k ?

    if($errors == null){
        $sql = "INSERT INTO `products` (`name`,`avatar`,`status`,`cate_id`,`user_id`) 
                        VALUES ('".$name."','".$img_avatar_name."','".$status."','".$cate."','".$user."')";
        $result = mysqli_query($db,$sql);
        var_dump($result);
        if(!$result){
            $errors['insert'] = translate('Database not found!');
        }else{
            for ($i=0;$i< count($img_arr_name['success']);$i++){
                $sql = "INSERT INTO `images` (`image_name`,`item_type`,`item_id`) VALUES ('".$img_arr_name['success'][$i]."','".$item_type."','".$id."')";
                mysqli_query($db,$sql);
                usleep(500);
            }
        }

    }


//            print_r($img);
    /*if(empty($name)){
        $errors[] = 'name';
    }elseif (empty($cate)){
        $errors[] = 'cate_id';
    }elseif (empty($user)){
        $errors[] = 'user_id';
    }elseif (empty($status)){
        $errors[] = 'status';
    }elseif (empty($img['name'])){
        $errors[] = 'img_name';
    }elseif (empty($img_arr['name'])){
        $errors[] = 'image_pro';
    }else{
        $img_avatar_name = upload_avatar($img,'../../public/images/product/avatar/');
        if (isset($img_avatar_name['errors'])){
            $errors['img_name'] = $img_avatar_name['errors'];
        }
        if (file_exists('../../public/images/product/avatar/'.$img['name'])){
            $errors['img_name'] = "trùng ảnh";
        }
        $img_arr_name = upload_images_arr($img_arr,'../../public/images/product/');
        if (isset($img_arr_name['errors'])){
            $errors['image_pro'] = $img_arr_name['errors'][0];
        }
//                if (file_exists('../../public/images/product/'.$img_arr['name'])){
//                    $errors['image_pro'][0] = 'trùng ảnh sản phẩm';
//                }
        var_dump($img_arr_name);
        $rewrite = changeTitle($name);
        $sql = "INSERT INTO `products` (`name`,`avatar`,`status`,`cate_id`,`user_id`)
                        VALUES ('".$name."','".$img_avatar_name."','".$status."','".$cate."','".$user."')";
        if (mysqli_query($db,$sql)){
            $sql = 'select id from products ORDER BY id DESC LIMIT 1';
            $result = mysqli_query($db,$sql);
            $id = 0;
            $item_type = 2;
            while ($item = mysqli_fetch_assoc($result)){
                $id = $item['id'];
                break;
            }
            for ($i=0;$i< count($img_arr_name['success']);$i++){
                $sql = "INSERT INTO `images` (`image_name`,`item_type`,`item_id`) VALUES ('".$img_arr_name['success'][$i]."','".$item_type."','".$id."')";
                mysqli_query($db,$sql);
                usleep(500);
            }
        }else{
            echo "Thất bại";
        }
    }*/
}
?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="white-box">
            <h3 class="box-title m-b-0"><?=translate('Add product')?></h3>
            <p class="text-muted m-b-30 font-13">  </p>
            <div class="row">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-12 col-xs-12">
                        <?php
                        if (isset($success) && $success == true){
                            echo '
                                <div class="alert alert-info">
                                    <strong>Thêm thành công</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                                </div>
                            ';
                        }
                        ?>

                        <?php if (isset($errors['insert'])){ ?>
                            <div class="alert alert-danger">
                                <strong><?=$errors['insert']?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" value="<?php if (isset($_POST['name']) && $_POST['name'] != '') { echo $_POST['name']; }?>">
                            <?php
                            if (isset($errors['name'])){
                                echo '<p style="color: red;">'.$errors['name'].'</p>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn menu</label>
                            <select class="form-control" data-placeholder="Choose a Category" name="cate_id" tabindex="1">
                                <option value="" selected="selected">Nhập cate</option>
                                <?php foreach ($cate_id as $id_cate){?>
                                    <option value="<?php echo  $id_cate['id']?>" <?php if (isset($_POST['cate_id']) && $_POST['cate_id'] == $id_cate['id']){?> selected="selected" <?php }?>><?php echo $id_cate['name']?></option>
                                <?php }?>
                            </select>
                            <?php
                            if (isset($errors['cate_id'])){
                                echo '<p style="color: red;">'.$errors['cate_id'].'</p>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn user</label>
                            <select class="form-control" data-placeholder="Choose a Category" name="user_id" tabindex="1">
                                <option value="" selected="selected">Nhập user</option>
                                <?php foreach ($user_id as $id_user){?>
                                    <option value="<?php echo $id_user['id']?>" <?php if (isset($_POST['user_id']) && $_POST['user_id'] == $id_user['id']){?> selected="selected" <?php }?>><?php echo $id_user['name']?></option>
                                <?php }?>
                            </select>
                            <?php
                            if (isset($errors['user_id'])){
                                echo '<p style="color: red;">'.$errors['user_id'].'</p>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">status</label>
                            <input type="text" class="form-control" name="status" placeholder="nhập status" value="<?php if (isset($_POST['status']) && $_POST['status'] != '') { echo $_POST['status']; }?>">
                            <?php
                            if (isset($errors['status'])){
                                echo '<p style="color: red;">'.$errors['status'].'</p>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <div class="white-box">
                                <h3 class="box-title">Ảnh đại diện </h3>
                                <input type="file" id="input-file-disable-remove" name="avatar" class="dropify" data-show-remove="true" multiple value="" />
                                <?php
                                if (isset($errors['img'])){
                                    echo '<p style="color: red;">'.$errors['img'].'</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="white-box">
                                <h3 class="box-title">Ảnh sản phẩm </h3>
                                <input type="file" id="input-file-disable-remove" name="image_pro[]" class="dropify" data-show-remove="true" multiple value="" />
                                <?php
                                if (isset($errors['img_arr'])){
                                    echo '<p style="color: red;">'.$errors['img_arr'].'</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div id="showImg" style="text-align: center">
                            <div class="form-group" name="parentImg">
                                <img src="" alt="" width="150">
                            </div>
                        </div>
                        <button type="submit" name="add_pro" class="btn btn-success waves-effect waves-light m-r-10">Thêm</button>
                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
