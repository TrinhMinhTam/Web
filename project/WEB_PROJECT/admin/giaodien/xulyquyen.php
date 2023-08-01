<?php
    require_once 'connect.php';
    if(isset($_GET['id']) && isset($_GET['iddm'])){
        $id=$_GET['id'];
        $iddm=$_GET['iddm'];
    }
    if($id!='RL103'){
        $result=mysqli_query($con,"SELECT * FROM chitietquyen where Id_role='$id' and Id_danhmuc='$iddm'");
        $row=mysqli_fetch_array($result);
        
        if($row['tinhtrang']=='1'){
            $sql=mysqli_query($con,"UPDATE chitietquyen set tinhtrang='0' where Id_role='$id' and Id_danhmuc='$iddm'");
            //header("location:index.php?id=dm105&act=dm");
        }
        else{
            $sql=mysqli_query($con,"UPDATE chitietquyen set tinhtrang='1' where Id_role='$id' and Id_danhmuc='$iddm'");
            //header("location:index.php?id=dm105&act=dm");     
        }
    }
    else {
        echo '<script>alert("Không thể thay đổi quyền quản lý")</script>';
        
    }
?>
