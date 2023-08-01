<html>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<body>
    <table id="account">
    <tr>
    <th class='col_1'>Tên đăng nhập</th>
    <th class='col_2'>Mật khẩu</th>
    <th class='col_3'>Chức vụ</th>
    <?php
    echo '
        <th class="col_4"><a href="index.php?act=addtk"><img src="../image/addtk.png" ></a></th>'
    ?>
    </tr>
    
    <?php
     require_once 'connect.php';
        $result =mysqli_query($con,"SELECT * FROM taikhoan where Hienthi=1");
    while($row = mysqli_fetch_array($result)){?>
    <tr>
        <td class='col_1'><div class='col_1_tendangnhap'><?php echo $row['tendangnhap']?></div></td>
        <td class='col_2'><?php echo $row['matkhau']?></td>
        <?php 
        if($row['Id_role']=='RL100'){
            echo '<td class="col_3">Khách hàng </td>';
        } 
        else if($row['Id_role']=='RL101'){
            echo '<td class="col_3">Nhân viên</td>';
        } 
        else if($row['Id_role']=='RL102'){
            echo '<td class="col_3">Quản lý</td>';
        } 
        else{
            echo '<td class="col_3">Admin</td>';
        } 
        ?>
        <td class="col_4"><a href="index.php?act=uptk&id=<?php echo $row['Id_tk'];?>"><i class="fa-solid fa-pen-to-square"></i></a><i>/</i><a onclick="return confirm('Are you sure you want to delete this item?');" href="index.php?act=detk&id=<?php echo $row['Id_tk']?>&idrole=<?php echo $row['Id_role']?>" ><i class="fa-solid fa-trash-can"></i></a></td>
    </tr>
<?php }?>
</table>

    