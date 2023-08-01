    <?php
        require_once 'connect.php'
    ?>
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];  
        }

    ?>
    <?php
        $result= mysqli_query($con,"SELECT * from sanpham where Id_sp='$id'");
        $row= mysqli_fetch_array($result);  
    ?>
    <?php
        if(isset($_POST['update'])){
            $ten=$_POST['Tensp'];
		    $tl=$_POST['Id_theloai'];
		    $gia=$_POST['Dongia'];
		    $mota=$_POST['Mota'];
		    $ngay=$_POST['Ngayphathanh'];
            $img=$_POST['Img'];


            $sql= "UPDATE   sanpham set Tensp ='$ten', Id_theloai='$tl', Dongia='$gia', Mota='$mota', Ngayphathanh='$ngay', Img='$img'
            where ID_sp=$id";
            $qr=mysqli_query($con,$sql);
            header("location:index.php?id=dm104&act=dm");
    }
    ?>
    <form action="" method="POST" id='form_upd_sp'>
        <p class='p_1'>Sửa sản phẩm</p>
        Tên sản Phẩm  : <input type="text" name="Tensp" value="<?php echo $row['Tensp']?>"/><br></br>
        Id thể loại   : <input type="text" name="Id_theloai" value="<?php echo $row['Id_theloai']?>"/><br></br>
        Đơn giá       : <input type="text" name="Dongia" value="<?php echo $row['Dongia']?>"/><br></br>
        Mô tả         : <input type="text" name="Mota" value="<?php echo $row['Mota']?>"/><br></br>
        Ngày phát hành: <input type="date" name="Ngayphathanh" value="<?php echo $row['Ngayphathanh']?>"/><br></br>
        Hình ảnh      : <input type="file" name="Img" value="<?php echo $row['Img']?>"/><br></br>
        <input type="submit" name="update" value="Update" class='update_sp_btn'>
    </form>