<?php
//session_start();  
//unset($_SESSION['tendangnhap']);
//unset($_SESSION['tk']);
//unset($_SESSION['role']);
//unset($_SESSION['name']);
?>
<?php
    if(!isset($_SESSION['tendangnhap'])){ ?>
        <div class="clearfix">
        <nav class="navigation">
            <div class="header-first_name">
                <ul class="nav">
                    <li class="nav-list">
                        <div class="nav-account">
                            <a>TÀI KHOẢN</a>
                            <ul class="nav-user_menu">
                                <li class="nav-user_menu-item"><a href="dangky.php">Đăng ký</a></li>
                                <li class="nav-user_menu-item"><a href="login.php">Đăng nhập</a></li>                                
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header-secon">
        <!--thanh tìm kiếm-->
        <div class="grid">
            <div class="header-secon_seach">
                <div class="header__with__search">
                    <div class="header__logo">
                        <div class="logo">
                            <a href=""><img src="../assets/img/logo.png" alt=""></a>
                        </div>
                    </div>
                     <div class="header__search">
                         <input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm...">
                                <div class='search-result'>
                                   
                                 </div>
                             <button class="header__search-btn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                             </button>
                    </div>
                    <div class="header__cart-wrap1">
                        <div class="header__cart">
                            <div class="header__cart-wrap">
                                <a href='cart.php'><i class="fa-solid fa-cart-shopping"></i></a>
                                <?php if(isset ($_SESSION['cart'])){
                                       $empty=true;
                                       for($i=0 ; $i<$_SESSION['cart'];$i++){
                                           
                                       }
                                }
?>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php } 
    else
    { 
    if($_SESSION['tendangnhap']=='session'){ ?>
    <div class="clearfix">
        <nav class="navigation">
            <div class="header-first_name">
                <ul class="nav">
                    <li class="nav-list">
                        <div class="nav-account">
                            <a><?php echo "TÀI KHOẢN "?></a>
                            <ul class="nav-user_menu">
                                <li class="nav-user_menu-item"><a href="login.php">Đăng nhập</a></li>
                                <li class="nav-user_menu-item"><a href="dangky.php">Đăng ký</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <?php } 
    else { ?>
    <div class="clearfix">
        <nav class="navigation">
            <div class="header-first_name">
                <ul class="nav">
                    <li class="nav-list">
                        <?php if(isset($_SESSION['tendangnhap']) && $_SESSION['tendangnhap']!=' '){ ?>
                        <div class="nav-account">
                            <a><?php echo $_SESSION['tendangnhap']?></a>
                            <ul class="nav-user_menu">
                                <li class="nav-user_menu-item"><a href="logout.php">Đăng xuất</a></li>
                                <li class="nav-user_menu-item"><a href="../admin/giaodien/index.php">Thông tin</a></li>
                            </ul>
                        </div>
                        <?php }else{ ?>
                        <div class="nav-account">
                            <a><?php echo $_SESSION['tendangnhap']?></a>
                            <ul class="nav-user_menu">
                                <li class="nav-user_menu-item"><a href="logout.php">Đăng xuất</a></li>
                                <li class="nav-user_menu-item"><a href="../admin/giaodien/index.php">Thông tin</a></li>
                            </ul>
                        </div>
                        <?php }?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<?php } ?>
    <div class="header-secon">
        <!--thanh tìm kiếm-->
        <div class="grid">
            <div class="header-secon_seach">
                <div class="header__with__search">
                    <div class="header__logo">
                        <div class="logo">
                            <a href=""><img src="../assets/img/logo.png" alt=""></a>
                        </div>
                    </div>
                     <div class="header__search">
                         <input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm...">
                                <div class='search-result'>
                                   
                                 </div>
                             <button class="header__search-btn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                             </button>
                    </div>
                    <div class="header__cart-wrap1">
                        <div class="header__cart">
                            <div class="header__cart-wrap">
                                <a href='cart.php'><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php } ?>
