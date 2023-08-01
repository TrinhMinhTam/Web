<html>
<body>
    <table id='account_info'>
    <tr>
    <th class="ac_col_1">Tên đăng nhập</th>
    <th class="ac_col_2">Mật khẩu</th>
    <th class="ac_col_3">Họ tên</th>
    <th class="ac_col_4">Ngày Đăng ký</th>
    <th class="ac_col_5">Địa chỉ</th>
    <th class="ac_col_6">Email</th>
    <th class="ac_col_7">Số điện thoại</th>
    <th class="ac_col_8">Sửa thông tin</th>
    <th class="ac_col_9">Trình trạng</th>
    
    </tr>
    <?php
    require_once 'connect.php';
    if(isset($_SESSION['role'])){
        $role=$_SESSION['role'];
    }
    if(isset($_SESSION['tk'])){
        $tk=$_SESSION['tk'];
    }
    //$result =mysqli_query($con,"SELECT * FROM thongtintaikhoan");
    if($role=='RL102'||$role=='RL103'){
        $result =mysqli_query($con,"SELECT * FROM thongtintaikhoan,tinhtrang,taikhoan   
        where thongtintaikhoan.Id_tk=taikhoan.Id_tk and thongtintaikhoan.Tinhtrang=tinhtrang.Tinhtrang ");
    }
    else {
        $result =mysqli_query($con,"SELECT * FROM thongtintaikhoan,tinhtrang,taikhoan   
        where thongtintaikhoan.Id_tk=taikhoan.Id_tk and thongtintaikhoan.Tinhtrang=tinhtrang.Tinhtrang and thongtintaikhoan.Id_tk='$tk' ");
    }

    while($row = mysqli_fetch_array($result)){?>
    <tr>
        <td class="ac_col_1"><div><?php echo $row['tendangnhap']; ?></div></td>
        <td class="ac_col_2"><div><?php echo $row['matkhau']; ?></div></td>
        <td class="ac_col_3"><?php echo $row['Hoten']; ?></td>
        <td class="ac_col_4"><?php echo $row['Ngaydangky']; ?></td>
        <td class="ac_col_5"><?php echo $row['Diachi']; ?></td>
        <td class="ac_col_6"><?php echo $row['Email']; ?></td>
        <td class="ac_col_7"><?php echo $row['Dienthoai']; ?></td>
        <td class="ac_col_8"><a href="index.php?act=upkh&id=<?php echo $row['Id_tk']?>"><i class="fa-solid fa-user-pen"></i></a></td>
        <?php 
        if($role=='RL100'){
            if($row['Tinhtrang']=='1'){
                echo '<td class="ac_col_9"><i class="fa-solid fa-circle-check"></i></td>';
            }
            else {
                echo '<td class="ac_col_9"><i class="fa-solid fa-circle-xmark"></i></td>';
            }
        }
        else {
            if($row['Tinhtrang']=='1'){
                echo '<td class="ac_col_9"><a href="index.php?act=upttkh&id='.$row['Id_tk'].'"><i class="fa-solid fa-circle-check"></i></a></td>';
            }
            else {
                echo '<td class="ac_col_9"><a href="index.php?act=upttkh&id='.$row['Id_tk'].'"><i class="fa-solid fa-circle-xmark"></i></a></td>';
            }
        } ?>
    </tr>
    <?php } mysqli_close($con);?>
    </table>
</body>
</html>
