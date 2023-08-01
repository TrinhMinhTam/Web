<?php
    if(isset($_GET['act'])){
        if(isset($_GET['act'])&&isset($_GET['idt'])){
            require_once 'xulysl.php';
            //require_once 'chitietsp.php';
        }
        else if(isset($_GET['act'])&&isset($_GET['idg'])){
            require_once 'xulysl.php';
            //require_once 'chitietsp.php';
        }
        else if(isset($_GET['act'])&&isset($_GET['idht'])){
            require_once 'xulyht.php';
            //require_once 'chitietsp.php';
        }
        else if($_GET['act']=='addtk'){
            echo "<div class='tittle'>TÀI KHOẢN >>></div>";
            require_once 'addtk.php';
            require_once 'taikhoan.php';
        }

        else if($_GET['act']=='uptk'){
            echo "<div class='tittle'>TÀI KHOẢN >>></div>";
            require_once 'xulytk.php';
            require_once 'taikhoan.php';
            
        }

        else if($_GET['act']=='detk'){
            echo "<div class='tittle'>TÀI KHOẢN >>></div>";
            require_once 'taikhoan.php';
            require_once 'deletetk.php';
            
        }
        else if($_GET['act']=='xltl'){
            require_once 'xulytl.php';
            
        }
        else if($_GET['act']=='adtl'){
            echo "<div class='tittle'>THỂ LOẠI >>></div>";
            require_once 'addtl.php';
            require_once 'theloai.php';
        }

        else if($_GET['act']=='xldh'){
            require_once 'xulydh.php';
            //require_once '../giaodien/donhang.php';
        }
        
        else if($_GET['act']=='upkh'){
            echo "<div class='tittle'>THÔNG TIN TÀI KHOẢN >>></div>";
            require_once 'upttkh.php';
            require_once 'thongtintaikhoan.php';
        }
        else if($_GET['act']=='upttkh'){
            echo "<div class='tittle'>THÔNG TIN TÀI KHOẢN >>></div>";
            require_once 'upkh.php';
            require_once 'thongtintaikhoan.php';
        }

        // Thêm, xóa, sửa sản phẩm
        else if($_GET['act']=='ad'){
            echo "<div class='tittle'>SẢN PHẨM >>></div>";
            require_once 'xulyadd.php';
            require_once 'contentsp.php';
        }
        else if($_GET['act']=='de'){
            require_once 'xulyde.php';
        }
        else if($_GET['act']=='up'){
            echo "<div class='tittle'>SẢN PHẨM >>></div>";
            require_once 'xulyup.php';
            require_once 'contentsp.php';
        }

        else if($_GET['act']=='upquyen'){
            echo "<div class='tittle'>QUẢN LÝ QUYỀN >>></div>";
            require_once 'xulyquyen.php';
            require_once '../giaodien/contentquyen.php';
        }
        else if ($_GET['act']=='deletedh'&&isset($_GET['id'])){
            header("location: xulydeletedh.php?id=".$_GET['id']."");
        }
        //
        else if ($_GET['act']=='ctdh'){
            echo "<div class='tittle'>CHI TIẾT ĐƠN HÀNG >>></div>";
            require_once 'chitietdh.php';
        }
        else if ($_GET['act']=='dm'&&$_GET['id']=='dm100'){
            echo "<div class='tittle'>ĐƠN HÀNG >>></div>";
            require_once '../giaodien/donhang.php';
        }
        else if ($_GET['act']=='dm'&&$_GET['id']=='dm101'){
            echo "<div class='tittle'>QUẢN LÝ KHO >>></div>";
            require_once '../giaodien/chitietsp.php';
        }
        else if ($_GET['act']=='dm'&&$_GET['id']=='dm102'){
            echo "<div class='tittle'>THỂ LOẠI >>></div>";
            require_once '../giaodien/theloai.php';
        }
        else if ($_GET['act']=='dm'&&$_GET['id']=='dm103'){
            echo "<div class='tittle'>QUẢN LÝ QUYỀN >>></div>";
            require_once '../giaodien/contentquyen.php';
        }
        else if ($_GET['act']=='dm'&&$_GET['id']=='dm104'){
            echo "<div class='tittle'>SẢN PHẨM >>></div>";
            require_once '../giaodien/contentsp.php';
        }
        else if ($_GET['act']=='dm'&&$_GET['id']=='dm105'){
            echo "<div class='tittle'>TÀI KHOẢN >>></div>";
            require_once '../giaodien/taikhoan.php';
        }
        else if ($_GET['act']=='dm'&&$_GET['id']=='dm107'){
            echo "<div class='tittle'>THÔNG TIN TÀI KHOẢN >>></div>";
            require_once '../giaodien/thongtintaikhoan.php';
        }
        else if ($_GET['act']=='ld'&&$_GET['id']=='l12'){
            echo "<div class='tittle'>QUẢN LÝ NHÂN VIÊN >>></div>";
            require_once '../giaodien/qlnv.php';
        }
        else if ($_GET['act']=='dm'&&$_GET['id']=='dm109'){
            echo "<div class='tittle'>THỐNG KÊ >>></div>";
            require_once 'thongke.php';
        }
        
    }
    else{
        echo "<div> ";
    }
        
?>
