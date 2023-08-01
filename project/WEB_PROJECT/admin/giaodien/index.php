<?php
    session_start();
    if(!isset($_SESSION['tendangnhap'])){
        header("location: ../../pages/login.php");
        }
    else{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/8f58aae133.js" crossorigin="anonymous"></script>
    <title>Web </title>
</head>
<body>
    <div id="war">
    <div id="header">
    <?php   
           require_once 'header.php';
    ?>
    </div>
    </div>
    <div id="mid">
        <?php
            require_once 'leftmenu.php'
        ?> 
        <div id="content">
            <?php
                require_once 'content.php';
            ?> 
        </div>
    </div>
   
</body>
</html>
<?php }?>
