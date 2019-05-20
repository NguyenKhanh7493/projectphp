<?php
    session_start();
    include ('../../config/define.php');
    $title = 'Thêm sản phẩm';
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin-crm/form-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 09:39:47 GMT -->
<?php include ('../../layout/head.php');?>
<body class="fix-sidebar">
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
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chọn menu</label>
                                        <select class="form-control" data-placeholder="Choose a Category" name="cate_id" tabindex="1">
                                            <option value="">Nhập cate</option>
                                            <option value="1">dell</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chọn user</label>
                                        <select class="form-control" data-placeholder="Choose a Category" name="user_id" tabindex="1">
                                            <option value="">Nhập user</option>
                                            <option value="1">Khánh</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">status</label>
                                        <input type="text" class="form-control" name="status" placeholder="nhập status">
                                    </div>
                                    <div class="form-group">
                                        <div class="white-box">
                                            <h3 class="box-title">Ảnh đại diện </h3>
                                            <input type="file" id="input-file-disable-remove" name="avatar" class="dropify" data-show-remove="true" multiple value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="white-box">
                                            <h3 class="box-title">Ảnh sản phẩm </h3>
                                            <input type="file" id="input-file-disable-remove" name="avatar" class="dropify" data-show-remove="true" multiple value="" />
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

<?php
if (isset($_POST['add_pro'])){
    $name = $_POST['name'];
    $title = $_POST['title'];
    $intro = $_POST['introduction'];
    $content = $_POST['content'];
    $key = $_POST['keywords'];
    $des = $_POST['description'];
    $cate = $_POST['cate_id'];
    $user = $_POST['user_id'];
    $status = $_POST['status'];
}
?>
</html>
