<?php
    require_once 'connect.php';
    if(isset($_GET['idt'])){
        $id=$_GET['idt'];
        $idsz=$_GET['act'];


        $result=mysqli_query($con,"SELECT * FROM chitietsanpham where ID_sp='$id' and Ma_size='$idsz'");
        $row=mysqli_fetch_array($result);
        $sl=$row['Soluong'];
        $sl++;
        $sql=mysqli_query($con,"UPDATE chitietsanpham set Soluong='$sl' where ID_sp='$id' and Ma_size='$idsz'");
        header("location:index.php?id=dm101&act=dm");
        
        
    }
   else if (isset($_GET['idg'])){
        $id=$_GET['idg'];
        $idsz=$_GET['act'];
        $result=mysqli_query($con,"SELECT * FROM chitietsanpham where ID_sp='$id' and Ma_size='$idsz'");
        $row=mysqli_fetch_array($result);
        if($row['Soluong'] <= 0){
            if($row['Tinhtrang']==1){
                $sl=$row['Soluong'];
                $sl--;
                $sql=mysqli_query($con,"UPDATE chitietsanpham set Tinhtrang='0' Soluong='$sl' where ID_sp='$id' and Ma_size='$idsz'");
                header("location:index.php?id=dm101&act=dm");
            }
            else{
                $sl=$row['Soluong'];
                $sl--;
                $sql=mysqli_query($con,"UPDATE chitietsanpham set Soluong='$sl' where ID_sp='$id' and Ma_size='$idsz'");
                header("location:index.php?id=dm101&act=dm");
            }
        }
        else{
            $sl=$row['Soluong'];
            $sl--;
            $sql=mysqli_query($con,"UPDATE chitietsanpham set Soluong='$sl' where ID_sp='$id' and Ma_size='$idsz'");
            header("location:index.php?id=dm101&act=dm");
        }
    }
    else {
        echo "";
    }
        
?>
