<html>
<body>
    <table id="role">
    <tr>
    <th class="col_1"></th>
    <th class="col_2">Chi tiết đơn hàng</th>
    <th class="col_2">Chi tiết sản phẩm</th>
    <th class="col_2">Danh mục</th>
    <th class="col_2">Roles</th>
    <th class="col_2">Sản phẩm</th>
    <th class="col_2">Tài khoản</th>
    <th class="col_2">Thông tin tài khoản</th>
    <th class="col_2">Thống kê</th>
</tr>

<?php
    $count=1;
    require_once 'connect.php';
        $result =mysqli_query($con,"SELECT * FROM roles,chitietquyen,danhmuc where roles.Id_role=chitietquyen.Id_role and danhmuc.Id_danhmuc=chitietquyen.Id_danhmuc");
            while($row=mysqli_fetch_array($result)){
                if($row['Id_danhmuc']=='DM100'){
                    if($count==1){
                        echo '<tr><td class="col_1">Khách hàng</td>';
                    }
                    else if($count==2){
                        echo '<tr><td class="col_1">Nhân viên</td>';
                    }
                    if($count==3){
                        echo '<tr><td class="col_1">Quản lý</td>';
                    }
                    if($count==4){
                        echo '<tr><td class="col_1">Admin</td>';
                    }
                    
                }
                    if($row['tinhtrang']=='1'){ 
                        echo '<td class="col_2"><a href="index.php?act=upquyen&id='.$row['Id_role'].'&iddm='.$row['Id_danhmuc'].'"><img src="../image/check.png" text-align="center"></a></td>';
                        if($row['Id_danhmuc']=='DM107'){
                        echo '</tr>';
                        $count++;
                        } 
                }
                    else {
                        echo '<td class="col_2"><a href="index.php?act=upquyen&id='.$row['Id_role'].'&iddm='.$row['Id_danhmuc'].'"><img src="../image/uncheck.png" text-align="right"></a></td>';
                        if($row['Id_danhmuc']=='DM107'){
                        echo '</tr>';
                        $count++;
                        }
             
                }
        }
?>
</table>

    