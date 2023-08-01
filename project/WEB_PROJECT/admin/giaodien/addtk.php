<?php
	require_once 'connect.php'
?> 
<?php
	if(isset($_POST['themtk'])){
		$username=$_POST['tendangnhap'];
		$pass=$_POST['matkhau'];
		$Id_role=$_POST['Id_role'];
	
		$result1= mysqli_query($con," SELECT Max(Id_tk) FROM taikhoan");
        $result2= mysqli_query($con," SELECT Max(Id_tk) FROM thongtintaikhoan");
    	$row1=mysqli_fetch_array($result1);
        $a=explode("TK",$row1[0]);
    	$a[1]=$a[1]+1;

        $kt="TK";
        $sql= "INSERT INTO taikhoan (Id_tk,tendangnhap,matkhau,Id_role,Hienthi) values ('$kt$a[1]','$username','$pass','$Id_role','1')";
		$sql1= "INSERT INTO thongtintaikhoan(Id_tk,Hoten,Ngaydangky,Diachi,Email,Dienthoai,Tinhtrang) values ('$kt$a[1]','','','','','',1)";
		$qr=mysqli_query($con,$sql);
        $qr2=mysqli_query($con,$sql1);
		header("location:index.php?id=dm105&act=dm");
	}
?>

<form action="" method="POST">
	Tên đăng nhập         : <input type="text" name="tendangnhap"/><br></br>
	Mật khẩu                : <input type="password" name="matkhau"/><br></br>
	Chức vụ                 : 
    <select name="Id_role">
            <option value=""></option>
            <option  value="RL100">Khách hàng</option>
            <option  value="RL101">Nhân Viên</option>
            <option  value="RL102">Quản lý</option>
			<option  value="RL103">Admin</option>
    </select> </td>
	
	<input type="submit" name="themtk" value="Thêm">
</form>	
