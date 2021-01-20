<?php
    #nếu như từ ở trang thanh toán thì thêm frompage=ThanhToan, sau đó GET ở dưới để chuyển hướng
    session_start();
    include '..\DBConnect.php';	

    if(isset($_POST['login']))
    {
        $emailaddress = $_POST['emailaddress'];
        $password = $_POST['password'];

        if (!$emailaddress || !$password) {
            header('Location: ../admin/login.php?page=DangNhap&error=txbRong');
        }

        // $password=md5($password);

        $sql="SELECT * FROM user WHERE Email='$emailaddress' ";
        $result = LoadData($sql);

        if(count($result) == 1)
        {
            if($result[0]['User_Role'] == 1){
                if($result[0]['Password'] == $password)
                {
                    $_SESSION["display_name"] = $result[0]['Last_Name'];
                    $_SESSION["emailaddress"] = $result[0]['Email'];
                    header('Location: ../admin/index.php');   
                }
            }
            else 
            {
                header('Location: ../admin/login.php?page=DangNhap&error=notadmin');
            }            
            // header('Location: ../admin/index.php');

        } 
        else{           
            
             header('Location: ../admin/login.php?page=DangNhap&error=ChuaTonTai');
        }
    }
?>