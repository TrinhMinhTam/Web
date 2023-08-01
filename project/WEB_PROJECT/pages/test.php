<?php
    session_start();
    if(!isset($_SESSION['tendangnhap'])){
        $_SESSION['tendangnhap']='session';
    }
    include('connect.php');
    include('testajax.php');
    
?>
<!DOCTYPE html>
<head>
    <link href='../css/css.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/8f58aae133.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP THỜI TRANG</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../assets/grid.css">
    <link rel="stylesheet" href="../assets/fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">   
</head>
<body>
    
    <section class="app">
        <!--header-->
        <header>
            <?php
                require_once 'header.php';
            ?>
        </header>
    </section>    
    <div class="clearfixs">
        <div class='sort'>
                <h3><i class="fa-solid fa-indent"></i> Sản phẩm thời trang</h3>
                <ul id='brand'>
        <?php
            $sql_brand="SELECT Tentheloai FROM theloai WHERE `Hienthi`='1'";
            $result_brand= mysqli_query($con, $sql_brand);
            while($row_brand= mysqli_fetch_array($result_brand)){              
                    echo "<li data-id='$row_brand[0]' class='brand'>".strtoupper($row_brand[0])."</li>";                
            }          
                echo "<li data-id='all' class='brand' style='color:red;border-left:solid 20px red'>TOÀN BỘ</li>";         
        ?>
                </ul>
                <h3><i class="fa-solid fa-indent"></i> Lọc</h3>
                <h4 style='padding-left:15px'>Theo giá
                <select id="sort-by-price" class="sort-by-price" style='margin-left:10px;'>
                <option value="none" selected>----Sort by----</option>
                            <option value="1-500000">Dưới 500.000VNĐ</option>
                            <option value="500000-1000000">Từ 500.000 đến 1.000.000VNĐ</option>
                            <option value="1000000-2000000">Từ 1.000.000 đến 2.000.000VNĐ</option>
                            <option value="2000000-3000000">Từ 2.000.000 đến 3.000.000VNĐ</option>                          
                </select>
                </h4>
                <h3 style='padding-top:20px'><i class="fa-solid fa-indent"></i> Tìm kiếm</h3>     
                            <input type="text" name="namesp" class="searchbar" placeholder="Nhập tên sản phẩm cần tìm">    
            </div>

            <div class="product">
                    <div id="product">
                    </div>
                    <div id="page">
                    </div>    
                    <div id="product-detail">
                    </div>
                    
            </div>
        </div>
</body>
<footer style='clear:both'>
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
</footer>
<!--        PAGE               -->

    

