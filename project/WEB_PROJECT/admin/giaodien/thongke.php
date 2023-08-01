<?php require_once 'connect.php';
?>
<button class='btn_thongke' id='thongke_loai_btn' onclick='form_select("thongke_loai");'>Thống kê theo loại sản phẩm</button> <button class='btn_thongke' id='thongke_sanpham_btn' onclick='form_select("thongke_sanpham");'> Thống kê theo sản phẩm bán chạy</button> <button class='btn_thongke' id='thongke_doanhthu_btn' onclick='form_select("thongke_doanhthu");'>Thống kê doanh thu</button>
<form method="post" id='thongke_loai'>
    <div class='bound'>
        <div class='inside'>
    <p>Thống kê theo loại sản phẩm</p>
    <div class="loai">
    Loại sản phẩm <select name="id">
            <option  value="all">Tất cả</option> 
            <?php 
            require_once 'connect.php';
            $re=mysqli_query($con,"SELECT * FROM sanpham,theloai where theloai.Idtheloai=sanpham.Id_theloai group by theloai.Idtheloai");
            while($row1 = mysqli_fetch_array($re)){
                echo '<option value="'.$row1['Idtheloai'].'">'.$row1['Tentheloai'].'</option>';
            }?>
    </select> 
    </div>
    <div class="ngay">
    <br>Từ ngày <input type="date" name="tgd" id="tgd" required>
        đến ngày <input type="date" name="tgc" id="tgc" required> 
    </div>
    <input type="submit" name="loai" value="Lọc">
        </div>
    </div>
</form>


<form method="post" id='thongke_sanpham'>
    <div class='bound'>
        <div class='inside'>
    <p>Thống kê theo sản phẩm bán chạy</p>
    <div class='top'>
        Top <input type="number" name="so" id="so" required min='0'> <br></div>
        <div class='ngay'>    
    Từ ngày <input type="date" name="tgd" id="tgd" required>
    Đến ngày <input type="date" name="tgc" id="tgc" required> 
        </div>
    <input type="submit" name="spham" value="Lọc">
        </div>
    </div>
</form>

<form method="post" id='thongke_doanhthu'>
    <div class='bound'>
        <div class='inside'>
    <p>Thống kê doanh thu</p>
    <?php $year = date("Y");?>
    <div class='year'>Năm thống kê <input type="number" name="year" value='<?=$year?>' min='2001' max='<?=$year?>'required></div>
    <div class='precious'>Thống kê theo : Tháng <input type='radio' name='precious' value='month' checked /> Quý <input type='radio' name='precious' value ='quarter'/></div>
    <input type="submit" name="doanhthu" value="Lọc">
        </div>
    </div>
