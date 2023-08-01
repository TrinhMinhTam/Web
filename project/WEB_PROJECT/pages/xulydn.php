<?php
   
    session_start();
?>
<?php
    require_once 'connect.php';
    if (isset($_POST['tendangnhap']) && !empty($_POST['tendangnhap']) && isset($_POST['matkhau']) && !empty($_POST['matkhau'])) {

        $username=$_POST['tendangnhap'];
        $pass=$_POST['matkhau'];

        $result = mysqli_query($con,"SELECT * from taikhoan,thongtintaikhoan where
        taikhoan.Id_tk=thongtintaikhoan.Id_tk  and tendangnhap ='$username' and matkhau ='$pass'");
    
        if(mysqli_num_rows($result)>0)
        {
            $row=mysqli_fetch_array($result);
            $_SESSION['tendangnhap']=$username;
            $_SESSION['matkhau']=$pass;
            $name=$row['Hoten'];
            $role=$row['Id_role'];
            $tk=$row['Id_tk'];
            $_SESSION['tk']=$tk;
            $_SESSION['name']=$name;
            $_SESSION['role']=$role;
            if($_SESSION['role']=='RL100'){
            echo json_encode(array(
                'status' => 1,
                'message' => 'Đăng nhập thành công'
            ));
            }
            else{
                echo json_encode(array(
                    'status' => 2,
                    'message' => 'Đăng nhập thành công'
                )); 
            }
        }
        else
        {
            echo json_encode(array(
                'status' => 0,
                'message' => 'Thông tin tài khoản không đúng'
            ));
            exit;
        }
    } 
    else {
        echo json_encode(array(
            'status' => 0,
            'message' => 'Thông tin sai'
    ));
    exit;
    }


?>
