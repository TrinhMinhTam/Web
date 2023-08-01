<?php
	require_once 'connect.php'
?> 
<?php
	if(isset($_POST['Themthongtin'])){
		$ten=$_POST['Hoten'];
		$ngay=$_POST['Ngaydangky'];
        $diachi=$_POST['Diachi'];
        $email=$_POST['Email'];
        $sdt=$_POST['Dienthoai'];

		$result1= mysqli_query($con,"SELECT Max(Id_tk) FROM thongtintaikhoan");
    	$row1=mysqli_fetch_array($result1);
        $a=explode("TK",$row1[0]);
    	$a[1]=$a[1]+1;
        echo "TK".$a[1];  

		$sql= "INSERT INTO thongtintaikhoan (Id_tk,Hoten,Ngaydangky,Diachi,Email,Dienthoai,Tinhtrang) 
        values ('".TK."$a[1]','$ten','$ngay','$diachi','$email','$sdt',1)";
		$qr=mysqli_query($con,$sql);
		header("location:index.php");
	}
?>
<form action="" method="POST">
	Họ tên   		: <input type="text" name="Hoten"/><br></br>
	Ngày Đăng ký    : <input type="date" name="Ngaydangky"><br></br>
	Địa chỉ    		: <input type="text" name="Diachi"/><br></br>
	Email 			: <input type="text" name="Email"/><br></br>
    Số điện thoại   : <input type="text" name="Dienthoai"/><br></br>
    <input type="submit" name="Themthongtin" value="Thêm">
    
</form>	