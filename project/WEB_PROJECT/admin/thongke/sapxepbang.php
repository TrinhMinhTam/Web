<?php
    if(isset($_REQUEST['sapxep'])){
        include_once '../connect.php';
            switch($_REQUEST['sapxep']){
                case 'ma':{
                    if($_COOKIE['forid'] == 0){
                        $result = $con->query("SELECT * FROM `thongke` ORDER BY `MaSP` DESC");
                        $forma = 1;
                        setcookie('forid',$forma,time()+7200);
                    }
                   else{
                        $result = $con->query("SELECT * FROM `thongke` ORDER BY `MaSP` ASC");
                        $forma = 0;
                        setcookie('forid',$forma,time()+7200);
                   }
                    break;
                } 
                case 'ten':{
                    if($_COOKIE['forten'] == 0){
                        $result = $con->query("SELECT * FROM `thongke` ORDER BY `TenSP` DESC");
                        $forten = 1;
                        setcookie('forten',$forten,time()+7200);
                    }
                   else{
                        $result = $con->query("SELECT * FROM `thongke` ORDER BY `TenSP` ASC");
                        $forten = 0;
                        setcookie('forten',$forten,time()+7200);
                   }
                    break;
                }
                case 'gia':{
                    if($_COOKIE['forgia'] == 0){
                        $result = $con->query("SELECT * FROM `thongke` ORDER BY `Dongia` DESC");
                        $forgia = 1;
                        setcookie('forgia',$forgia,time()+7200);
                    }
                    else{
                        $result = $con->query("SELECT * FROM `thongke` ORDER BY `Dongia` ASC");
                        $forgia = 0;
                        setcookie('forgia',$forgia,time()+7200);
                    }
                    break;
                }
            }
            //mấy cái nút click nó hơi xấu có thể ông gán value bằng cái icon mũi tên xổ xuống nhìn cho nó mầu mè tý
            echo '<tr>'
            .'<th>STT</th>'
            .'<th>mã sản phẩm <input type="button" value="sắp xếp" onclick="xulysukien(`ma`)"></th>'
            .'<th>tên sản phẩm <input type="button" value="sắp xếp" onclick="xulysukien(`ten`)"></th>'
            .'<th>đơn giá <input type="button" value="sắp xếp" onclick="xulysukien(`gia`)"></th>'
            .'<th>số lượng</th>'
            
            .'<th>tổng tiền</th>'
        .'</tr>';
            $dem = 1;
            $tong = 0;
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
                    $tong+=$row[5];
            }
            echo '<tr><td>Tổng tiền thu về:'.$tong.'đồng</td></tr>';
        }
    


?>