<html>
<body>
    <table id='theloai'>
    <tr>
    <th class='col_1'>ID Thể loại</th>
    <th class='col_2'>Tên thể loại</th>
    <?php
    echo '
        <th><a class="col_3" href="index.php?act=adtl"><img src="../image/addsp.png" height="40px"></a></th>'
    ?>    
    </tr>
    <?php
    require_once 'connect.php';
    $result =mysqli_query($con,"SELECT * FROM theloai ");
    while($row = mysqli_fetch_array($result)){ ?>
    <tr>
        <td class='col_1'><?php echo $row['Idtheloai']; ?></td>
        <td class='col_2'><?php echo $row['Tentheloai']; ?></td>
        <?php
        if($row['Hienthi']==1) {
            echo '<td class="col_3"> <a href="index.php?act=xltl&id='.$row['Idtheloai'].'" class="hienthi">Hiển thị</a> </td>' ;
        }
        else{
            echo '<td class="col_3"> <a href="index.php?act=xltl&id='.$row['Idtheloai'].'" class="khonghienthi">Không hiển thị</a> </td>' ;
        } 
        ?>
    </tr>
    <?php } mysqli_close($con);?>
    </table>
</body>
</html>

    