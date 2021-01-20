<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row justify-content-center">

			<div class="col-md text-center">
				<!-- Billing Details -->
				<div class="billing-details">

					<div class="section-title">
						<h3 class="title">Đăng nhập</h3>
					</div>
					
					<?php
						if(isset($_GET["error"]))
						{		
							if($_GET["error"] == "ChuaXacMinh")					
								echo '<p class="errorMessage"> Vui lòng kiểm tra Email của bạn để xác minh tài khoản </p>';
							elseif($_GET["error"] == "ChuaTonTai")
								echo '<p class="errorMessage"> Tài khoản không tồn tại </p>';
							elseif($_GET["error"] == "txbRong")
								echo '<p class="errorMessage"> Vui lòng nhập đầy đủ thông tin </p>';
							elseif($_GET["error"] == "SaiMatKhau")
								echo '<p class="errorMessage"> Mật khẩu chưa chính xác </p>';
						}						
					?>
					
					<form action="./pages-handle/xlDangNhap.php" method="POST">
						<div class="form-group">
							<input class="input-login" type="text" id="username" name="username" placeholder="Tên tài khoản" required>
						</div>
						
						<div class="form-group">
							<input class="input-login" type="password" id="passwordLogin" name="password" placeholder="Mật khẩu" required>
						</div>

						<button type="submit" name="login" class="primary-btn order-submit">Đăng nhập</button>
						<a href="index.php?page=DangKy">Nhấp vào đây để đăng ký tài khoản</a>
					</form>

				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->