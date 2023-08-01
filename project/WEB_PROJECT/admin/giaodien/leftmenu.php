<div id="leftmenu">
<?php  
    require_once 'connect.php';
    if(isset($_SESSION['tendangnhap']) && isset($_SESSION['matkhau'])){
        if(isset($_SESSION['role'])){
            $role =$_SESSION['role'];
            $result=mysqli_query($con,"SELECT Ten_danhmuc,danhmuc.Id_danhmuc From danhmuc,chitietquyen 
            where danhmuc.Id_danhmuc=chitietquyen.Id_danhmuc and Id_role='$role' and tinhtrang='1'");
            if (mysqli_num_rows($result)>0){
                while($row =mysqli_fetch_array($result)){
                    if($row['Id_danhmuc']=='DM100'){
                        echo '<a href="index.php?id=dm100&act=dm"><div id="dm0" style="margin-top:30px;margin-bottom:15px;"><i class="fa-solid fa-clipboard-list"></i></i><div class="div_tendanhmuc" style="float:left;padding-left:10px;font-size:17px;color:black;font-weight:bold;">'.$row['Ten_danhmuc'].'</div></div></a>';
                    }
                    else if($row['Id_danhmuc']=='DM101'){
                        echo '<a href="index.php?id=dm101&act=dm"><div id="dm1" class="a_danhmuc"><i class="fa-solid fa-list"></i><div class="div_tendanhmuc">'.$row['Ten_danhmuc'].'</div></div></a>';
                    }
                    else if($row['Id_danhmuc']=='DM102'){
                        echo '<a href="index.php?id=dm102&act=dm"><div id="dm2" class="a_danhmuc"><i class="fa-solid fa-rectangle-list"></i><div class="div_tendanhmuc">'.$row['Ten_danhmuc'].'</div></div></a>';
                    }  
                    else if($row['Id_danhmuc']=='DM103'){
                        echo '<a href="index.php?id=dm103&act=dm"><div id="dm3" class="a_danhmuc"><i class="fa-solid fa-key"></i><div class="div_tendanhmuc">'.$row['Ten_danhmuc'].'</div></div></a>';
                    }  
                    else if($row['Id_danhmuc']=='DM104'){
                        echo '<a href="index.php?id=dm104&act=dm"><div id="dm4" class="a_danhmuc"><i class="fa-solid fa-list-ol"></i><div class="div_tendanhmuc">'.$row['Ten_danhmuc'].'</div></div></a>'; 
                    }  
                    else if($row['Id_danhmuc']=='DM105'){
                        echo '<a href="index.php?id=dm105&act=dm"><div id="dm5" class="a_danhmuc"><i class="fa-solid fa-users"></i><div class="div_tendanhmuc">'.$row['Ten_danhmuc'].'</div></div></a>';
                    }  
                    else if($row['Id_danhmuc']=='DM106'){
                        echo '<a href="index.php?id=dm107&act=dm"><div id="dm7" class="a_danhmuc"><i class="fa-solid fa-address-card"></i><div class="div_tendanhmuc">'.$row['Ten_danhmuc'].'</div></div></a>';
                    }                 
                    else if($row['Id_danhmuc']=='DM107'){
                        echo '<a href="index.php?id=dm109&act=dm"><div id="dm9" class="a_danhmuc"><i class="fa-solid fa-chart-column"></i><div class="div_tendanhmuc">'.$row['Ten_danhmuc'].'</div></div></a>';
                    }  
                }
            }
        }
        
    }
?>
</div>
