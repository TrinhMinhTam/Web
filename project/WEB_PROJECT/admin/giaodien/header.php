
<?php
    if(isset($_SESSION['tendangnhap']) && isset($_SESSION['matkhau'])){
        if(isset($_SESSION['name'])){
            echo '<div id="back"><a href="../../pages/test.php"><i class="fa-solid fa-arrow-left"></i> TRANG CHỦ</a></div>';
            echo '
            <div id="login">
                <a href="index.php?id=h2&act=a1"><div>'.$_SESSION['name'].'</div></a>
                <a href="logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>';
        }
        else {
            echo '<div id="login">
            <a href="index.php?id=h2&act=a1"><div>'.$_SESSION['tendangnhap'].'</div></a>
            <a href="logout.php"><div>Logout</div></a>
            </div>';
        }
    }
?>
