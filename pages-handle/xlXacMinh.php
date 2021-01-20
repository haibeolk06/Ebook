<?php
    //session_start();
    //include './DBConnect.php';
    $email = $_GET['email'];
    $verification_code = $_GET['code'];
    $sql = "SELECT * FROM user WHERE Email = '$email' AND Verification_Code = '$verification_code'";
    $result = LoadData($sql);

    if(count($result) > 0){
        if($result[0]['Verification_Code'] == $verification_code){          
            $sql = "UPDATE user SET Verified = '1' WHERE Verification_Code = '$verification_code'";
            $result = Insert($sql);
            if($result == true){
                echo '<h2 class="notification-success"> BẠN ĐÃ XÁC MINH TÀI KHOẢN THÀNH CÔNG </h2>';  
            }
            else{
                echo '<h2 class="notification-error"> XÁC MINH TÀI KHOẢN THẤT BẠI </h2>';
            }
        }
    }
?>