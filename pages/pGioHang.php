<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">		
		
		<div class="row">
			<?php 
				if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0 )
					echo '<h2 class="notification-error"> BẠN CHƯA CÓ SẢN PHẨM NÀO TRONG GIỎ HÀNG </h2>';
				else{						
			?>
			<div class="col-md-9">

				<div class="section-title">
					<h3 class="title">Giỏ hàng</h3>
				</div>
					
				<div class="card">
					<table class="table table-hover">
						<thead class="text-muted">
							<tr>
								<th scope="col" colspan="2" class="text-center">Sản phẩm</th>
								<th scope="col" width="100" class="text-center">Số lượng</th>
								<th scope="col" width="120" class="text-center">Đơn giá</th>
								<th scope="col" width="120" class="text-center">Tổng</th>
								<th scope="col" class="text-center"></th>
							</tr>
						</thead>

						<tbody id="gioHang">

						<?php
							if(isset($_SESSION['cart'])){
								foreach ($_SESSION['cart'] as $key => $value){											
									include './templates/mauSanPham-pGioHang.php';				
								}
							} 
						?>
						
						</tbody>
						
					</table>
				</div>

			</div>

			<!-- Chi tiết đơn hàng -->
			<div class="col-md-3 order-details" style="margin-top: 80px">

				<div class="order-summary">
					<div class="order-col">
						<div><strong>Tạm tính</strong></div>
						<div id = "tamTinh-GioHang">
							<?php 
                                if(isset($_SESSION['subTotal']))
                                    echo number_format($_SESSION['subTotal'], 0, '.', '.') . ' ₫';                                                                                    
							?> 
						</div>
					</div>

					<div class="order-col">
						<div><strong>Phí vận chuyển</strong></div>
						<div>Miễn phí</div>
					</div>

					<hr style="size: 10px;">

					<div class="order-col">
						<div><strong>Tổng tiền</strong></div>
						<div><strong class="order-total" id = "tongTien-GioHang">
							<?php 
                                if(isset($_SESSION['subTotal']))
                                    echo number_format($_SESSION['subTotal'], 0, '.', '.') . ' ₫';                                                                                    
							?> </strong></div>
					</div>
				</div>

				<a href="
						<?php 
                            if(!isset($_SESSION["email"])){
                                echo './index.php?page=DangNhap';
                            } 
                            else{
                                echo './index.php?page=ThanhToan';
                            }
                        ?>">
					<span class="check-out">
						Thanh toán
					</span>
				</a>
			</div>

			<?php } ?>
		</div>
	
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->