<?php
session_start();
if(isset($_SESSION) && @$_SESSION['email'] != '' && @$_SESSION['password'] != '' && @$_SESSION['status'] == 1){
    header("location:/admin/index.php");
}
    include('config/database.php');
    include('config/define.php');
    include('config/function.php');
?>

<!DOCTYPE html>  
<html lang="en">

<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin-crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 09:34:34 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>Chào mừng bạn đến với trang đăng nhập</title>
<link href="<?=base_url?>/admin/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url?>/admin/assets/css/animate.css" rel="stylesheet">
<link href="<?=base_url?>/admin/assets/css/style.css" rel="stylesheet">
<link href="<?=base_url?>/admin/assets/css/colors/gray-dark.css" id="theme"  rel="stylesheet">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-19175540-9', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box">
    <div class="white-box">
      <form class="form-horizontal form-material" action="" method="POST">
        <h3 class="box-title m-b-20">Đăng Nhập</h3>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" name="email" placeholder="Nhập email" value="<?= @$_POST['email']?>">
          </div>
          
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" name="pass" placeholder="Nhập mật khẩu">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <!-- <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Remember me </label> -->
            </div>
            <!-- <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>  -->
            </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="ok">Đăng nhập</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<?php
    if(isset($_POST["ok"])){
        $errors = array();
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        // Xử lý để tránh MySQL injection
        $email = stripslashes($email);
        $pass = stripslashes($pass);
        $email = mysqli_real_escape_string($db,$email);
        $pass = mysqli_real_escape_string($db,$pass);
        if(empty($email)){
            $errors = 'email';
        }elseif(empty($pass)){
            $errors = 'pass';
        }else{
            $sql = "SELECT * FROM users WHERE email='".$email."' and password='".MD5($pass)."'";
            $result = mysqli_query($db,$sql);
            $data = returnRow($result);
            if($data == NULL || $data == false){
                echo "sai mật khẩu hoặc email";
            }else{
                $_SESSION['email'] = $data['email'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['status'] = $data['status'];
                $_SESSION['fullname'] = $data['fullname'];
                header('location:/admin/index.php');
            }
        }
    }
?>
<!-- jQuery -->
<script src="<?=base_url?>/admin/assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url?>/admin/assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?=base_url?>/admin/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="<?=base_url?>/admin/assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?=base_url?>/admin/assets/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?=base_url?>/admin/assets/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?=base_url?>/admin/assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
