<?php
	require_once 'connect.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    } 
?> 
<?php
	$result= mysqli_query($con,"SELECT * from thongtintaikhoan where Id_tk='$id'");
	$row= mysqli_fetch_array($result); 
?>
<?php		
	if(isset($_POST['uptt'])){
		$ten=$_POST['Hoten'];
        $ngay=$_POST['Ngaydangky'];
        $diachi=$_POST['Diachi'];
        $email=$_POST['Email'];
        $sdt=$_POST['Dienthoai'];

		$sql = " UPDATE  thongtintaikhoan set Hoten='$ten', Ngaydangky='$ngay', Diachi='$diachi', Email='$email',
		Dienthoai='$sdt' where Id_tk='$id'";
		$qr=mysqli_query($con,$sql);
		header("location:index.php?id=dm107&act=dm");
	}
?>
<form action="" method="POST">
	Họ tên         : <input type="text" name="Hoten" value="<?php echo $row['Hoten']?>"/><br></br>
	Ngày đăng ký   : <input type="date" name="Ngaydangky" value="<?php echo $row['Ngaydangky']?>"/><br></br>
	Địa chỉ        : <input type="text" name="Diachi" value="<?php echo $row['Diachi']?>"/><br></br>
	Email          : <input type="text" name="Email" value="<?php echo $row['Email']?>"/><br></br>
	Số điện thoại  : <input type="text" name="Dienthoai" value="<?php echo $row['Dienthoai']?>"/><br></br>
	<input type="submit" name="uptt" value="Sửa">
</form>