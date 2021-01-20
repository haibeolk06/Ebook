<?php

session_start();
include '..\DBConnect.php';	

//if(isset($_POST['view'])){

    if(isset($_POST['ds_LoaiSach'])){ 
        
        $ds_LoaiSach = $_POST['ds_LoaiSach'];

        foreach ($ds_LoaiSach as $value) {
            #Kiểm tra nếu chưa tồn tại loại sách đó trong SESSION thì thêm vào
            if(!isset($_SESSION['ds_LoaiSach'][$value]))
                    $_SESSION['ds_LoaiSach'][$value] = array('category_id' => $value);
        }        
    }
    
    if(isset($_POST['ds_NXB'])){ 
        
        $ds_NXB = $_POST['ds_NXB'];

        foreach ($ds_NXB as $value) {
            #Kiểm tra nếu chưa tồn tại NXB đó trong SESSION thì thêm vào
            if(!isset($_SESSION['ds_NXB'][$value]))
                    $_SESSION['ds_NXB'][$value] = array('publishing_company_id' => $value);
        }      
    }

    if(isset($_POST['dsUncheck_LoaiSach'])){
        
        $dsUncheck_LoaiSach = $_POST['dsUncheck_LoaiSach'];
        foreach ($dsUncheck_LoaiSach as $value) {
            if(array_key_exists($value, $_SESSION['ds_LoaiSach'])){
                    unset($_SESSION['ds_LoaiSach'][$value]);
            }
        }
        if(count($_SESSION['ds_LoaiSach']) == 0)
            unset($_SESSION['ds_LoaiSach']);
    }

    if(isset($_POST['dsUnCheck_NXB'])){
        
        $dsUnCheck_NXB = $_POST['dsUnCheck_NXB'];
        foreach ($dsUnCheck_NXB as $value) {
            if(array_key_exists($value, $_SESSION['ds_NXB'])){
                    unset($_SESSION['ds_NXB'][$value]);
            }
        }
        if(count($_SESSION['ds_NXB']) == 0)
            unset($_SESSION['ds_NXB']);
    }
    

    include './pages-handle/xlHienThiSanPham.php';  
//}
?>