<?php
    session_start();
    include '../DBConnect.php';

    include '../Exception.php';
    include '../PHPMailer.php';
    include '../OAuth.php';
    include '../POP3.php';
    include '../SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function Send_Mail($to,$subject,$body)
    {       
        $from       = "Admin@ebook.com";
        $mail       = new PHPMailer();
        //$mail->SMTPDebug = 2;
        $mail->IsSMTP(true);            // use SMTP
        $mail->IsHTML(true);
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Host       = "smtp.gmail.com"; // SMTP host
        $mail->Port       =  465;                // set the SMTP port
        $mail->Username   = "minhhuy243@gmail.com";  // SMTP  username
        $mail->Password   = "mftxnlwhxsfolwhf";  // SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->CharSet = 'UTF-8';
        $mail->SetFrom($from, 'Admin@ebook.com');
        $mail->AddReplyTo($from,'Admin@ebook.com');
        $mail->Subject    = $subject;
        $mail->MsgHTML($body);
        $address = $to;
        $mail->AddAddress($address, $to);
        if($mail->Send())
            return true;
        else
            return false;
    }

    //if(isset($_POST['register'])){

        $email = $_POST['email'];

        #Kiểm tra Email đã tồn tại hay chưa
        $sql = "SELECT * FROM user WHERE Email = '$email'";
        $result = LoadData($sql);

        if(count($result) > 0){
            header('Location: ../index.php?page=DangKy&error=TaiKhoanTonTai');
        }
        else{
            #Kiểm tra xem Email đã được xác minh hay chưa
            $sql = "SELECT * FROM user WHERE Email = '$email' AND Verified = '0'";
            $result = LoadData($sql);
            if(count($result) > 0){
                header('Location: ../index.php?page=DangKy&error=TaiKhoanChuaXacMinh');
            }
            else{
                $password = $_POST['password'];
                $password= md5($password);
                $last_name = $_POST['last-name'];
                $first_name = $_POST['first-name'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $verificationCode = md5(uniqid($email, true));
                $verificationLink = "http://localhost/ebook/index.php?page=XacMinh&email=$email&code=$verificationCode";
                
                $body = "";
                $body .= "Chào mừng " . $last_name . " " . $first_name . " đã đến với EBook! <br><br>";
                $body .= "Vui lòng nhấp vào <a href='$verificationLink' target=_blank>đây</a> để xác minh tài khoản của bạn.<br><br>";
                $body .= "Cảm ơn bạn đã chọn lựa chúng tôi,<br>";
                $body .= "EBook Team.";
                
                $subject = "[EBook] - Xác minh tài khoản";

                if(Send_Mail($email, $subject, $body) == true)
                {
                    $sql = "INSERT INTO user (User_Role, Email, Password, Last_Name, First_Name, Address, Phonenumber, Verification_Code, Verified)
                        VALUES (0, '$email', '$password', '$last_name', '$first_name', '$address', '$phone', '$verificationCode', 0)";
                    $result = Insert($sql);

                    if($result == true)
                        header('Location: ../index.php?page=ThongBao&message=DangKyThanhCong');  
                    else
                        header('Location: ../index.php?page=ThongBao&message=LoiDangKy');  
                }
                else{
                    header('Location: ../index.php?page=ThongBao&message=LoiGuiMail');  
                }
            }            
        }
    //}
?>