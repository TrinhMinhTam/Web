<?php
    if(isset($_REQUEST['kieuthongke'])){
        switch($_REQUEST['kieuthongke']){
            case "tk_banchay":{
                include_once 'thongkespbanchay.php';
                break;
            }
            case "tk_theoloai":{
                include_once 'thongkeloaisanpham.php';
                break;
            }
            case "tk_tatca":{
                include_once 'thongketatca.php';
                break;
            }
        }
        
    }
?>