<html>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<body>
    <table id="sanpham">
    <tr>
    <th class="col_1">Tên sản phẩm</th>
    <th class="col_2">Thể loại</th>
    <th class="col_3">Đơn giá</th>
    <th class="col_4">Mô tả</th>
    <th class="col_5">Ngày phát hành</th>
    <th class="col_6">Hình ảnh</th>
    <?php
    echo '
        <th class="col_7"><a href="index.php?act=ad"><img src="../image/addsp.png" width="60px"</a></th>'
    ?>    
    </tr>
    <?php
    require_once 'connect.php';
    $result =mysqli_query($con,"SELECT * FROM sanpham,theloai where sanpham.Id_theloai=theloai.Idtheloai and sanpham.Hienthi='1'");
    while($row = mysqli_fetch_array($result)){ ?>
    <tr>
        <td class="col_1"><div class='tensanpham'><?php echo $row['Tensp']; ?></div></td>
        <td class="col_2"><?php echo $row['Tentheloai']; ?></td>
        <td class="col_3"><?php echo number_format($row['Dongia'],0,',','.')." đ"; ?></td>
        <td class="col_4"><?php echo $row['Mota']; ?></td>
        <td class="col_5"><?php echo $row['Ngayphathanh']; ?></td>
        <td class="col_6"><img src="../image/<?php echo $row['Img']; ?>" style='height:80px;width:100px'></td>
        <td class="col_7"><a href="index.php?act=up&id=<?php echo $row['ID_sp'];?>"><i class="fa-solid fa-pen-to-square"></i></a><i>/</i><a onclick="return confirm('Are you sure you want to delete this item?');" href="index.php?act=de&id=<?php echo $row['ID_sp'];?>"><i class="fa-solid fa-trash-can"></i></a></td>
    </tr>
    <?php } mysqli_close($con);?>
    </table>
</body>
</html>

    