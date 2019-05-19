<?php
    session_start();
    if(!isset($_SESSION['email']) || !isset($_SESSION['status'])){
        header('location:/admin/login.php');
    }

    include('config/define.php');
    include ('config/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin-crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 09:31:50 GMT -->
<?php include('layout/head.php');?>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    <!-- Top Navigation -->
    <?php include('layout/slidebar.php');?>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                    <h4 class="page-title">Chào mừng bạn đến với trang quản trị</h4>
                </div>
                <div class="col-lg-7 col-sm-6 col-md-6 col-xs-12">
<!--                    <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>-->
<!--                    <ol class="breadcrumb">-->
<!--                        <li><a href="#">Dashboard</a></li>-->
<!--                        <li class="active">CRM Dashboard</li>-->
<!--                    </ol>-->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="white-box">
                        <h3 class="box-title"> Trang quản trị </h3>
                        <!-- sample modal content -->
                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Điều khoản admin</h4>
                                        <p>Cái này của khánh</p>
                                        <p>Và Hiếu điên</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <!-- Button trigger modal -->
                        <img src="<?=base_url?>/admin/assets/image/anh.jpg" alt="default" data-toggle="modal" data-target="#myModal" class="model_img img-responsive"/> </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <?php include('layout/footer.php');?>
    </div>
    <!-- /#page-wrapper -->
</div>
<?php
    include('layout/script.php');
?>
</body>
<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin-crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 09:33:00 GMT -->
</html>
