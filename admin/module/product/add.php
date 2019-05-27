<?php
    session_start();
    if (!isset($_SESSION['email']) || !isset($_SESSION['status'])){
        header('location:/admin/login.php');
    }
    include ('../../config/database.php');
    include ('../../config/function.php');
    include ('../../config/define.php');
    $title = 'Thêm sản phẩm';
    $sql = "select * from users WHERE status = 1";
    $result = mysqli_query($db,$sql);
    $user_id = returnDataRow($result);

    //load danh sách cate
    $query = "select * from cates WHERE status = 1";
    $result = mysqli_query($db,$query);
    $cate_id = returnDataRow($result);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin-crm/form-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 09:39:47 GMT -->
<?php include ('../../layout/head.php');?>
<body class="fix-sidebar">
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
//            print_r($img);
            if(empty($name)){
                $errors[] = 'name';
            }elseif (empty($cate)){
                $errors[] = 'cate_id';
            }elseif (empty($user)){
                $errors[] = 'user_id';
            }elseif (empty($status)){
                $errors[] = 'status';
            }elseif (empty($img['name'])){
                $errors[] = 'img_name';
            }elseif ($img_arr['name']){
                $errors[] = 'image_pro';
            }else{
                $img_avatar_name = upload_image($img,'../../public/images/product/avatar/');
                if (file_exists('../../public/images/product/avatar/')){
                    echo "trùng ảnh";
                }
                $rewrite = changeTitle($name);
                $sql = "INSERT INTO `products` (`name`,`alias`,`avatar`,`status`,`cate_id`,`user_id`)
                            VALUES ('".$name."','".$rewrite."','".$img_avatar_name."','".$status."','".$cate."','".$user."')";
                print_r($sql);
                echo "Thành công";
                if (mysqli_query($db,$sql)){
                    echo $success ;
                    $sql = '';
                }else{
                    echo "Thất bại";
                }
            }
        }
        ?>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    <?php include ('../../layout/slidebar.php');?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title"><?php echo $title?></h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<!--                    <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>-->
<!--                    <ol class="breadcrumb">-->
<!--                        <li><a href="#">Dashboard</a></li>-->
<!--                        <li><a href="#">Ui Elements</a></li>-->
<!--                        <li class="active">Notifications</li>-->
<!--                    </ol>-->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Thêm sản phẩm</h3>
                        <p class="text-muted m-b-30 font-13">  </p>
                        <div class="row">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="col-sm-12 col-xs-12">
                                    <?php
                                        if (isset($success)){
                                            echo '
                                                <div class="alert alert-info">
                                                    <strong>Thêm thành công</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                                                </div>
                                            ';
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" value="<?php if (isset($_POST['name']) && $_POST['name'] != '') { echo $_POST['name']; }?>">
                                        <?php
                                        if (isset($errors) && in_array('name',$errors)){
                                            echo '<p style="color: red;">(*) Bạn chưa nhập tên</p>';
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
                                        if (isset($errors) && in_array('cate_id',$errors)){
                                            echo '<p style="color: red;">(*) Bạn chưa chọn cate</p>';
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
                                        if (isset($errors) && in_array('user_id',$errors)){
                                            echo '<p style="color: red;">(*) Bạn chưa chọn admin</p>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">status</label>
                                        <input type="text" class="form-control" name="status" placeholder="nhập status" value="<?php if (isset($_POST['status']) && $_POST['status'] != '') { echo $_POST['status']; }?>">
                                        <?php
                                        if (isset($errors) && in_array('status',$errors)){
                                            echo '<p style="color: red;">(*) Bạn chưa nhập trạng thái</p>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="white-box">
                                            <h3 class="box-title">Ảnh đại diện </h3>
                                            <input type="file" id="input-file-disable-remove" name="avatar" class="dropify" data-show-remove="true" multiple value="" />
                                            <?php
                                            if (isset($errors) && in_array('img_name',$errors)){
                                                echo '<p style="color: red;">(*) Bạn chưa chọn ảnh</p>';
                                            }

                                            if (isset($img_err) && in_array('type',$img_err)){
                                                echo '<p style="color: red;">(*) Bạn nhập sai định dạng ảnh</p>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="white-box">
                                            <h3 class="box-title">Ảnh sản phẩm </h3>
                                            <input type="file" id="input-file-disable-remove" name="image_pro[]" class="dropify" data-show-remove="true" multiple value="" />
                                            <?php
                                            if (isset($errors) && in_array('image_pro',$errors,true)){
                                                echo '<p style="color: red;">(*) Bạn chưa chọn</p>';
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
        </div>
        <?php include ('../../layout/footer.php');?>
    </div>
</div>
<?php include ('../../layout/script.php');?>



</body>
</html>
