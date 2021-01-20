<?php
	session_start();
	include 'DBConnect.php';	
?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>EBook - Mua sách trực tuyến</title>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<link rel="shortcut icon" href="images/ebook-logo.ico">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		
    </head>
	
	<body>
	
		
		<?php include 'inc/header.php' ?>
		
		<?php
			if(isset($_GET["page"]))
				$page = $_GET["page"];
			else
				$page = "Index";
					
				switch($page)
				{
					case "Index":
						include('pages/pIndex.php');
						break;
					case "SanPham":
						include('pages/pSanPham.php');
						break;
					case "ChiTiet":
						include('pages/pChiTiet.php');
						break;
					case "GioHang":
						include('pages/pGioHang.php');
						break;
					case "DangNhap":
						include('pages/pDangNhap.php');
						break;
					case "DangKy":
						include('pages/pDangKy.php');
						break;
					case "QuanLy":
						include('pages/pQuanLy.php');
						break;
					case "XacMinh":
						include('pages/pXacMinh.php');
						break;
					case "ThongBao":
						include('pages/pThongBao.php');
						break;
					case "ThanhToan":
						include('pages/pThanhToan.php');
						break;								
					default:
						include('pages/pIndex.php');
						break;
				}
				
			?>		
		

		
		<?php include 'inc/footer.php' ?>

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		
		<script>
			window.onscroll = function() {myFunction()};

			var header = document.getElementById("header");

			var sticky = header.offsetTop;

			function myFunction() {
				if (window.pageYOffset > sticky) {
					header.classList.add("sticky");
				} else {
					header.classList.remove("sticky");
				}		
			}			
		</script>
		
		<!-- Xử lý chức năng tìm kiếm (dùng để lấy keyword) -->
		<script>
    		$("#submitFrmSearch").click(function(e){
				e.preventDefault();
				var contentSearch = $('#contentSearch').val();
				if(contentSearch !== ""){
					$('#frmSearch').attr('action', 'index.php?page=SanPham&view=search&q=' + contentSearch).submit();
				}     
			});
		</script>

		<!-- Xử lý filter CheckBox -->
		<script>
			var ds_LoaiSach = [];
			var dsUncheck_LoaiSach = [];
			var ds_NXB = [];
			var dsUnCheck_NXB = [];
			$("input[type='checkbox']").click(function() { 
				
				//Lấy danh sách 'loại sách' được checked
				$("#loaiSach input[type='checkbox']:checked").each(function () {
					ds_LoaiSach.push($(this).val());
				});

				//Lấy danh sách 'nhà xuất bản' được checked
				$("#nhaXuatBan input[type='checkbox']:checked").each(function () {
					ds_NXB.push($(this).val());
				});

				//Lấy danh sách 'loại sách' uncheck
				$("#loaiSach input[type='checkbox']:not(:checked)").each(function () {
					dsUncheck_LoaiSach.push($(this).val());
				});

				//Lấy danh sách 'nhà xuất bản' uncheck
				$("#nhaXuatBan input[type='checkbox']:not(:checked)").each(function () {
					dsUnCheck_NXB.push($(this).val());
				});
				
				//if (ds_LoaiSach.length != 0 || ds_NXB.length != 0){

					$.ajax({
						url: "pages-handle/xlLocSanPham.php",
						method: "POST",
						data: {
							ds_LoaiSach: ds_LoaiSach,
							dsUncheck_LoaiSach: dsUncheck_LoaiSach,
							ds_NXB: ds_NXB,
							dsUnCheck_NXB: dsUnCheck_NXB,
						},
						dataType: "html",	
						success: function(data){
							window.location.assign("index.php?page=SanPham&view=filter&cur_page=1");
						},
						error: function (xhr, ajaxOptions, thrownError) {
								console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
						},	
					});	
				//}
				
				
			});
		</script>

		<!-- Xử lý tăng số lượng SP trong Giỏ Hàng -->
		<script>
		
			// $("#gioHang").on('change, click', '.chiTietSP', function() {
			
			// 	var up = $(this).find('.input-number .qty-up');
			// 	var down = $(this).find('.input-number .qty-down');
			// 	var inputNumber = $(this).find('.input-number input[type="number"]');
			// 	console.log(inputNumber.val());
			// 	up.one('click', function () {
			// 		var value = parseInt(inputNumber.val()) + 1;
			// 		inputNumber.val(value);
			// 		inputNumber.change();
			// 		console.log(value);		
			// 	});

			// 	down.one('click', function () {
			// 		var value = parseInt(inputNumber.val()) + 1;
			// 		value = value < 1 ? 1 : value;
			// 		inputNumber.val(value);
			// 		inputNumber.change();
			// 		console.log(value);		
			// 	});


			// 	var soLuong = parseInt($(this).find(".input-number input[type='number']").val());				
			// 	var maSP = $(this).find(".product_id").text();
			// 	var tongTien = $(this).find(".tongTien1SP");

			// 	$.ajax({
			// 			url: "pages-handle/xlTangSoLuongSP.php",
			// 			method: "POST",
			// 			data: {
			// 				maSP: maSP,
			// 				soLuong: soLuong,
			// 			},
			// 			dataType: "json",
			// 			success: function(data){
			// 				data.tongTien1SP = new Intl.NumberFormat('de-DE').format(data.tongTien1SP);
			// 				data.tongTien = new Intl.NumberFormat('de-DE').format(data.tongTien);
			// 				tongTien.html(data.tongTien1SP + '₫');				
			// 				$("#tamTinh-GioHang").html(data.tongTien + '₫');
			// 				$("#tongTien-GioHang").html(data.tongTien + '₫');
			// 				$("#dsSanPham-DropDown").html(data.productsDropDown);
			// 			},
			// 			error: function (xhr, ajaxOptions, thrownError) {
			// 					console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			// 			},	
			// 	});							
			// });

		</script>

		<!-- Xử lý chức năng Đăng Ký -->
		<script>

			$("#submitFrmDK").on("click", function(e) {
				e.preventDefault();
				var siteKey = grecaptcha.getResponse();
				if(siteKey === ""){
					$('#message-error').html('Vui lòng nhập Captcha');		
				}
				else{
					$.ajax({
						url: "pages-handle/xlCaptcha.php",
						method: "POST",					
						data: {
							grecaptcharesponse: grecaptcha.getResponse(),
						},
						success: function(response) {						
							if(response === "Thành công"){
								var result = validateFormDangKy();

								if(result == true){
									$("#frmDangKy").submit();
								}
								else{
									$('#message-error').html('Dữ liệu bạn nhập chưa hợp lệ !');
								}												
							}
							else{
								$('#message-error').html(response);	
							}
						},
						error: function (xhr, ajaxOptions, thrownError) {
							console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
						},
					});
				}
				
			});
			
		</script>

		<script>
			$('#password, #confirm-password').on('keyup', function() {
				var password = $('#password').val();
				var confirm_password = $('#confirm-password').val();

				if(password != confirm_password){
					$('#confirm-password').css('border-color', "red");
				}
				else{
					$('#confirm-password').css('border-color', "green");
				}
			});
		</script>

		<script>
			$('#username, #passwordLogin').on('keyup', function() {
				var username = $('#username').val();
				var password = $('#passwordLogin').val();

				if(username == ""){
					$('#username').css('border-color', "red");
				}
				if(password == ""){
					$('#passwordLogin').css('border-color', "red");
				}
				if(username != ""){
					$('#username').css('border-color', "");
				}
				if(password != ""){
					$('#passwordLogin').css('border-color', "");
				}
			});
		</script>
		
	</body>
</html>
