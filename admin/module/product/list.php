<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['status'])){
    header('location:/admin/login.php');
}
include ('../../config/database.php');
include ('../../config/function.php');
include ('../../config/define.php');
?>

<!DOCTYPE html>  
<html lang="en">
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
          <h4 class="page-title">Data Table</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
<!--            <li><a href="#">Dashboard</a></li>-->
<!--            <li><a href="#">Table</a></li>-->
<!--            <li class="active">Data Table</li>-->
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="white-box">
            <h3 class="box-title m-b-0">Danh sách sản phẩm</h3>
            <p class="text-muted m-b-30"></p>
            <div class="table-responsive">
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>tên</th>
                  <th>menu</th>
                  <th>user</th>
                  <th>avatar</th>
                  <th>tùy chọn</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>
                    <img src="<?=base_url?>/admin/public/images/product/avatar/anh-chibi-dep-va-de-thuong-nhat_120351929.jpg" width="80px;" height="80px;" alt="">
                  </td>
                  <td>
                    <a href="" id="editItem"><i class="ti-pencil text-success"></i></a> |
                    <a href="" class="proDelItem" data-msg="Bạn muốn xóa?"><i class="ti-trash text-danger"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
      <?php include ('../../layout/footer.php');?>
  </div>
  <!-- /#page-wrapper -->
</div>
<?php include ('../../layout/script.php');?>
</body>

<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin-crm/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 09:40:39 GMT -->
</html>
