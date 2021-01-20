<?php 

    session_start();

    if(isset($_POST['maSP'])){
        $maSP = $_POST['maSP'];
        $soLuong = $_POST['soLuong'];
        $tongTien1SP = 0;
        $dsSanPham_DropDown = '';

        foreach ($_SESSION['cart'] as $key => $value){

            if($key == $maSP){
                #Trừ đi tổng tiền của sp lúc chưa cập nhật lại số lượng
                $_SESSION['subTotal'] -= $value['quantity'] * $value['price'];

                #Cập nhật lại số lượng của sp đó
                $value['quantity'] = $soLuong;

                #Tính lại tổng tiền của sp đó
                $tongTien1SP = $soLuong * $value['price'];

                #Thêm tổng tiền sp đó vào SESSION tạm tính
                $_SESSION['subTotal'] += $tongTien1SP;
       
            }

            $dsSanPham_DropDown .= 
                '<div class="product-widget">
                    <div class="product-img">
                        <a href="index.php?page=ChiTiet&id=' . $key . '">' .
                            '<img src="' . $value['avatar'] . '"' .  'alt="">
                        </a>
                    </div>

                    <div class="product-body">
                        <h3 class="product-name"><a href="index.php?page=ChiTiet&id=' . $key . '">' . $value['name'] . '</a></h3>
                        <h4 class="product-price"><span class="qty">'
                            . $value['quantity'] .
                            'x</span>' . number_format($value['price'], 0, '.', '.') . '</h4>
                    </div>
                    
                    <button class="delete" onclick="cartAction(\'remove\',\'' . $key . '\')" ><i class="fa fa-close"></i></button>
                </div>';
        }

        $data = array('tongTien1SP' => $tongTien1SP,
                      'tongTien' => $_SESSION['subTotal'],
                      'productsDropDown' => $dsSanPham_DropDown,
                    );
        echo json_encode($data);
    }
?>