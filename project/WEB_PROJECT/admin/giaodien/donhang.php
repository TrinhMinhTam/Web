<html>
<body>
    <table id='donhang'>
    <tr>
    <th class='col_1'>STT</th>
    <th class='col_2'>Tên khách hàng</th>
    <th class='col_3'>Tên nhân viên</th>
    <th class='col_4'>Tên người nhận</th>
    <th class='col_5'>Địa chỉ</th>
    <th class='col_6'>Ghi chú</th>
    <th class='col_7'>Ngày đặt hàng</th>
    <th class='col_8'>Ngày giao hàng</th>
    <th class='col_9'>Tổng tiền</th>
    <th class='col_10'>Trạng thái</th>   
    <th class='col_11'>CTĐH</th>
    <th class='col_12'>Xoá</th>
    </tr>
    <?php
    require_once 'connect.php';
    $count=1;
    if(isset($_SESSION['role'])){
        $role=$_SESSION['role'];
    }
    if(isset($_SESSION['tk'])){
        $tk=$_SESSION['tk'];
    }
    if($role=='RL100'){
        $result =mysqli_query($con,"SELECT * from thongtintaikhoan,donhang,trangthai where thongtintaikhoan.Id_tk=donhang.Id_kh and Id_kh='$tk'and trangthai.Id_trangthai=donhang.Id_trangthai");
    }
    else{
            $result=mysqli_query($con,"SELECT * from thongtintaikhoan,donhang,trangthai where thongtintaikhoan.Id_tk=donhang.Id_kh and trangthai.Id_trangthai=donhang.Id_trangthai and donhang.Id_kh=thongtintaikhoan.Id_tk");
    }
    while($row = mysqli_fetch_array($result)){ 
        $reuslt_2=mysqli_query($con,"SELECT * from thongtintaikhoan WHERE Id_tk = '".$row['Id_nv']."'");
        $row2 = mysqli_fetch_array($reuslt_2);  
        ?>
    <tr>    
        <td class='col_1'><?php echo $count++ ?></td>
        <td class='col_2'><?php echo $row['Hoten']; ?></td>
        <td class='col_3'><?php echo isset($row2['Hoten']) ? $row2['Hoten'] : ''; ?></td>
        <td class='col_4'><?php echo $row['Tennguoinhan']; ?></td>
        <td class='col_5'><?php echo $row['Diachi']; ?></td>
        <td class='col_6'><?php echo $row['Ghichu']; ?></td>
        <td class='col_7'><?php echo $row['Thoidiemdathang']; ?></td>
        <td class='col_8'><?php echo $row['Thoidiemgiaohang']; ?></td>
        <td class='col_9'><?php echo number_format($row['Tongtien'],0,',','.')." đ"; ?></td>
        <?php
            if($role=='RL100'){
                echo '<td class="col_10">'.$row['Tentrangthai'].'</td>';
            }
            else{
                if($row['Id_trangthai']=='STA10'){
                    echo '<td class="col_10"><a href="index.php?act=xldh&id='.$row['Iddh'].'" class="chuaxuly">'.$row['Tentrangthai'].'</a></td>';
                }
                else if($row['Id_trangthai']=='STA11'){
                    echo '<td class="col_10"><a href="index.php?act=xldh&id='.$row['Iddh'].'" class="dangxuly">'.$row['Tentrangthai'].'</a></td>';
                }
                else{
                    echo '<td class="col_10"><a class="daxuly">'.$row['Tentrangthai'].'</a></td>';
                }
            }
        ?>
        <td class='col_11'><a href="index.php?act=ctdh&id=<?php echo $row['Iddh']?>"><img src="../image/xem.png" ></a></td>
        <?php 
            if($role=='RL100'){
            
                    echo '<td class="col_12"><a href=""><button class="delete_btn_enable" id='.$row['Iddh'].'>X</button></a></td>';
                
            }
            else{
                if($row['Id_trangthai']=='STA10'){
                    echo '<td class="col_12"><a onclick ="return confirm('."'Confirm: Delete this record ?'".')" href="index.php?act=deletedh&id='.$row['Iddh'].'"><button class="delete_btn" id='.$row['Iddh'].'>X</button></a></td>';
                }
                else if($row['Id_trangthai']=='STA11'){
                    echo '<td class="col_12"><a onclick ="return confirm('."'Confirm: Delete this record ?'".')" href="index.php?act=deletedh&id='.$row['Iddh'].'"><button class="delete_btn" id='.$row['Iddh'].'>X</button></a></td>';
                }
                else{
                    echo '<td class="col_12"><a href=""><button class="delete_btn_enable" id='.$row['Iddh'].'>X</button></a></td>';
                }
            }
        ?>
    </tr>
    <?php }
        mysqli_close($con);
        if (!function_exists('currency_format')) {
                function currency_format($number, $suffix = 'đ') {
                    if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }   
        ?>
    </table>
    <div></div>
</body>
</html>