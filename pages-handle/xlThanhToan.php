<?php
    session_start();
    include '..\DBConnect.php';	

    if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['email'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        #Lấy ID của User
        $sql = "SELECT * FROM user WHERE Email = '" . $_SESSION['email'] . "'";
        $result = LoadData($sql);
        $user_id =  $result[0]['User_Id'];

        #Lấy ngày hiện tại
        $date = getdate();
        $date = $date['year'] . '/' . $date['mon'] . '/' . $date['mday'];

        #Tổng tiền đơn hàng
        $total = isset($_SESSION['subTotal']) ? $_SESSION['subTotal'] : 0;

        #Chuẩn bị câu sql để lưu đơn hàng
        $sql = "INSERT INTO purchase (User_Id, Name, DeliveryAddress, PhoneNumber, Email, CreatedAt, UpdatedAt, Total, State)
                    VALUES ($user_id, '$name', '$address', '$phone', '$email', '$date', NULL, $total, 1)";
        $result = Insert($sql);

        #Lấy ID của đơn hàng vừa thêm
        $sql = "SELECT * FROM purchase ORDER BY Purchase_Id DESC LIMIT 0,1";
        $result = LoadData($sql);
        $purchase_id = $result[0]['Purchase_Id'];

        #Lưu danh sách sản phẩm vào bảng CTDH
        foreach ($_SESSION['cart'] as $key => $value) {
            $quantity = $value['quantity'];
            $total_amount = $value['quantity'] * $value['price'];
            $sql = "INSERT INTO purchasedetail 
                        VALUES ($purchase_id, $key, $quantity, $total_amount)";
            $result = Insert($sql);

            $updateQuantitySql = "UPDATE product 
                    SET Quantity = Quantity - $quantity
                    WHERE Product_Id = $key";
            $run = Insert($updateQuantitySql);
        }
        
        unset($_SESSION['cart']);
        unset($_SESSION['subTotal']);

        header('Location: ../index.php?page=ThongBao&message=ThanhToanThanhCong');  
    }
?>