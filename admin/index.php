<?php
    session_start();
    if(!isset($_SESSION['email']) || !isset($_SESSION['status'])){
        header('location:/admin/login.php');
    }
?>
<?php
    echo $_SESSION['email'];
    echo $_SESSION['password'];
    echo $_SESSION['status'];
    echo $_SESSION['fullname'];
?>
<a href="/admin/logout.php">đăng xuất</a>