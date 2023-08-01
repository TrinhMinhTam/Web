<?php
   session_start();
   if(isset($_SESSION['tendangnhap'])){
        session_destroy();
   }
    header("location:../../pages/test.php");
?>