</form>         
<?php
    if(isset($_POST['loai'])){
        $tgd=$_POST['tgd'];
        $tgc=$_POST['tgc'];
        if($_POST['id']=='all'){
            $theloai= "Tất cả";
            $result=mysqli_query($con,"SELECT `theloai`.`Tentheloai`,SUM(Soluong) as Soluong,SUM(tongtien) as tongtien FROM( SELECT `sanpham`.`Id_theloai`,`chitietdonhang`.`Id_sp`,SUM(`chitietdonhang`.`Soluong`) as `Soluong`,SUM(`chitietdonhang`.`Soluong`)*`sanpham`.`Dongia` as `tongtien` FROM 	`chitietdonhang`,`sanpham`,`donhang` WHERE `chitietdonhang`.`Iddh`=`donhang`.`Iddh` and `chitietdonhang`.`Id_sp`=`sanpham`.`ID_sp` and `donhang`.`Thoidiemgiaohang` BETWEEN '$tgd' and '$tgc' GROUP BY `chitietdonhang`.`Id_sp` ORDER BY `Soluong`) AS T,`theloai` WHERE `theloai`.`Idtheloai`=`Id_theloai` GROUP BY `Id_theloai`");
            ?> <p class='p1_1'>BẢNG THỐNG KÊ THỂ LOẠI ĐÃ BÁN</p>
            <p class='p1_2'> Thể loại : <?=$theloai?></p><p class='p1_2'>Từ ngày <?=$tgd?> đến ngày <?=$tgc?></p>
                <table id='thongke_1'>
                <tr>
                <th class='col_1'>Tên thể loại</th>
                <th class='col_2'>Số lượng</th>
                <th class='col_3'>Tổng tiền</th>
                </tr><a>
                <?php 
                while($row=mysqli_fetch_array($result)) { ?>
                    <tr>
                    <td class='col_1'><?php echo $row['Tentheloai'] ?></td>
                    <td class='col_2'><?php echo $row['Soluong'] ?></td>
                    <td class='col_3'><?php echo number_format($row['tongtien'],0,",",".")." đ" ?></td>
                    </tr>
               <?php }
               echo '</table>';            
        }
    else {
        $id=$_POST['id'];
        $tgd=$_POST['tgd'];
        $tgc=$_POST['tgc'];
        $result=mysqli_query($con,"SELECT `theloai`.`Tentheloai`,SUM(Soluong) as Soluong,SUM(`tongtien`) as `tongtien` FROM( SELECT `sanpham`.`Id_theloai`,`chitietdonhang`.`Id_sp`,SUM(`chitietdonhang`.`Soluong`) as `Soluong`,SUM(`chitietdonhang`.`Soluong`)*`sanpham`.`Dongia` as `tongtien` FROM 	`chitietdonhang`,`sanpham`,`donhang` WHERE `sanpham`.Id_theloai='$id' and `chitietdonhang`.`Iddh`=`donhang`.`Iddh` and `chitietdonhang`.`Id_sp`=`sanpham`.`ID_sp` and `donhang`.`Thoidiemgiaohang` BETWEEN '$tgd' and '$tgc' GROUP BY `chitietdonhang`.`Id_sp` ORDER BY `Soluong`) AS T,`theloai` WHERE `theloai`.`Idtheloai`=`Id_theloai` GROUP BY `Id_theloai`");
        ?> <p class='p1_1'>BẢNG THỐNG KÊ THỂ LOẠI ĐÃ BÁN</p>
            <p class='p1_2'> Thể loại : <?=$id?></p><p class='p1_2'>Từ ngày <?=$tgd?> đến ngày <?=$tgc?></p>
               <table id='thongke_1'>
                <tr>
                <th class='col_1'>Tên thể loại</th>
                <th class='col_2'>Số lượng</th>
                <th class='col_3'>Tổng tiền</th>
                </tr><a>
                <?php 
                while($row=mysqli_fetch_array($result)) { ?>
                    <tr>
                    <td class='col_1'><?php echo $row['Tentheloai'] ?></td>
                    <td class='col_2'><?php echo $row['Soluong'] ?></td>
                    <td class='col_3'><?php echo number_format($row['tongtien'],0,",",".")." đ" ?></td>
                    </tr>
               <?php }
               echo '</table>';
        }
    }
    
