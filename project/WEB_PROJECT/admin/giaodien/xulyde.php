<?php
    require_once 'connect.php';
    if(isset($_GET['id'])){
        $id=$_GET['id']; 
    }
    $result=mysqli_query($con,"SELECT * FROM sanpham where ID_sp='$id'");
    $row=mysqli_fetch_array($result);
    if($row['Hienthi']==1){
        $re=mysqli_query($con,"UPDATE sanpham set Hienthi=0 where ID_sp='$id'");
        //echo "abc";
        header("location:index.php?id=dm104&act=dm");
        
    }
    else{
        $re=mysqli_query($con,"UPDATE sanpham set Hienthi=1 where ID_sp='$id'");
        //echo "acc";
        header("location:index.php?id=dm104&act=dm");
    }
    mysqli_close($con);
?>