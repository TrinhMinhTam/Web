<!DOCTYPE html> 
<html>
        <meta charset="UTF-8">
        <title>JEWELRY STORE</title>
        <link href='../css/css.css' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/8f58aae133.js" crossorigin="anonymous"></script>
        
    <body>
<div id="form">
<form action="xulydn.php" method="POST" id="login-form">
    <div id="form-dang-nhap">
    <p class="login">ĐĂNG NHẬP</p>
    <div class="tendangnhap">
	    <input type="text" id="tendangnhap" name="tendangnhap" placeholder="Tên tài khoản" required>
    </div>
    <div class="password">
        <input type="password" id="password" name="matkhau" placeholder="Mật khẩu" required>
    </div>
    <span id="check-login"></span>
	<input type="submit" value="Đăng nhập">
    <div class="register"><p>Bạn chưa có tài khoản? <a href="dangky.php">ĐĂNG KÝ</a></div>
        </div>

</form>
</div>
        </body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
            $("#login-form").submit(function (event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'xulydn.php',
                    data: $(this).serializeArray(),
                    success: function (response) {
                        response = JSON.parse(response);
                        if(response.status == 0){ //Đăng nhập lỗi
                            alert(response.message);
                        }else if(response.status == 1){ 
                            alert(response.message);
                            $(location).attr('href','test.php');
                        }
                        else{
                            alert(response.message);
                            $(location).attr('href','../admin/giaodien/index.php');
                        } 
                    }
                });
            });
</script>
