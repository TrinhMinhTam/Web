<?php
    require_once 'connect.php'
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>
<?php
     if($_SESSION['role']=='RL102'||$_SESSION['role']=='RL103'){
        
        $result= mysqli_query($con,"SELECT * from thongtintaikhoan where Id_tk='$id'");
        $row= mysqli_fetch_array($result);

        if($row['Tinhtrang']==1)
        {
            $sql= "UPDATE thongtintaikhoan set Tinhtrang='0' where Id_tk='$id'";
            $qr=mysqli_query($con,$sql);
            header("location:index.php?id=dm107&act=dm");
        }
        else
        {
            $sql= "UPDATE thongtintaikhoan set Tinhtrang='1' where Id_tk='$id'";
            $qr=mysqli_query($con,$sql);
            header("location:index.php?id=dm107&act=dm");
        }
    }
    else{
        echo '<script>alert("Bạn không có quyền thay đổi")</script>';
    }
    
?>
