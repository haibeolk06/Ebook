<?php 

    if(isset($_GET['message'])){
        if($_GET['message'] === "XacMinhThanhCong"){
            echo '<h2 class="notification-success"> BẠN ĐÃ XÁC MINH TÀI KHOẢN THÀNH CÔNG </h2>';
        }
        elseif($_GET['message'] == "XacMinhThatBai"){
            echo '<h2 class="error"> XÁC MINH TÀI KHOẢN THẤT BẠI </h2>';
        }
        elseif($_GET['message'] == "LoiDangKy" || $_GET['message'] == "LoiGuiMail"){
            echo '<h2 class="error"> ĐÃ XẢY RA LỖI TRONG QUÁ TRÌNH ĐĂNG KÝ </h2>';
        }
        elseif($_GET['message'] === "ThanhToanThanhCong"){
            echo '<h2 class="notification-success"> BẠN ĐÃ THANH TOÁN ĐƠN HÀNG THÀNH CÔNG </h2>';
        }
    }

?>