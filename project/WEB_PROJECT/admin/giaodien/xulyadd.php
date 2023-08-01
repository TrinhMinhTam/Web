<?php
	require_once 'connect.php'
?> 
<?php
	if(isset($_POST['them'])){
		$ten=$_POST['Tensp'];
		$tl=$_POST['Id_theloai'];
		$gia=$_POST['Dongia'];
		$mota=$_POST['Mota'];
		$ngay=$_POST['Ngayphathanh'];
		$img=$_POST['Img'];

			$result=mysqli_query($con,"SELECT Max(ID_sp) FROM sanpham");
			$row=mysqli_fetch_array($result);
			$id=$row[0]+1;
			$sql1="INSERT INTO chitietsanpham(ID_sp,Ma_size) values ('$id','SZ100')";
			$sql2="INSERT INTO chitietsanpham(ID_sp,Ma_size) values ('$id','SZ101')";
			$sql3="INSERT INTO chitietsanpham(ID_sp,Ma_size) values ('$id','SZ102')";
			$sql4="INSERT INTO chitietsanpham(ID_sp,Ma_size) values ('$id','SZ103')";
			$sql5="INSERT INTO chitietsanpham(ID_sp,Ma_size) values ('$id','SZ104')";
			$sql6="INSERT INTO chitietsanpham(ID_sp,Ma_size) values ('$id','SZ105')";
			$sql= "INSERT INTO sanpham (ID_sp,Tensp,Id_theloai,Dongia,Mota,Ngayphathanh,Img,Hienthi) values ('$id','$ten','$tl','$gia','$mota','$ngay','$img','1')";
			$qr=mysqli_query($con,$sql);
			$qr=mysqli_query($con,$sql1);
			$qr=mysqli_query($con,$sql2);
			$qr=mysqli_query($con,$sql3);
			$qr=mysqli_query($con,$sql4);
			$qr=mysqli_query($con,$sql5);
			$qr=mysqli_query($con,$sql6);
			
		header("location:index.php?id=dm104&act=dm");
	}
?>

<form action="" method="POST" id='form_add_sp'>
    <p class='p_1'>Thêm sản phẩm</p>
	Tên sản Phẩm  : <input type="text" name="Tensp"/><br></br>
	Thể loại :
    <select name="Id_theloai">
            <?php 
            require_once 'connect.php';
            $re=mysqli_query($con,"SELECT * FROM theloai");
            while($row1 = mysqli_fetch_array($re)){
                echo '<option value="'.$row1['Idtheloai'].'">'.$row1['Tentheloai'].'</option>';
            }?>
    </select> <br></br>
	Đơn giá       : <input type="text" name="Dongia"/><br></br>
	Mô tả         : <input type="text" name="Mota"/><br></br>
	Ngày phát hành: <input type="date" name="Ngayphathanh"/><br></br>
	Hình ảnh      : <input type="file" name="Img"/><br></br>
	<input type="submit" name="them" value="Thêm" class='add_sp_btn' >
</form>	