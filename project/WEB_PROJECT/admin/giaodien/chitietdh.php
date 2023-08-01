<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
?>
<html>
<body>
    <table border ='1'>
    <tr>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Size</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
    </tr>
    <?php
    require_once 'connect.php';
    
        $result =mysqli_query($con,"SELECT * FROM chitietdonhang,donhang,sanpham,size 
        where sanpham.ID_sp=chitietdonhang.Id_sp 
        and donhang.Iddh=chitietdonhang.Iddh 
        and chitietdonhang.Iddh='$id'
        and chitietdonhang.Ma_size=size.Ma_size ");
    while($row = mysqli_fetch_array($result)){ ?>
    <tr>
        <td><?php echo $row['Iddh']; ?></td>
        <td><?php echo $row['Tensp']; ?></td>
        <td><?php echo '<img src="../image/'.$row['Img'].'"height="80px" width="100px">'?></td>
        <td><?php echo $row['Ten_size']; ?></td>
        <td><?php echo $row['Soluong']; ?></td>
        <td><?php echo $row['Dongia']; ?></td>
        <td><?php echo $row['Thanhtien']; ?></td>
    </tr>
    <?php } mysqli_close($con);?>
    </table>
    <a href="index.php?id=dm100&act=dm"><img src="../image/back.png"></a>
</body>
</html>

    