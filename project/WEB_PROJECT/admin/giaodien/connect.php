<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname ="WEB_1";
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if($con){
    mysqli_query($con,"set names 'utf8'");   
}
else
{
    echo "Thất bại".mysqli_connect_error();
}

?>
