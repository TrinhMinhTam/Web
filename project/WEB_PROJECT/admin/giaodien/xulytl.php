<?php
    require_once 'connect.php';
    if(isset($_GET['id'])){
        $id=$_GET['id']; 
    }
    $result=mysqli_query($con,"SELECT * FROM theloai where Idtheloai='$id'");
    $row=mysqli_fetch_array($result);
    if($row['Hienthi']==1){
        $re=mysqli_query($con,"UPDATE theloai set Hienthi=0 where Idtheloai='$id'");
        //echo "abc";
        header("location:index.php?id=dm102&act=dm");
        
    }
    else{
        $re=mysqli_query($con,"UPDATE theloai set Hienthi=1 where Idtheloai='$id'");
        //echo "acc";
        header("location:index.php?id=dm102&act=dm");
    }
    mysqli_close($con);
?>