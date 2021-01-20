<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row justify-content-center">

			<div class="col-md text-center">
				
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Đăng ký</h3>
					</div>

					<?php
						if(isset($_GET["error"]))
						{				
							if($_GET["error"] == "TaiKhoanTonTai")		
								echo '<p class="errorMessage" > Tên tài khoản đã tồn tại </p>';
							elseif($_GET["error"] == "TaiKhoanChuaXacMinh")
								echo '<p class="errorMessage" > Tên tài khoản chưa được xác minh. Vui lòng kiểm tra Email </p>';
						}
												
					?>

					<form action="./pages-handle/xlDangKy.php" method="POST" id="frmDangKy">
						<div class="form-group">
							<input class="input-login" type="text" id="last-name" name="last-name" placeholder="Họ" required>
						</div>

						<div class="form-group">
							<input class="input-login" type="text" id="first-name" name="first-name" placeholder="Tên" required>
						</div>

						<div class="form-group">
							<input class="input-login" type="email" id="email" name="email" placeholder="Email" required>
						</div>
					
						<div class="form-group">
							<input class="input-login" type="text" id="address" name="address" placeholder="Địa chỉ" required>
						</div>

						<div class="form-group">
							<input class="input-login" type="number" id="phone" name="phone" placeholder="Số điện thoại" required>
						</div>						

						<div class="form-group">
							<input class="input-login" type="password" id="password" name="password" placeholder="Mật khẩu" required>
						</div>

						<div class="form-group">
							<input class="input-login" type="password" id="confirm-password" name="confirm-password" placeholder="Nhập lại mật khẩu" required>
							<span id='messagePassword'></span>
						</div>

						<p class="errorMessage" id="message-error"> </p>
						<div class="g-recaptcha" data-sitekey="6LdctyUaAAAAABmvABiZXkKfBU_OScZLrk1hdpEs" style="width: 340px; padding: 15px 15px; margin: auto;"></div>
						
						<button type="submit" name="submitFrmDK" id="submitFrmDK" class="primary-btn order-submit">Đăng Ký</button>
					</form>
				</div>

			</div>
		
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>