<?php

session_start();
include '../DBConnect.php';	


if(isset($_POST['action'])){ 
        
	$product_id  = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    switch($_POST['action']){
        case 'add':
            if(isset($_SESSION['cart'][$product_id])){
                if($quantity == 1)          
                    $_SESSION['cart'][$product_id]['quantity']++;
                else
                   $_SESSION['cart'][$product_id]['quantity'] += $quantity;
            }
                
            else{                  
                $sql = "SELECT P.*, C.Category_Name
                        FROM product P, category C
                        WHERE P.Category_Id = C.Category_Id AND P.Product_Id = '$product_id'";                
                $result = LoadData($sql);                  
                $product = array(
                    'category_id' => $result[0]["Category_Id"],
                    'category_name' => $result[0]["Category_Name"],
                    'name' => $result[0]["Name"],
                    'author' => $result[0]["Author"],
                    'price' => $result[0]["Price"],
                    'avatar' => $result[0]["Avatar"],
                    'quantity' => 1,
                );              
                   
                $_SESSION['cart'][$product_id] = $product;
            }
        break;

        case 'remove':
            if(isset($_SESSION['cart'][$product_id])){
                unset($_SESSION['cart'][$product_id]);                 
            }
            break;
    }      
}	
			
$dsSanPham_DropDown = '';
$dsSanPham = '';
$dsSanPham_ThanhToan = '';
$tongtien = 0;

if(isset($_SESSION['cart']))
{
    foreach ($_SESSION['cart'] as $key => $value) 
    {																													
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


        $dsSanPham .= '
        <tr class="chiTietSP">
	        <td>
                <a href="index.php?page=ChiTiet&id=' . $key . '">
                    <img src="' . $value['avatar'] . '" class="img-thumbnail">
                </a>
	        </td>

            <td>
            
                <p style="color: #999;">'
                    . $value['category_name'] .
                '</p>
                <p style="display: none" class="product_id" >' . $key . '</p>
                <a href="index.php?page=ChiTiet&id=' . $key . '"
                    style="font-size: large;">'
                    . $value['name'] .
                '</a>
                <p style="color: #999;">'
                    . $value['author'] .
                '</p>
	        </td>

            <td>
                <div class="input-number">
                    <input type="number" value="' . $value['quantity'] . '">
                    <span class="qty-up">+</span>
                    <span class="qty-down">-</span>
                </div>
            </td>

            <td class="text-center">
                <div class="price-wrap">
                    <var class="price">'
                        . number_format($value['price'], 0, '.', '.') . '₫' .
                    '</var>
                </div>
            </td>

            <td class="text-center">
                <strong class="tongTien1SP">'
                    . number_format($value['price'] * $value['quantity'], 0, '.', '.') . '₫' . 
                '</strong>
            </td>

            <td class="text-right">
                <a href="#" onclick="cartAction(\'remove\', \'' . $key .  '\')">
                    <span>
                        <svg fill="red" ; width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke="red" stroke-width="1.06" d="M16,16 L4,4"></path>
                            <path fill="none" stroke="red" stroke-width="1.06" d="M16,4 L4,16"></path>
                        </svg>
                    </span>
                </a>
            </td>
        </tr>';


        $tongtien += $value['price'] * $value['quantity'];
    }

    $_SESSION['subTotal'] = $tongtien;
}

$slSanPham = count($_SESSION['cart']);

$data = array('productsDropDown' => $dsSanPham_DropDown, 
              'products' => $dsSanPham,
              'subtotal' => number_format($tongtien, 0, '.', '.'),
              'qty' => $slSanPham,
            );
echo json_encode($data);

?>