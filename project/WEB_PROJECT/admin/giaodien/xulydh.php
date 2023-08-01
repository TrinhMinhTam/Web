<?php
    require_once 'connect.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    if($_SESSION['role']!='RL100'){
        $result = mysqli_query($con,"SELECT * FROM donhang");
        
        while($row=mysqli_fetch_array($result)){
                if($row['Id_trangthai']=='STA10' && $row['Iddh']==$id){
                    $sql=mysqli_query($con,"UPDATE donhang set Id_trangthai= 'STA11',Id_nv ='".$_SESSION['tk']."', Thoidiemgiaohang = '".date('Y-m-d')."' where Iddh= '$id'");
//                    $sql=mysqli_query($con,"SELECT * FROM chitietdonhang,chitietsanpham WHERE chitietdonhang.Id_sp = chitietsanpham.ID_sp 
//                    AND chitietdonhang.Ma_size = chitietsanpham.Ma_size
//                    AND chitietdonhang.Iddh = '".$id."'");
//                    while($row=mysqli_fetch_row($sql)){
//                        mysqli_query($con,"UPDATE chitietsanpham SET Soluong = '".$row[8]-$row[3]."' WHERE ID_sp = '".$row[1]."' AND Ma_size = '".$row[2]."'");
//                    }
//                    
                    
                    header("location:index.php?id=dm100&act=dm");
                    mysqli_close($con);
                }
                if($row['Id_trangthai']=='STA11' && $row['Iddh']==$id){
                    $sql=mysqli_query($con,"UPDATE donhang set Id_trangthai= 'STA12',Id_nv ='".$_SESSION['tk']."', Thoidiemgiaohang = '".date('Y-m-d')."' where Iddh= '$id'");
//                    $sql=mysqli_query($con,"SELECT * FROM chitietdonhang,chitietsanpham WHERE chitietdonhang.Id_sp = chitietsanpham.ID_sp 
//                    AND chitietdonhang.Ma_size = chitietsanpham.Ma_size
//                    AND chitietdonhang.Iddh = '".$id."'");
//                    while($row=mysqli_fetch_row($sql)){
//                        mysqli_query($con,"UPDATE chitietsanpham SET Soluong = '".$row[8]-$row[3]."' WHERE ID_sp = '".$row[1]."' AND Ma_size = '".$row[2]."'");
//                    }
                    
                    
                    header("location:index.php?id=dm100&act=dm");
                    mysqli_close($con);
                }
        }
    }    
?>
