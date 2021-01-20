<?php 

    if(isset($_GET['message'])){       
        if($_GET['message'] == "LoiDangKy" || $_GET['message'] == "LoiGuiMail"){
            echo '<h2 class="notification-error"> ĐÃ XẢY RA LỖI TRONG QUÁ TRÌNH ĐĂNG KÝ </h2>';
        }
        elseif($_GET['message'] === "ThanhToanThanhCong"){
            echo '<h2 class="notification-success"> BẠN ĐÃ THANH TOÁN ĐƠN HÀNG THÀNH CÔNG </h2>';
        }
        elseif($_GET['message'] === "DangKyThanhCong"){
            echo '<h2 class="notification-success"> BẠN ĐÃ ĐĂNG KÝ TÀI KHOẢN THÀNH CÔNG </h2>
                <h4 class="notification-success" style="margin-top: -40px;"> Vui lòng kiểm tra Email để xác minh tài khoản </h4>';
        }
    }

?>