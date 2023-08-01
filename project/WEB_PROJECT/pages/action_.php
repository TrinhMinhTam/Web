<?php
    
        session_start();

        
        if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
        }
        if(!isset($_SESSION['idsp'])){
            $_SESSION['idsp']=array();
        }
        if(!isset($_SESSION['size'])){
            $_SESSION['size']=array();
        }
        if(!isset($_SESSION['quantity'])){
            $_SESSION['quantity']=array();
        }
        if(!isset($_SESSION['image'])){
            $_SESSION['image']=array();
        }
        if(!isset($_SESSION['name'])){
            $_SESSION['name']=array();
        }
        if(!isset($_SESSION['price'])){
            $_SESSION['price']=array();
        }
        if(!isset($_SESSION['tongtien'])){
            $_SESSION['tongtien']=array();
        }
        if(!isset($_SESSION['tonghoadon'])){
            $_SESSION['tonghoadon']=array();
        }
        
        if (!function_exists('currency_format')) {
                function currency_format($number, $suffix = 'VNĐ') {
                    if (!empty($number)) {
                        return number_format($number, 0, ',', '.') . "{$suffix}";
                    }
                }
            }
    
        if(isset($_POST['act'])){
            
            switch($_POST['act']){
                
 //------------------------------------------------P-H-Â-N----L-O-Ạ-i----------------------------------------------//                
               
                case "phanloai":{                    
                    require_once ('connect.php');                    
                    $limit = 8;                                  
                    if($_POST['page']==null){                           
                        $brand = $_POST['brand'];                           
                        $page  = 1;                                        
                        $sortprice = $_POST['sortprice'];                         
                        $search=$_POST['search'];                                 
                    }
                    else{
                        $brand = $_POST['brand'];
                        $page  = $_POST['page'];
                        $sortprice = $_POST['sortprice'];
                        $search=$_POST['search'];
                    }
                    $start=($page-1)*$limit;
                    $data="";
                    $sql;
                    if($search==null||$search==""){
                        if(($_POST['sortprice']==null)|| ($_POST['sortprice']=="none")){
                            if($_POST['brand']!='all'){
                                $sql = "SELECT * FROM sanpham,theloai where sanpham.Id_theloai=theloai.Idtheloai and sanpham.Hienthi='1' and Tentheloai='$brand' limit $start,$limit";
                            }
                            else{
                                $sql = "SELECT * FROM sanpham WHERE sanpham.Hienthi='1' limit $start,$limit";
                            }
                        }
                        else{
                            $price=explode("-",$sortprice);
                            if($_POST['brand']!='all'){      
                                $sql = "SELECT * FROM sanpham,theloai where sanpham.Id_theloai=theloai.Idtheloai and sanpham.Hienthi='1' and Tentheloai='$brand' and Dongia between $price[0] and $price[1] limit $start,$limit";
                            }
                            else{
                                $sql = "SELECT * FROM sanpham WHERE Dongia between $price[0] and $price[1] and sanpham.Hienthi='1' limit $start,$limit";
                            }
                        }
                    }
                        else{
                            if(($_POST['sortprice'] === null) || ($_POST['sortprice']==="none")){
                                if($_POST['brand']!='all'){
                                    $sql = "SELECT * FROM sanpham,theloai where sanpham.Id_theloai=theloai.Idtheloai and sanpham.Hienthi='1' and Tentheloai='$brand' and Tensp like '%$search%' limit $start,$limit";
                                }
                                else{
                                    $sql = "SELECT * FROM sanpham where Tensp like '%$search%' and sanpham.Hienthi='1' limit $start,$limit";
                                }
                            }
                            else{
                                $price=explode("-",$sortprice);
                                if($_POST['brand']!='all'){
                                    $sql = "SELECT * FROM sanpham,theloai where sanpham.Id_theloai=theloai.Idtheloai and sanpham.Hienthi='1' and Tentheloai='$brand' and Dongia between $price[0] and $price[1] and Tensp like '%$search%' limit $start,$limit";
                                }
                                else{                                   
                                    $sql = "SELECT * FROM sanpham WHERE Dongia between $price[0] and $price[1] and sanpham.Hienthi='1' and Tensp like '%$search%' limit $start,$limit";
                                }
                            }
                        }
                        $result= mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)>=1){
                            while($row=mysqli_fetch_array($result)){
                                if($row[7]=="1"){
                                    $data.="<li '>";
                                        $data.="<div class='parent'>";
                                            $data.="<a data-id='$row[0]' id='product-info-div'>";
                                            $data.="<img src='../images/".$row[4]."' alt='alt'>";
                                            $data.="<p class='title_product'>".$row[1];
                                            $data.="<p class='price_product'>". currency_format($row[3]);
                                        $data.="<div data-id='$row[0]' class='detail'>Xem chi tiết";
                                }
                                else{
                                    
                                }
                            }
                            //mysqli_close($con);
                            die(json_encode($data,JSON_UNESCAPED_UNICODE));
                        }
                        else{
                            $data="<div class='none-product'>Không có sản phẩm phù hợp";
                            //mysqli_close($con);
                            
                            die(json_encode($data,JSON_UNESCAPED_UNICODE));
                        }                       
                }
 //------------------------------------------------C-H-I--T-I-Ế-T-------------------------------------------------//                
                case 'detail':{
                    require_once ('connect.php');
                    $id = $_POST['id'];
                    $data = "";
                    $sql = "SELECT * FROM sanpham WHERE ID_sp = '$id'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    $sql_size = "SELECT Ten_size,Soluong FROM chitietsanpham,Size Where chitietsanpham.Ma_size=Size.Ma_size and Id_sp='$id' and Tinhtrang='1'";
                    $result_size = mysqli_query($con,$sql_size);
                    $count_size = mysqli_num_rows($result_size);                    
                    if($count_size>=1){
                        $data.= "<form  action='action_.php' onsubmit='return validate_chitiet()' method='post'>";
                            $data.= "<div id='product-info'>";
                                $data.= "<div data-id='$id' class='id-detail'></div>";
                                $data.= "<button type='button' class='close-btn'>X</button>";
                                $data.= "<img class='img-product' src='../images/".$row[4]."' alt='alt'>";
                                $data.= "<p class='name'>$row[1]</p>";
                                $data.= "<p class='price'>".currency_format($row[3])."</p>";
                                $data.= "<p class='size'>SIZE:</p>";
                                $data.= "<p class='size-validate'>* Chọn size *</p>";  
                                $data.= "<div id='size'>";
                                while($row_size = mysqli_fetch_array($result_size)){                             
                                        $data.= "<div data-size='$row_size[0]' class='size-btn'>$row_size[0]</div>";                               
                                }                         
                                $data.= "</div>";
                                $data.= "<div id='storage'></div>";
                                $data.= "<p class='quantity'>Số lượng:</p>";
                                $data.= "<div id='quantity'>";
                                    $data.= "<p class='quantity-down'>-</p>";
                                    $data.= "<input type='text' value='1' class='quantity-num'>";
                                    $data.= "<p class='quantity-up'>+</p>";   
                                $data.= "</div>";
                                $data.= "<input type='hidden' name='id' value='$id'>";
                                $data.= "<input type='hidden' class='size-hidden' name='size' value='40'>";
                                $data.= "<input type='hidden' class='quantity-hidden' name='quantity' value='1'>";
                                $data.= "<input type='hidden' name='img' value='$row[4]'>";
                                $data.= "<input type='hidden' name='name_product' value='$row[1]'>";
                                $data.= "<input type='hidden' name='price' value='$row[3]'>"; 
                                $data.= "<input class='cart' type='submit' name='act' value='ADD'> ";
                            $data.= "</div>";
                        $data.= "</form>";
                    }
                    else{
                        $data.= "<form  action='action_.php' onsubmit='return validate_chitiet()' method='post'>";
                            $data.= "<div id='product-info'>";
                                $data.= "<div data-id='$id' class='id-detail'></div>";
                                $data.= "<button type='button' class='close-btn'>X</button>";
                                $data.= "<img class='img-product' src='../images/".$row[4]."' alt='alt'>";
                                $data.= "<p class='name'>$row[1]</p>";
                                $data.= "<p class='price'>".currency_format($row[3])."</p>";                               
                                $data.= "<img class='out-of-stock' src='../images/Out-of-stock-1.png' alt='alt'>";                       
                            $data.= "</div>";
                        $data.= "</form>";
                    }
                    mysqli_close($con);
                    die(json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                    
                                }
//------------------------------------------------T-Ì-M--K-I-Ế-M-------------------------------------------------//                
                case "search":{
                    $name=$_POST['name'];
                    $data="";
                    require_once ('connect.php');
                    $sql = "SELECT * FROM `sanpham` WHERE `Hienthi`='1' and`Tensp` LIKE '%$name%'";
                    $result = mysqli_query($con, $sql);
                                      
                    if(mysqli_num_rows($result)>=1){
                        while($row = mysqli_fetch_array($result)){
                            $data.="<div class='info__product' data-id='$row[0]' >";
                            $data.="<img src='../images/$row[4]' alt='alt'>";
                            $data.="<p class='name__product'>$row[1]</p>";
                            $data.="<p class='price__product'>".currency_format($row[3])."</p>";
                            $data.="</div>";
                        }                     
                        mysqli_close($con);
                        die(json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                    }
                    else{
                        mysqli_close($con);
                        die(json_encode("<p class='none_product'>Không có sản phẩm phù hợp</p>",JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                    }                   
                }
 //------------------------------------------------T-H-Ê-M--S-Ả-N--P-H-Ẩ-M--------------------------------------------//  
                
                case "ADD":
                {         
                    if(!isset($_SESSION['tendangnhap'])){
                        header("location: login.php");
                    }
                    $id=$_POST['id'];
                    $size=$_POST['size'];
                    $quantity=$_POST['quantity'];
                    $name=$_POST['name_product'];
                    $price=$_POST['price'];
                    $img=$_POST['img'];
                    $total_price=$price*$quantity;
                    $exist=0;
                    if(isset($_SESSION['cart'][$id])){
                        $i1;                     
                        for($i=0; $i<count($_SESSION['cart'][$id]['size']);$i++){                         
                            if($_SESSION['cart'][$id]['size'][$i]==$size && $_SESSION['cart'][$id]['idsp'][$i]==$id){
                                $exist++;
                                $i1=$i;
                                echo $i1;
                            }
                        }
                        
                        if($exist==0){  
                            $_SESSION['cart'][$id]['size'][]=$size;
                            $_SESSION['cart'][$id]['quantity'][]=$quantity;
                            $_SESSION['cart'][$id]['image'][]=$img;
                            $_SESSION['cart'][$id]['price'][]=$price;
                            $_SESSION['cart'][$id]['name'][]=$name;
                            $_SESSION['cart'][$id]['idsp'][]=$id;
                            $_SESSION['cart'][$id]['tongtien'][]=$quantity*$price;
                            $_SESSION['tonghoadon'][0]+=$quantity*$price;                              
                        }
                        else{                        
                                $_SESSION['cart'][$id]['quantity'][$i1]+=$quantity;
                                $_SESSION['cart'][$id]['tongtien'][$i1]+=$quantity*$price;
                                $_SESSION['tonghoadon'][0]+=$quantity*$price;}                       
                    }
                    else{
                        $_SESSION['cart'][$id]['size'][]=$size;
                        $_SESSION['cart'][$id]['quantity'][]=$quantity;
                        $_SESSION['cart'][$id]['image'][]=$img;
                        $_SESSION['cart'][$id]['price'][]=$price;
                        $_SESSION['cart'][$id]['name'][]=$name;
                        $_SESSION['cart'][$id]['idsp'][]=$id;
                        $_SESSION['cart'][$id]['tongtien'][]=$quantity*$price;
                        $_SESSION['tonghoadon'][0]+=$quantity*$price;
                    }
                    header("location:test.php");
                    die;
                }
                
//------------------------------------------------X-O-Á--G-I-Ỏ--H-À-N-G---------------------------------------------//
                
                case "delete-all-cart":{
                        unset($_SESSION['cart']);
                        unset($_SESSION['tonghoadon']);
                        $data='';
                        $data.="<div class='empty-cart'><img  src='../images/empty-cart.webp' alt='alt'></div>";  
                        die(json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                }
                
 //------------------------------------------------G-I-Ả-M--S-Ố--L-Ư-Ợ-N-G--------------------------------------------//              
                case "down":{
                    $id=$_POST['id'];
                    $i=$_POST['i'];
                    if($_SESSION['cart'][$id]['quantity'][$i]>=2){
                        $_SESSION['cart'][$id]['quantity'][$i]--;
                        $_SESSION['cart'][$id]['tongtien'][$i]-=$_SESSION['cart'][$id]['price'][$i];
                        $_SESSION['tonghoadon'][0]-=$_SESSION['cart'][$id]['price'][$i];
                        $data='';
                        $data.="<div class='detail-cart'>";
                    }
                    foreach($_SESSION['cart'] as $key => $value){
                        for($i=0;$i<count($_SESSION['cart'][$key]['quantity']);$i++){
                            if(isset($_SESSION['cart'][$key]['size'][$i])){
                                if ($_SESSION['cart'][$key]['idsp'][$i] == null) {     
                                } 
                                else {
                                    $data = '';
$data.="<div class='table-row'>";
$data.="<div class='col col-2'><img src='../images/".$_SESSION['cart'][$key]['image'][$i]."' alt='alt'/></div>";
$data.="<div class='col col-3'><p>".$_SESSION['cart'][$key]['name'][$i]."</p></div>";
$data.="<div class='col col-4'>".$_SESSION['cart'][$key]['size'][$i]."</div>";
$data.="<div class='col col-5'>";
    $data.="<div>";
        $data.="<p class='quantity-down' onClick='down(".$_SESSION['cart'][$key]['idsp'][$i].",$i);'>-</p>";
        $data.="<input type='number' disabled value='".$_SESSION['cart'][$key]['quantity'][$i]."'>";
        $data.="<p class='quantity-up' onClick='up(".$_SESSION['cart'][$key]['idsp'][$i].",$i);'>+</p>";
    $data.="</div>";
$data.="</div>";
$data.="<div class='col col-6'>".number_format($_SESSION['cart'][$key]['price'][$i], 0 ,",",".")." VNĐ"."</div>";
$data.="<div class='col col-7'>".number_format($_SESSION['cart'][$key]['tongtien'][$i], 0 ,",",".")." VNĐ"."</div>";
$data .= "<div class='col col-8'><i class='fa-solid fa-trash-can' onclick='delete_from_cart(".$_SESSION['cart'][$key]['idsp'][$i].",$i);'></i></div>";
$data.="</div>";
                                }
                        }
                    }
                }
                    $data.="</div>";
                    $data.="<div class='table-footer'>";
                    $data.="<div class='col col-1'>Xoá đơn hàng</div>";
                    $data.="<div class='col col-2'>Thành tiền: ".number_format($_SESSION['tonghoadon'][0], 0 ,",",".")." VNĐ"."</div>";
                    $data.="</div>";
                    die(json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                }
 //------------------------------------------------T-Ă-N-G--S-Ố--L-Ư-Ợ-N-G--------------------------------------------//                    
                case "up":{
                    $id=$_POST['id'];
                    $i=$_POST['i'];
                    if($_SESSION['cart'][$id]['quantity'][$i]<=98){
                        $_SESSION['cart'][$id]['quantity'][$i]++;
                        $_SESSION['cart'][$id]['tongtien'][$i]+=$_SESSION['cart'][$id]['price'][$i];
                        $_SESSION['tonghoadon'][0]+=$_SESSION['cart'][$id]['price'][$i];
                    }
                    $data='';
                    $data.="<div class='detail-cart'>";
                    foreach($_SESSION['cart'] as $key => $value){
                        for($i=0;$i<count($_SESSION['cart'][$key]['quantity']);$i++){
                            if(isset($_SESSION['cart'][$key]['size'][$i])){
                                if ($_SESSION['cart'][$key]['idsp'][$i] == null) {     
                                } 
                                else {
                                    $data.="<div class='table-row'>";
                                        $data.="<div class='col col-2'><img src='../images/".$_SESSION['cart'][$key]['image'][$i]."' alt='alt'/></div>";
                                        $data.="<div class='col col-3'><p>".$_SESSION['cart'][$key]['name'][$i]."</p></div>";
                                        $data.="<div class='col col-4'>".$_SESSION['cart'][$key]['size'][$i]."</div>";
                                        $data.="<div class='col col-5'>";
                                            $data.="<div>";
                                                $data.="<p class='quantity-down' onClick='down(".$_SESSION['cart'][$key]['idsp'][$i].",$i);'>-</p>";
                                                $data.="<input type='number' disabled value='".$_SESSION['cart'][$key]['quantity'][$i]."'>";
                                                $data.="<p class='quantity-up' onClick='up(".$_SESSION['cart'][$key]['idsp'][$i].",$i);'>+</p>";
                                            $data.="</div>";
                                        $data.="</div>";
                                        $data.="<div class='col col-6'>".number_format($_SESSION['cart'][$key]['price'][$i], 0 ,",",".")." VNĐ"."</div>";
                                        $data.="<div class='col col-7'>".number_format($_SESSION['cart'][$key]['tongtien'][$i], 0 ,",",".")." VNĐ"."</div>";
                                        $data .="<div class='col col-8'><i class='fa-solid fa-trash-can' onclick='delete_from_cart(".$_SESSION['cart'][$key]['idsp'][$i].",$i);'></i></div>";
                                    $data.="</div>";
                                }
                            }        
                        }
                    }
                    $data.="</div>";
                    $data.="<div class='table-footer'>";
                        $data.="<div class='col col-1'>Xoá đơn hàng</div>";
                        $data.="<div class='col col-2'>Thành tiền: ".number_format($_SESSION['tonghoadon'][0], 0 ,",",".")." VNĐ"."</div>";
                    $data.="</div>";
                    die(json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                }
 //---------------------------------------------C-H-E-C-K--S-Ố--Đ-I-Ệ-N--T-H-O-Ạ-I----------------------------------//               
                 case "check_phone":{  
                    echo"2";
                    $phone=$_POST['phone'];
                    $pattern = '^[0-9]$';
                    
                    if(preg_match($pattern,$phone)){
                        die(json_encode("Khớp"));
                    }
                    else{
                        die(json_encode("Không khớp"));
                    }
                }
 //------------------------------------------------X-O-Á--S-Ả-N--P-H-Ẩ-M---------------------------------------------//                    
               
                case "delete-from-cart":{   
                    $id=$_POST['id'];
                    $i1=$_POST['i'];
                    $cart;
                    $_SESSION['tonghoadon'][0]-=$_SESSION['cart'][$id]['price'][$i1]*$_SESSION['cart'][$id]['quantity'][$i1];
                    $_SESSION['cart'][$id]['idsp'][$i1]=null;     
                    $data='';
                    $data.="<div class='detail-cart'>";
                    foreach($_SESSION['cart'] as $key => $value){
                        for($i=0;$i<count($_SESSION['cart'][$key]['quantity']);$i++){
                            if (isset($_SESSION['cart'][$key]['idsp'][$i]) and $_SESSION['cart'][$key]['idsp'][$i] != null) { 
                                $cart="notEmpty";
                                }    
                            } 
                    }
                    if($cart = "notEmpty"){
                        foreach($_SESSION['cart'] as $key => $value){
                            for($i=0;$i<count($_SESSION['cart'][$key]['quantity']);$i++){
                                if ($_SESSION['cart'][$key]['idsp'][$i] == null) {     
                                } 
                                else {
                                    if (isset($_SESSION['cart'][$key]['size'][$i])) {
                                        $data ='';
                                        $data .= "<div class='table-row'>";
                                        $data .= "<div class='col col-2'><img src='../images/" . $_SESSION['cart'][$key]['image'][$i] . "' alt='alt'/></div>";
                                        $data .= "<div class='col col-3'><p>" . $_SESSION['cart'][$key]['name'][$i] . "</p></div>";
                                        $data .= "<div class='col col-4'>" . $_SESSION['cart'][$key]['size'][$i] . "</div>";
                                        $data .= "<div class='col col-5'>";
                                            $data .= "<div>";
                                                $data .= "<p class='quantity-down' onClick='down(" . $_SESSION['cart'][$key]['idsp'][$i] . ",$i);'>-</p>";
                                                $data .= "<input type='number' disabled value='" . $_SESSION['cart'][$key]['quantity'][$i] . "'>";
                                                $data .= "<p class='quantity-up' onClick='up(".$_SESSION['cart'][$key]['idsp'][$i].",$i);'>+</p>";
                                            $data .= "</div>";
                                        $data .= "</div>";
                                        $data .= "<div class='col col-6'>" . currency_format($_SESSION['cart'][$key]['price'][$i]) . "</div>";
                                        $data .= "<div class='col col-7'>" . currency_format($_SESSION['cart'][$key]['tongtien'][$i]) . "</div>";
                                        $data .= "<div class='col col-8'><i class='fa-solid fa-trash-can' onclick='delete_from_cart(".$_SESSION['cart'][$key]['idsp'][$i].",$i);'></i></div>";
                                        $data .= "</div>";
                                    }
                                }
                            }
                        }
                        $data.="</div>";
                        $data.="<div class='table-footer'>";
                        $data.="<div class='col col-1'>Xoá đơn hàng</div>";
                        $data.="<div class='col col-2'>Thành tiền: ".number_format($_SESSION['tonghoadon'][0], 0 ,",",".")." VNĐ"."</div>";
                        $data.="</div>";
                    }
                    else{
                        $data.="<div class='empty-cart'><img  src='../images/empty-cart.webp' alt='alt'></div>";
                    }
                    
                    die(json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                }
                
//-----------------------------------------------Đ-Ặ-T--H-À-N-G----------------------------------------------//                   
                 case "dathang":{
                    
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key => $value){
                            for($i=0;$i<count($_SESSION['cart'][$key]['quantity']);$i++){
                                if (isset($_SESSION['cart'][$key]['idsp'][$i]) and $_SESSION['cart'][$key]['idsp'][$i] != null) { 
                                    $cart="notEmpty";
                                }    
                            } 
                        }
                        include('connect.php');
                        if($cart=="notEmpty"){
                        $customer_name=$_POST['tennguoinhan'];
                       
                        $customer_phone=$_POST['sdt'];
                        
                        $customer_address=$_POST['diachi'];
                        
                        $customer_note=$_POST['ghichu'];    
                        
                        $sql_get_madonhang_max="SELECT max(Iddh) From donhang";
                        $result= mysqli_query($con, $sql_get_madonhang_max);
                        $row= mysqli_fetch_array($result);
                        $madonhang=explode("DH",$row[0]);
                        $madonhang_new="DH".($madonhang[1]+1);
                        $id_account=$_SESSION['tk'];                       
                        //$date=getdate(); 
                        $date = date("Y-m-d");
                        $date_dathang=$date;
                        $date_giaohang = date('Y-m-d', strtotime($date. ' +1 week'));
                        $tongtien=$_SESSION['tonghoadon'][0];         
                        
                        /*Tạo đơn hàng*/
                        echo"2";
                        $sql_new_donhang="INSERT INTO donhang (`Iddh`,`Id_kh`,`Id_nv`,`Tennguoinhan`,`Diachi`,`Sđt`,`Ghichu`,`Thoidiemdathang`,`Thoidiemgiaohang`,`Tongtien`,`Id_trangthai`) VALUES ('$madonhang_new','$id_account',' ','$customer_name','$customer_address','$customer_phone','$customer_note','$date_dathang','$date_giaohang','$tongtien','STA10')"; 
                        $result_new_donhang= mysqli_query($con, $sql_new_donhang);  
                        
                        if($result_new_donhang){
                        /*Tạo chi tiết đơn hàng & Update chi tiết sản phẩm*/
                        foreach($_SESSION['cart'] as $key => $value){
                            for($i=0;$i<count($_SESSION['cart'][$key]['size']);$i++){
                                if ($_SESSION['cart'][$key]['idsp'][$i] == null) {     
                                } 
                                else {
                                    $id = $_SESSION['cart'][$key]['idsp'][$i];
                                    $size = $_SESSION['cart'][$key]['size'][$i];
                                    $sql_get_masize = "SELECT Ma_size FROM Size where Ten_size='$size'";
                                    $result_masize = mysqli_query($con, $sql_get_masize);
                                    $row_masize = mysqli_fetch_array($result_masize);
                                    $quantity = $_SESSION['cart'][$key]['quantity'][$i];
                                    $sql_get_dongia="SELECT Dongia FROM sanpham where Id_sp='$id'";
                                    $result_dongia= mysqli_query($con, $sql_get_dongia);
                                    $row_dongia= mysqli_fetch_array($result_dongia);
                                    $thanhtien=$quantity*$row_dongia[0];
                                    $sql_new_detail_donhang="INSERT INTO chitietdonhang (`Iddh`,`Id_sp`,`Ma_size`,`Soluong`,`Dongia`,`Thanhtien`) VALUES ('$madonhang_new','$id','$row_masize[0]','$quantity','$row_dongia[0]','$thanhtien')";                             
                                    $result_new_detail=mysqli_query($con,$sql_new_detail_donhang);
                                    $sql_get_ctsp="SELECT * FROM `chitietsanpham` where `Id_sp`='$id' and `Ma_size`='$row_masize[0]'";
                                    $result_ctsp= mysqli_query($con, $sql_get_ctsp);
                                    $row_ctsp= mysqli_fetch_array($result_ctsp);
                                    $quantity_ctsp=$row_ctsp[2]-$quantity;
                                    if($quantity_ctsp<=0){                                  
                                        $hienthi=0;                                   
                                    }                               
                                    else{                                    
                                        $hienthi=1;                                   
                                    }
                                    $sql_update_ctsp="UPDATE `chitietsanpham` SET `Soluong`='$quantity_ctsp',`Tinhtrang`='$hienthi' WHERE `Id_sp`='$id' and `Ma_size`='$row_masize[0]'";  
                                    $result_update_ctsp= mysqli_query($con,$sql_update_ctsp); 
                                    
                                    }                               
                                }
                            }
                        }                       
                        unset($_SESSION['cart']);                       
                        unset($_SESSION['tonghoadon']);                       
                        //var_dump($_SESSION['cart']);
                        mysqli_close($con);
                        
                        header("location:cart.php");
                                    } 
                        else{
                            mysqli_close($con);
                            header("location:cart.php?check=error");
                        }
                        
                    }
                    else{
                        mysqli_close($con);
                        header("location:cart.php?check=error");
                    }               
                }
                
//------------------------------------------------X-E-M--G-I-Ỏ--H-À-N-G--------------------------------------------//                    
                   
                
        }
    }

    
  ?>


