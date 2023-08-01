<?php
    include_once "../connect.php";
    $result = $con->query("SELECT * FROM `thongke`");
    if ($result->num_rows > 0) {
    $con->query("DELETE FROM `thongke`");
}
//3 biến này là 3 biến đánh dấu sắp xếp theo tên, mã, đơn giá được lưu trên cookie 
        $forma = 0;
        $forten = 0;
        $forgia = 0; 
        setcookie('forid',$forma,time()+7200);
        setcookie('forten',$forten,time()+7200);
        setcookie('forgia',$forgia,time()+7200);
    
        if (isset($_REQUEST['kieuthongke'])) {
    switch ($_REQUEST['kieuthongke']) {
        case 'thongkebanchay': {
                tkbanchay($con);
                break;
            }
        case 'thongketheoloai': {
                tktheoloai($con);
                break;
            }
        case 'thongketatca': {
                tktatca($con);
                break;
            }
    }
}
$tong = 0;   
    function tkbanchay($conn){
        $toptk = $_REQUEST['topsp'];
        $ngaybatdau = $_REQUEST['datestart'];
        $ngayketthuc = $_REQUEST['dateend'];
        $result = $conn->query("SELECT `sanpham`.`Tensp`,`chitietdonhang`.`Id_sp`,SUM(`chitietdonhang`.`Soluong`) as `Soluong`,(SUM(`chitietdonhang`.`Soluong`)) as `Tongtien` FROM `chitietdonhang`,`sanpham`,`donhang` WHERE `chitietdonhang`.`Iddh`=`donhang`.`Iddh` and `chitietdonhang`.`Id_sp`=`sanpham`.`ID_sp` and `donhang`.`Thoidiemgiaohang` BETWEEN '$ngaybatdau' and '$ngayketthuc' GROUP BY `chitietdonhang`.`Id_sp` ORDER BY `Soluong` DESC LIMIT 0, $toptk;");
        
         echo '<tr>'
                .'<th>STT</th>'
                .'<th>mã sản phẩm <input type="button" value="click" onclick="xulysukien(`ma`)"></th>'
                .'<th>tên sản phẩm <input type="button" value="click" onclick="xulysukien(`ten`)"></th>'
                .'<th>đơn giá <input type="button" value="click" onclick="xulysukien(`gia`)"></th>'
                .'<th>số lượng</th>'            
                .'<th>tổng tiền</th>'
            .'</tr>';
            $dem = 1;
        while($row = $result->fetch_row()){
            addbangthongke($row);
        } 
       $result = $conn->query("SELECT * FROM `thongke`");
        while($row = $result->fetch_row()){
             echo '<tr>'
            .'<td>'.$dem.'</td>'
            .'<td>'.$row[1].'</td>'
            .'<td>'.$row[2].'</td>'
            .'<td>'.$row[3].'</td>'
            .'<td>'.$row[4].'</td>'
            .'<td>'.$row[5].'</td>'
            
        .'</tr>';
        $dem++; 
        
       $GLOBALS['tong']+=$row[5];
        }
        echo '<tr><td>Tổng tiền thu về: '.$GLOBALS['tong'].'   đồng</td></tr>';
        
    }
    function tktheoloai($conn){
        $theloai = $_REQUEST['theloai'];
        $timestart = $_REQUEST['datest'];
        $timeend = $_REQUEST['dateend'];
        $result = $conn->query("SELECT `chitietdonhang`.`Id_sp`,`sanpham`.`Tensp`,
        `chitietdonhang`.`Dongia`, SUM(`chitietdonhang`.`Soluong`)
        FROM `chitietdonhang`,`sanpham`,`donhang` WHERE 
        `chitietdonhang`.`Iddh` = `donhang`.`Iddh` AND `chitietdonhang`.`Id_sp` = `sanpham`.`ID_sp` 
        AND `sanpham`.`Id_theloai` = '$theloai' AND `donhang`.`Thoidiemgiaohang` BETWEEN '$timestart' 
        AND '$timeend' GROUP BY (`chitietdonhang`.`Id_sp`)") ;
        $dem = 0;
        
        echo '<tr>'
                .'<th>STT</th>'
                .'<th>mã sản phẩm <input type="button" value="click" onclick="xulysukien(`ma`)"></th>'
                .'<th>tên sản phẩm <input type="button" value="click" onclick="xulysukien(`ten`)"></th>'
                .'<th>đơn giá <input type="button" value="click" onclick="xulysukien(`gia`)"></th>'
                .'<th>số lượng</th>'
                
                .'<th>tổng tiền</th>'
            .'</tr>';
            $dem = 1;
        while($row = $result->fetch_row()){
            addbangthongke($row);
        }
        $result = $conn->query("SELECT * FROM `thongke`");
        while($row = $result->fetch_row()){
            echo '<tr>'
            .'<td>'.$dem.'</td>'
            .'<td>'.$row[1].'</td>'
            .'<td>'.$row[2].'</td>'
            .'<td>'.$row[3].'</td>'
            .'<td>'.$row[4].'</td>'
            .'<td>'.$row[5].'</td>'
            
        .'</tr>';
        $dem++;
        $GLOBALS['tong']+=$row[5];
        }
        echo '<tr><td>Tổng tiền thu về: '.$GLOBALS['tong'].'   đồng</td></tr>';
    }
    function tktatca ($conn){
        $ngaybatdau = $_REQUEST['datestart'];
        $ngayketthuc = $_REQUEST['dateend'];
        $result = $conn->query("SELECT `chitietdonhang`.`Id_sp`,`sanpham`.`Tensp`,`chitietdonhang`.`Dongia`,
         SUM(`chitietdonhang`.`Soluong`)
         FROM ((`chitietdonhang` INNER JOIN `donhang` 
        ON `donhang`.`Iddh` = `chitietdonhang`.`Iddh`) INNER JOIN `sanpham` 
        ON `sanpham`.`ID_sp` = `chitietdonhang`.`Id_sp`) 
        WHERE `donhang`.`Thoidiemgiaohang` BETWEEN '$ngaybatdau' AND '$ngayketthuc' 
        GROUP BY (`chitietdonhang`.`Id_sp`)");
        $dem = 0;
        echo '<tr>'
                .'<th>STT</th>'
                .'<th>mã sản phẩm <input type="button" value="click" onclick="xulysukien(`ma`)"></th>'
                .'<th>tên sản phẩm <input type="button" value="click" onclick="xulysukien(`ten`)"></th>'
                .'<th>đơn giá <input type="button" value="click" onclick="xulysukien(`gia`)"></th>'
                .'<th>số lượng</th>'
               
                .'<th>tổng tiền</th>'
            .'</tr>';
            $dem = 1;
        while($row = $result->fetch_row()){
            addbangthongke($row);
        }
        $result = $conn->query("SELECT * FROM `thongke`");
        while($row = $result->fetch_row()){
            echo '<tr>'
            .'<td>'.$dem.'</td>'
            .'<td>'.$row[1].'</td>'
            .'<td>'.$row[2].'</td>'
            .'<td>'.$row[3].'</td>'
            .'<td>'.$row[4].'</td>'
            .'<td>'.$row[5].'</td>'
            
        .'</tr>';
        $dem++;
        $GLOBALS['tong']+=$row[5];
        }
        echo '<tr><td>Tổng tiền thu về: '.$GLOBALS['tong'].'   đồng</td></tr>';
    }
    function addbangthongke($row){
        $sum = $row[3]*$row[2];

         $GLOBALS["con"]->query("INSERT INTO `thongke` (`MaSP`,`TenSP`,`Dongia`,`Soluong`,`ThuThap`) 
         VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$sum')");
         return;
    }
   
?>
