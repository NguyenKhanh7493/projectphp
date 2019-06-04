<?php
$db = include_once('config/database.php');
$id = $_GET['id'];
$sql = 'select *
        from products WHERE id = '.$_GET['id'];
$result = mysqli_query($db,$sql);
$data = returnRow($result);

$sql = 'select * from images WHERE item_id = '.$data['id'];
$result = mysqli_query($db,$sql);
$pImg = returnDataRow($result);

$sql = "select * from users WHERE status = 1";
$result = mysqli_query($db,$sql);
$user_id = returnDataRow($result);

$sql = "select * from cates WHERE status = 1";
$result = mysqli_query($db,$sql);
$cate_id = returnDataRow($result);

if (isset($_POST['edit_pro'])){
    $errors = array();
    $name = $_POST['name'];
    $cate = $_POST['cate_id'];
    $user = $_POST['user_id'];
    $status = $_POST['status'];
    $img = $_FILES['avatar'];
    $success = '';
    $img_arr = $_FILES['image_pro'];
    if (empty($name)){
        $errors['name'] = translate('Please! input your name');
    }
    if (empty($cate)){
        $errors['cate_id'] = translate('Please! input category');
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

    $img_avatar_name = upload_avatar($img,path_root.'public/images/product/avatar/');
    if (isset($img_avatar_name['errors'])){
        $errors['img_name'] = $img_avatar_name['errors'];
    }
//    if (file_exists(path_root.'public/images/product/avatar/'.$img['name'])){
//        $errors['img_name'] = "trùng ảnh";
//    }

    $img_arr_name = upload_images_arr($img_arr,path_root.'public/images/product/');
    if (isset($img_arr_name['errors'])){

        $errors['image_pro'] = $img_arr_name['errors'][0];
    }
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

            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" value="<?php if (isset($data['name']) && $data['name'] != '') { echo $data['name']; }?>">
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
                        <option value="<?php echo  $id_cate['id']?>" <?php if (isset($data['cate_id']) && $data['cate_id'] == $id_cate['id']){?> selected="selected" <?php }?>><?php echo $id_cate['name']?></option>
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
                        <option value="<?php echo $id_user['id']?>" <?php if (isset($data['user_id']) && $data['user_id'] == $id_user['id']){?> selected="selected" <?php }?>><?php echo $id_user['name']?></option>
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
                <input type="text" class="form-control" name="status" placeholder="nhập status" value="<?php if (isset($data['status']) && $data['status'] != '') { echo $data['status']; }?>">
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
            <div id="showImg" style="text-align: center">
                <div class="form-group" name="parentImg">
                    <img src="<?=base_url?>/admin/public/images/product/avatar/<?php echo $data['avatar']?>" alt="" width="150">
                    <?php
                    if (isset($errors['img_arr'])){
                        echo '<p style="color: red;">'.$errors['img_arr'].'</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="white-box">
                    <h3 class="box-title">Ảnh sản phẩm </h3>
                    <input type="file" id="input-file-disable-remove" name="image_pro[]" class="dropify" data-show-remove="true" multiple value="" />
                </div>
            </div>
            <?php foreach ($pImg as $item){?>
            <div id="">
                <div class="form-group" id="parentImg">
                    <img src="<?=base_url?>/admin/public/images/product/<?php echo $item['image_name']?>" alt="" width="150" id="pro_img">
                    <a href="javascript:void(0)" class="clearImg text-danger delItemPro" type="button" data-id="" data-link="" data-msg="Bạn có muốn xóa ảnh này?"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <?php }?>
            <button type="submit" name="edit_pro" class="btn btn-success waves-effect waves-light m-r-10">Thêm</button>
            <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
        </div>
    </form>
</div>
</div>
</div>
<div class="col-md-3"></div>
</div>