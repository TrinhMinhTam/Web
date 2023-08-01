<?php
    require_once 'connect.php';
    if(isset($_GET['idht']) ){
        $id=$_GET['idht'];
        $idsz=$_GET['act'];
    }
?>
<?php
        echo "SELECT * FROM chitietsanpham where ID_sp='$id' and Ma_size='$idsz'";
        $result=mysqli_query($con,"SELECT * FROM chitietsanpham where ID_sp='$id' and Ma_size='$idsz'");
        $row=mysqli_fetch_array($result);
        
        if($row['Tinhtrang']=='1'){
            //echo "UPDATE chitietsanpham set Tinhtrang='0' where ID_sp='$id' and Ma_size='$idsz'";
            $sql=mysqli_query($con,"UPDATE chitietsanpham set Tinhtrang='0' where ID_sp='$id' and Ma_size='$idsz'");
            
            header("location:index.php?id=dm101&act=dm");
        }
        else if($row['Tinhtrang']=='0'){
            if($row['Soluong']>0){
            //echo "UPDATE chitietsanpham set Tinhtrang='1' where ID_sp='$id' and Ma_size='$idsz'";
            $sql=mysqli_query($con,"UPDATE chitietsanpham set Tinhtrang='1' where ID_sp='$id' and Ma_size='$idsz'");
            }
            else{
                
            }
            header("location:index.php?id=dm101&act=dm");
        }
?>
