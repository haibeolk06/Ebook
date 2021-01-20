<?php
    #nếu như từ ở trang thanh toán thì thêm frompage=ThanhToan, sau đó GET ở dưới để chuyển hướng
    session_start();
    include '..\DBConnect.php';	

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!$username || !$password) {
            header('Location: ../index.php?page=DangNhap&error=txbRong');
        }

        $password=md5($password);

        $sql="SELECT * FROM user WHERE Email='$username'";
        $result = LoadData($sql);

        if(count($result) > 0){
            if($result[0]['Verified'] == 0){
                header('Location: ../index.php?page=DangNhap&error=ChuaXacMinh');  
            }
            else{
                if($result[0]['Password'] == $password){
                    $_SESSION["display_name"] = $result[0]['Last_Name'];
                    $_SESSION["email"] = $result[0]['Email'];
                    $_SESSION["role"] = $result[0]['User_Role'];
                    header('Location: ../index.php');                
                }
                else{
                    header('Location: ../index.php?page=DangNhap&error=SaiMatKhau');        
                }
            }                     
        }
        else{         
            header('Location: ../index.php?page=DangNhap&error=ChuaTonTai');
        }
    }
?>