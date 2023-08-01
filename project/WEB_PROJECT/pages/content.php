<?php
    echo'abc';
    $con= mysqli_connect("localhost","root","");   
            mysqli_query($con,"set names 'utf8'");
            mysqli_select_db($con, "WEB");
    $slq="SELECT Max(Ma_tk) FROM users";
    $result= mysqli_query($con, $slq);
    $my=mysqli_fetch_array($result);
    $a=explode("TK",$my[0]);
    $a[1]=$a[1]+1;
    echo "TK".$a[1];
                    $date=getdate();
                    $date_dathang=$date['year']."-".$date['mon']."-".$date['mday'];
               
                    $date_giaohang=$date['year']."-".$date['mon']."-".($date['mday']+3);
                    echo $date_giaohang;
 if(isset($_GET['page'])){
    switch($_GET['page']){
        case 'Products': include('ajax.php');
    }
 }