?>
                    <?php
    if(isset($_POST['spham'])){
        $limit=$_POST['so'];
        $tgd=$_POST['tgd'];
        $tgc=$_POST['tgc'];
            $result=mysqli_query($con,"SELECT `chitietdonhang`.`Id_sp`,`sanpham`.`Tensp`,SUM(`chitietdonhang`.`Soluong`) as `Soluong`,SUM(`chitietdonhang`.`Soluong`)*`sanpham`.`Dongia` as `tongtien` FROM `chitietdonhang`,`sanpham`,`donhang` WHERE `chitietdonhang`.`Iddh`=`donhang`.`Iddh` and `chitietdonhang`.`Id_sp`=`sanpham`.`ID_sp` and `donhang`.`Thoidiemgiaohang` BETWEEN '$tgd' and '$tgc' GROUP BY `chitietdonhang`.`Id_sp` ORDER BY `Soluong` DESC LIMIT 0,$limit");
            ?>  
                <p class='p1_1'>BẢNG THỐNG KÊ SẢN PHẨM BÁN CHẠY</p>
                <p class='p1_2'> Top : <?=$limit?></p><p class='p1_2'>Từ ngày <?=$tgd?> đến ngày <?=$tgc?></p>
                <table id='thongke_2'>
                <tr>
                <th class='col_1'>Mã sản phẩm</th>
                <th class='col_2'>Tên sản phẩm</th>
                <th class='col_3'>Số lượng đã bán</th>
                <th class='col_4'>Tổng tiền</th>
                </tr>
            <?php
                while($row=mysqli_fetch_array($result)) { ?>
                    <tr>
                    <td class='col_1'><?php echo $row['Id_sp'] ?></td>
                    <td class='col_2'><?php echo $row['Tensp'] ?></td>
                    <td class='col_3'><?php echo $row['Soluong'] ?></td>
                    <td class='col_4'><?php echo number_format($row['tongtien'],0,',','.')." đ" ?></td>
                    </tr>
               <?php } ?>
    </table> <?php } ?>
     <?php if(isset($_POST['doanhthu'])){
         $year=$_POST['year'];
         $precious=$_POST['precious'];
         
         if($precious=="quarter"){
            
             $result_quarter=mysqli_query($con,"SELECT quarter(Thoidiemgiaohang) as quarter ,sum(Tongtien) as Tongtien FROM donhang WHERE year(Thoidiemgiaohang)='$year' GROUP BY quarter(Thoidiemgiaohang);");
             $data= [];
             for($i=0;$i<4;$i++){
                 $data[$i]=0;
             }            
             while($row_quarter= mysqli_fetch_array($result_quarter)){                 
                 foreach($data as $key => $value){                 
                     if ($key == $row_quarter['quarter']) {                       
                                    $data[$key]=$row_quarter['Tongtien'];
                                }
                            else{                               
                        }
                }              
             }     
             ?>
                 <p class='p1_3'>BẢNG THỐNG KÊ DOANH THU NĂM <?=$year?></p>
                 <p class='p1_4'> Theo : Quý</p>
                <table id='thongke_3'>
                    <tr>
                    <th class='col_1'>Quý</th>
                    <th class='col_2'>Tổng doanh thu của quý</th>
                    </tr>
                    <?php foreach($data as $key => $value){?>
                     <tr>
                    <td class='col_1'><?=$key+1?></td>
                    <td class='col_2'><?= number_format($data[$key],0,',','.')." đ"?></td>
                    </tr>
                    <?php }
                    echo '</table>';
                    ?>
             <?php           
         }
         else{
             $result_quarter=mysqli_query($con,"SELECT month(Thoidiemgiaohang) as quarter ,sum(Tongtien) as Tongtien FROM donhang WHERE year(Thoidiemgiaohang)='$year' GROUP BY month(Thoidiemgiaohang);");
             $data= [];
             for($i=0;$i<12;$i++){
                 $data[$i]=0;
             }            
             while($row_quarter= mysqli_fetch_array($result_quarter)){                 
                 foreach($data as $key => $value){                 
                     if ($key == $row_quarter['quarter']) {                       
                                    $data[$key]=$row_quarter['Tongtien'];
                                }
                            else{                               
                        }
                }              
             }?>
                <p class='p1_3'>BẢNG THỐNG KÊ DOANH THU NĂM <?=$year?></p>
                <p class='p1_4'> Theo : Tháng</p>
                <table id='thongke_3'>
                    <tr>
                    <th class='col_1'>Tháng</th>
                    <th class='col_2'>Tổng doanh thu của tháng</th>
            </tr>
                <?php foreach($data as $key => $value){?>
                     <tr>
                    <td class='col_1'><?=$key+1?></td>
                    <td class='col_2'><?= number_format($data[$key],0,',','.')." đ"?></td>
                    </tr>
                    <?php }
                    echo '</table>';
                    ?>
             <?php           

                   
         }
     }
?> 
<script>
    function form_select(abc){
        if(abc === "thongke_loai"){
            document.getElementById('thongke_loai').style.display="block";
            document.getElementById('thongke_sanpham').style.display="none";        
            document.getElementById('thongke_doanhthu').style.display="none";
            document.getElementById('thongke_loai_btn').className="btn_thongke_selected";
            document.getElementById('thongke_sanpham_btn').className="btn_thongke";
            document.getElementById('thongke_doanhthu_btn').className="btn_thongke";
        }
        else if(abc === "thongke_sanpham"){
            document.getElementById('thongke_loai').style.display="none";
            document.getElementById('thongke_sanpham').style.display="block";        
            document.getElementById('thongke_doanhthu').style.display="none";
            document.getElementById('thongke_loai_btn').className="btn_thongke";
            document.getElementById('thongke_sanpham_btn').className="btn_thongke_selected";
            document.getElementById('thongke_doanhthu_btn').className="btn_thongke";
            
            
        }
        else{
            document.getElementById('thongke_loai').style.display="none";
            document.getElementById('thongke_sanpham').style.display="none";        
            document.getElementById('thongke_doanhthu').style.display="block";
            document.getElementById('thongke_loai_btn').className="btn_thongke";
            document.getElementById('thongke_sanpham_btn').className="btn_thongke";
            document.getElementById('thongke_doanhthu_btn').className="btn_thongke_selected";
           
        }
    }
    
    
</script>
