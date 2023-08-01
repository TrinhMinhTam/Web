<?php
	require_once 'connect.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
		
    } 
?> 
<?php
	$result= mysqli_query($con,"SELECT * from taikhoan where Id_tk='$id'");
	$row= mysqli_fetch_array($result); 
?>
<?php		
	if(isset($_POST['uptttk'])){
		$username=$_POST['tendangnhap'];
        $pass=$_POST['matkhau'];
        $role=$_POST['Id_role'];
		
		$sql = "UPDATE  taikhoan set tendangnhap='$username', matkhau='$pass',Id_role='$role' where Id_tk='$id'";
		$qr=mysqli_query($con,$sql);
		//header("location:index.php?id=dm108&act=dm");
	}
?>
<form action="" method="POST">
	Tên đăng nhập         : <input type="text" name="tendangnhap" value="<?php echo $row['tendangnhap']?>"/><br></br>
	Mật khẩu              : <input type="text" name="matkhau" value="<?php echo $row['matkhau']?>"/><br></br>
	Chức vụ               : 
	<select name="Id_role">
            <option value=""></option>
            <option  value="RL100">Khách hàng</option>
            <option  value="RL101">Nhân Viên</option>
            <option  value="RL102">Quản lý</option>
			<option  value="RL103">Admin</option>
    </select> </td>
	<input type="submit" name="uptttk" value="Sửa">
</form>