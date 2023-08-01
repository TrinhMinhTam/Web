<?php
    require_once 'connect.php';
?>
<?php
	if (isset($_GET['id'])&&isset($_GET['idrole']))
    {
        $idrole=$_GET['idrole'];
    }
    if($idrole!='RL102'){
        $result=mysqli_query($con,"SELECT * FROM taikhoan where Id_tk='".$_GET['id']."' and Id_role='$idrole'");
        $row=mysqli_fetch_array($result);
        if($row['Hienthi']==1){
            $re=mysqli_query($con,"UPDATE taikhoan set Hienthi=0 where Id_tk='".$_GET['id']."' and Id_role='$idrole'");
            //echo "abc";
            header("location:index.php?id=dm105&act=dm");
        }
        else{
            $re=mysqli_query($con,"UPDATE theloai set Hienthi=1 where Id_tk='".$_GET['id']."' and Id_role='$idrole'");
            //echo "acc";
            header("location:index.php?id=dm105&act=dm");
        }
        mysqli_close($con);
    }
    else{
        echo '<script>alert("Không thể xóa tài khoản quản lý")</script>';
    }