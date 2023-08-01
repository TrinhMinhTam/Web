

    
<?php
    require_once 'connect.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    
    $result_select = mysqli_query($con,"SELECT * FROM chitietdonhang WHERE Iddh='$id'");
    while($row_select = mysqli_fetch_array($result_select)){
        $id_sp=$row_select['Id_sp'];
        $size=$row_select['Ma_size'];
        $quantity=$row_select['Soluong'];
        $result_select_inventory = mysqli_query($con, "SELECT * FROM chitietsanpham WHERE Id_sp='$id_sp' and Ma_size='$size'");
        
        $row_select_inventory = mysqli_fetch_array($result_select_inventory);
        
        $quantity_inventory = $row_select_inventory['Soluong'];
        $quantity_after = $quantity_inventory + $quantity;
        
        if($quantity_after >=1){
            $hienthi = 1;
        }
        else{
            $hienthi=0;
        }      
        

        $result_delete_order = mysqli_query($con, "DELETE FROM chitietdonhang WHERE `Id_sp`='$id_sp' and `Ma_size`='$size' and `Iddh`='$id'");
        
    }
    
    $result=mysqli_query($con,"DELETE FROM donhang WHERE Iddh='$id'");
    
    mysqli_close($con);
    header("location: index.php?id=dm100&act=dm");
    
/*  
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

