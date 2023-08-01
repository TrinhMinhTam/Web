<?php
    require_once 'connect.php';
    if(isset($_POST['themtl'])){
        $ten=$_POST['Tentheloai'];

    $reslut1=mysqli_query($con,"SELECT Max(Idtheloai) FROM theloai");
    $row=mysqli_fetch_array($reslut1);
    $a=explode("TL00",$row[0]);
    $a[1]=$a[1]+1;
    $tk="TL00";
    $sql="INSERT INTO theloai (Idtheloai,Tentheloai,Hienthi) values ('$tk$a[1]','$ten','1')";
    $reslut=mysqli_query($con,$sql);
    header("location:index.php?id=dm102&act=dm");
} 
?>
<form action="" method="POST" id='form_add_tl'>
    Tên thể loại: <input type="text" name="Tentheloai">
    <input type="submit" name="themtl" value="Thêm" id='add_theloai_btn'>
</form>