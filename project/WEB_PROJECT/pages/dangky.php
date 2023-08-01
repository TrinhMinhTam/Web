<!DOCTYPE html> 
<html>
        <meta charset="UTF-8">
        <title> JEWELRY STORE</title>
        <link href='../css/css.css' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/8f58aae133.js" crossorigin="anonymous"></script>
        
    <body>
<div id="form">
<form action="" method="POST" id="login-form">
    <div id="form-dang-nhap">
    <p class="login">ĐĂNG KÝ</p>
    <div class="tendangnhap">
	    <input type="text" id="tendangnhap" name="tendangnhap" placeholder="Tên tài khoản" require>
    </div>
    <div class="password">
        <input type="password" id="password" name="matkhau" placeholder="Mật khẩu" require>
    </div>
    <span id="check-login"></span>
	<input type="submit" value="Đăng ký" name="dk">
    <div class="register"><p>Bạn đã có tài khoản <a href="login.php">ĐĂNG NHẬP</a></div>

</form>
</div>
</html>
<?php
    require_once 'connect.php';
    if(isset($_POST['dk'])){
        $username=$_POST['tendangnhap'];
        $pass=$_POST['matkhau'];
        $result1= mysqli_query($con," SELECT Max(Id_tk) FROM taikhoan");
        $result2= mysqli_query($con," SELECT Max(Id_tk) FROM thongtintaikhoan");
        $row1=mysqli_fetch_array($result1);
        $a=explode("TK",$row1[0]);
        $a[1]=$a[1]+1;

        $kt="TK";
        $sql= "INSERT INTO taikhoan (Id_tk,tendangnhap,matkhau,Id_role) values ('$kt$a[1]','$username','$pass','RL100')";
        $sql1= "INSERT INTO thongtintaikhoan(Id_tk,Hoten,Ngaydangky,Diachi,Email,Dienthoai,Tinhtrang) values ('$kt$a[1]','','','','','',1)";
        $qr=mysqli_query($con,$sql);
        $qr2=mysqli_query($con,$sql1);
        header("location:test.php");
    }
?>
