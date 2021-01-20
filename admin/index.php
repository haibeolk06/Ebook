<!-- <?php
	session_start();
	include("../DBConnect.php");
	
	//Kiểm tra có đăng nhập với quyền Admin chưa?
	if(isset($_SESSION["User_Id"]) != true)
		DataProvider::ChangeURL('login.php');
	if($_SESSION["MaLoaiTaiKhoan"] != 0)
		DataProvider::ChangeURL('login.php?error=3');
		
	//Đã đăng nhập thành công với quyền Admin rồi
?>  -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ebook - Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\ebook-logo.ico">

        <!-- plugin css -->
        <link href="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\css.css" rel="stylesheet" type="text/css">
       

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <!-- Begin page -->
        <div id="wrapper">
            <div>
                <?php 
                    if(isset($_REQUEST["act"]) == true)
                        $act = $_REQUEST["act"];
                    else
                        $act = 1;
                        include("inc/menu.php")
                ?>
            </div>

            <div id="content">
        	<?php
				if(isset($_GET['act']) == false)
					$act = 1;
				else
					$act = $_GET['act'];
				
				switch($act)
				{
					case 1: //QL Tai Khoan
						include('pages/account/pIndex.php');
						break;	
					case 2: //QL NXB
						include('pages/publisher/pIndex.php');
						break;
					case 3: //QL LoaiSanPham
						include('pages/category/pIndex.php');
                        break;
                    case 4: //QL SanPham
						include('pages/product/pIndex.php');
                        break;
                    case 5: //QL LoaiSanPham
						include('pages/purchase/pIndex.php');
                        break;
				}
			?>
        </div>

    
        </div>
        <!-- END wrapper  -->

        
        <!-- Vendor js -->
        <script src="assets\js\vendor.min.js"></script>

        <!-- Third Party js-->
        <script src="assets\libs\peity\jquery.peity.min.js"></script>
        <script src="assets\libs\apexcharts\apexcharts.min.js"></script>
        <script src="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets\libs\jquery-vectormap\jquery-jvectormap-us-merc-en.js"></script>

        <!-- Dashboard init -->
        <script src="assets\js\pages\dashboard-1.init.js"></script>

        <!-- App js -->
        <script src="assets\js\app.min.js"></script>
        
    </body>
</html>