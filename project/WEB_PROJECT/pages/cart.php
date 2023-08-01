<!doctype html>
<?php
    session_start();
    //unset($_SESSION['cart']);
    //unset($_SESSION['tonghoadon']);
    if(empty($_SESSION['cart'])){
        unset($_SESSION['cart']);
        unset($_SESSION['tonghoadon']);
    }
    include('connect.php');
    //unset($_SESSION['tk']);

    if(isset($_SESSION['tk'])){
        $sql="SELECT * FROM `thongtintaikhoan` WHERE `Id_tk`='".$_SESSION['tk']."'";
        $result_taikhoan = mysqli_query($con, $sql);
        $row_taikhoan=mysqli_fetch_array($result_taikhoan);
    }
    if(!isset($_SESSION['tk'])){
        header("location:login.php");
    }
?>
    <html>
    <head>    
            <meta http-equiv="x-ua-compatible" content="IE=Edge"/> 
            <title>Giỏ hàng</title>
            <link href='../css/css.css' rel='stylesheet'>
            <link rel="stylesheet" href="../assets/style.css">
            <link rel="stylesheet" href="../assets/base.css">
            <link rel="stylesheet" href="../assets/grid.css">
            <link rel="stylesheet" href="../assets/fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.min.css">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">   
            <script src="https://kit.fontawesome.com/8f58aae133.js" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            
           
    </head>
    <body>
        <section class="app">
        <!--header-->
        <header>
             <div class="clearfix">
        <nav class="navigation">
            <div class="header-first_name">
                <ul class="nav">
                    <li class="nav-list">
                        <a href="test.php">SẢN PHẨM</a>
                    </li>                       
                    <li class="nav-list">
                        <?php if(isset($_SESSION['name'])){ ?>
                        <div class="nav-account">
                            <a><?php echo $_SESSION['name'] ?></a>
                            <ul class="nav-user_menu">
                                <li class="nav-user_menu-item"><a href="logout.php">Đăng xuất</a></li>
                                <li class="nav-user_menu-item"><a href="../admin/giaodien/index.php">Thông tin</a></li>
                            </ul>
                        </div>
                        <?php }else{ ?>
                        <div class="nav-account">
                            <a href="../homepage/login.php">TÀI KHOẢN</a>
                            <ul class="nav-user_menu">
                                <li class="nav-user_menu-item"><a href="../homepage/create.php">Đăng ký</a></li>
                                <li class="nav-user_menu-item"><a href="login.php">Đăng nhập</a></li>
                           
                            </ul>
                        </div>
                        <?php }?>
                    </li>
                   
                </ul>
       </div>
        </nav>
    </div>            
        </header>
    </section>    
    <div id='cart-info'>
        <div id='left'>
            <p class='gio-hang'>Giỏ hàng >>></p>
            <div class='table'>
                <div class="table-header">
                    <div class="col col-2">Hình ảnh</div>
                    <div class="col col-3">Tên</div>
                    <div class="col col-4">Size</div>
                    <div class="col col-5">Số lượng</div>
                    <div class="col col-6">Đơn giá</div>
                    <div class="col col-7">Thành tiền</div>
                    <div class="col col-8">Delete</div>
                </div>
                <div id='detail-cart'>
    <?php showgiohang() ?>
                </div>
            </div>
        </div>
        <div id='right'>
            <form id='form-dat-hang' onsubmit="return validate_thanh_toan();" action='action_.php' method='post'>
                <div id='info'>
                    <p class='thongtinmua'>Thông tin người mua/nhận hàng</p>
                    <input type='text' id='tennguoinhan' name='tennguoinhan' value='<?php echo $row_taikhoan['Hoten']?>' placeholder="Họ và tên">
                    <p class='check-name'>* Họ và tên không được để trống</p>
                    <input type='text' id='diachi' name='diachi' value='<?php echo $row_taikhoan['Diachi']?>' placeholder='Địa chỉ giao hàng'>
                    <p class='check-address'>* Địa chỉ không được để trống</p>
                    <input type='text' id='sdt' name='sdt' value='<?php echo $row_taikhoan['Dienthoai']?>' placeholder='Số điện thoại'>
                    <p class='check-sdt'>* Số điện thoại không hợp lệ (10-11 số)</p>
                    <textarea rows='5' cols='20' id='ghichu' placeholder='Ghi chú' name='ghichu' maxlength="500" ></textarea>
                    <input type='hidden' name='act' value='dathang'>
                    <input type='submit' id='dathang' name='x' value='Đặt hàng' onclick="confirm('Thanh toán đơn hàng này ???');">
                    <?php if(isset($_GET['check'])){?><p class='check-submit'>* Giỏ hàng đang trống - Xem <a href='test.php'>SẢN PHẨM</a> cửa hàng</p><?php } ?>
                </div>
            </form>
        </div>
    </div>
    <div style="clear:both">
            <div class="clearfix">
            <div class="grid"> 
                <div class="account-footer">
                    <div class="grid wide">
                        <div class="row">
                            <div class="col l-2-4 c-12 m-6">
                                <div class="account-footer_titel">CHĂM SÓC KHÁCH HÀNG</div>
                                <div class="account-footer_list">
                                <ul>
                                    <li>
                                        <a href="">Trung tâm trợ giúp</a>
                                    </li>
                                    <li>
                                        <a href="">Shop Blog</a>
                                    </li>
                                    <li>
                                        <a href="">Shop Mall</a>
                                    </li>
                                    <li>
                                        <a href="">Hướng dẫn mua hàng</a>
                                    </li>
                                    <li>
                                        <a href="">Hướng dẫn bán hàng</a>
                                    </li>
                                </ul>
                                </div>   
                            </div>
                            <div class="col l-2-4 c-12 m-6">
                                <div class="account-footer_titel">VỀ SHOP</div>
                                <div class="account-footer_list">
                                    <ul>
                                        <li>
                                            <a href="">Giới thiệu về Shop</a>
                                        </li>
                                        <li>
                                            <a href="">Tuyển dụng</a>
                                        </li>
                                        <li>
                                            <a href="">Điều khoản </a>
                                        </li>
                                        <li>
                                        <a href="">Chính sách bảo mật</a>
                                        </li>
                                        <li>
                                        <a href="">Chính hãng</a>
                                        </li>
                                        <li>
                                        <a href="">Kênh người bán</a>
                                        </li>
                                    </ul>
                                </div>   
                            </div>
                            <div class="col l-2-4 c-12 m-6">
                                <div class="account-footer_titel">THEO DÕI CHÚNG TÔI TRÊN</div>
                                <div class="account-footer_list">
                                    <ul>
                                        <li>
                                            <span class="ti-facebook"></span>
                                            <a href="">Facebook</a>
                                        </li>
                                        <li>
                                        <span class="ti-google"></span>
                                        <a href="">Google</a>
                                        </li>
                                        <li>
                                        <span class="ti-instagram"></span>
                                        <a href="">Instagram</a>
                                        </li>
                                    </ul>
                                </div>  
                            </div>
                            <div class="col l-2-4 c-12 m-6">
                                <div class="account-footer_titel">THANH TOÁN</div>
                                <div class="account-footer_list">
                                    <ul>
                                        <li>
                                            <span class="ti-credit-card"></span>
                                            <a href="">Thẻ VISA</a>
                                        </li>
                                        <li>
                                        <span class="ti-shortcode"></span>
                                        <a href="">Chuyển khoản</a>
                                        </li>
                                        <li>
                                        <span class="ti-receipt"></span>
                                        <a href="">Credit</a>
                                        </li>
                                    </ul>
                                </div>  
                            </div>
                            <div class="col c-12 l-2-4 m-6">
                                <div class="account-footer_titel">TẢI ỨNG DỤNG NGAY THÔI</div>
                                <div class="account-footer_list">
                                    <ul>
                                        <li>
                                            <span class="ti-apple"></span>
                                            <a href="">App Store</a>
                                        </li>
                                        <li>
                                        <span class="ti-android"></span>
                                        <a href="">Ch Play</a>
                                        </li>
                                        <li>
                                        <span class="ti-instagram"></span>
                                        <a href="">Instagram</a>
                                        </li>
                                    </ul>
                                </div>  
                            </div>
                        </div>
                        <div class="account-footer-security">
                            © 2023 . Tất cả các quyền được bảo lưu dưới quyền của các thành viên Team 
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>        
    </body>
    </html>
  
    <?php
    
    require_once('testajax.php');

    function update($id, $quantity) {
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i][0] === $id) {
                $_SESSION['cart'][$i][5] = $quantity;
            }
        }
    }
    
    function showgiohang() {
        if(isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $key => $value){
                for($i=0;$i<count($_SESSION['cart'][$key]['quantity']);$i++){
                    if (isset($_SESSION['cart'][$key]['idsp'][$i]) and $_SESSION['cart'][$key]['idsp'][$i] != null) { 
                        $cart="notEmpty";
                    }    
                } 
            }
        }
        $cart = ""; // Khai báo biến $cart với giá trị mặc định là chuỗi rỗng
    if (isset($_SESSION['cart'])) {
        $cart = "notEmpty"; // Gán giá trị cho biến $cart nếu giỏ hàng của bạn không rỗng
    }
        if ($cart==="notEmpty"){
            if (isset($_SESSION['cart'])) {
                ?><div class='detail-cart'> <?php
                foreach ($_SESSION['cart'] as $key => $value) {
                    for ($i = 0; $i < count($_SESSION['cart'][$key]['quantity']); $i++) {
                        if (isset($_SESSION['cart'][$key]['size'][$i])) {
                            if ($_SESSION['cart'][$key]['idsp'][$i] == null) {     
                                } 
                                else {
        ?>
                                             <div class='table-row'>

                                                <div class="col col-2"><img src="../images/<?php echo $_SESSION['cart'][$key]['image'][$i] ?>" alt="alt"/> </div>
                                                <div class="col col-3"><p><?php echo $_SESSION['cart'][$key]['name'][$i] ?> </p></div>
                                                <div class="col col-4"> <?php echo $_SESSION['cart'][$key]['size'][$i] ?> </div>
                                                <div class="col col-5">
                                                    <div>
                                                        <p class='quantity-down' onClick="down(<?php echo $_SESSION['cart'][$key]['idsp'][$i] ?>,<?php echo $i ?>);">-</p>
                                                        <input type='number' disabled value='<?php echo $_SESSION['cart'][$key]['quantity'][$i] ?>' >
                                                        <p class='quantity-up' onClick="up(<?php echo $_SESSION['cart'][$key]['idsp'][$i] ?>,<?php echo $i ?>);">+</p>
                                                    </div>
                                                </div>
                                                <div class="col col-6"><?php echo number_format($_SESSION['cart'][$key]['price'][$i], 0, ",", ".") . " VNĐ" ?></div>
                                                <div class="col col-7"><?php echo number_format($_SESSION['cart'][$key]['tongtien'][$i], 0, ",", ".") . " VNĐ" ?></div>
                                                <div class="col col-8"><i class="fa-solid fa-trash-can" onclick="delete_from_cart(<?php echo $_SESSION['cart'][$key]['idsp'][$i]?>,<?php echo $i ?>);"></i></div>
                                           </div>
                            <?php
                            }
                        }
                    }
                }
            } 
        }
        else if($cart!=="notEmpty"){?><div class='empty-cart'><img  src='../images/empty-cart.webp' alt='alt'></div><?php
        }
        else if(!isset($_SESSION['cart'])){
                        ?>
        <div class='empty-cart'><img  src='../images/empty-cart.webp' alt='alt'></div>
            <?php
        }
            ?>
                </div>
                
        <?php if (isset($_SESSION['cart'])&&$cart==="notEmpty") { ?>
                    <div class='table-footer'>
                        <div class='col col-1' id='delete-cart'>Xoá đơn hàng</div>            
                        <div class='col col-2'>Thành tiền: <?php echo number_format($_SESSION['tonghoadon'][0], 0, ",", ".") . " VNĐ" ?></div></div>
        <?php } ?>

        <?php
    }
 
        ?>   
          
                  
  
    
     