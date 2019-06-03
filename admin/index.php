<?php
    session_start();
    $_SESSION['language'] = 'vi';
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
            <!--breadcrumb-->
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
            <!--end breadcrumb-->

            <!--container-->
            <?php controller();?>
            <!--end container-->
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
