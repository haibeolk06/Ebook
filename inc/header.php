<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +1900 0000</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> ebook@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 227 Nguyễn Văn Cừ</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> VNĐ</a></li>
                <li>
               
                <div class="dropdown">
                    <?php
                        if(isset($_SESSION['display_name']) && isset($_SESSION['email']) && isset($_SESSION["role"])){
                            if($_SESSION["role"] == 1){
                                echo '<a href="/ebook/admin">
                                <i class="fa fa-user-o"></i>'
                                . $_SESSION["display_name"] .
                                '</a>
                                <div class="dropdown-content">
                                    <a href="/ebook/admin">Trang quản lý Administrator</a>
                                    <a href="./pages-handle/xlDangXuat.php">Đăng xuất</a>
                                </div>';
                            }
                            else{
                                echo '<a href="index.php?page=QuanLy">
                                    <i class="fa fa-user-o"></i>'
                                    . $_SESSION["display_name"] .
                                    '</a>
                                    <div class="dropdown-content">
                                        <a href="index.php?page=QuanLy">Quản lý tài khoản</a>
                                        <a href="index.php?page=QuanLy&donhang">Đơn mua</a>
                                        <a href="./pages-handle/xlDangXuat.php">Đăng xuất</a>
                                    </div>';
                            }
                        }
                        else{
                            echo '<a href="index.php?page=DangNhap">
                                <i class="fa fa-user-o"></i>
                                    Tài khoản
                                </a>
                                <div class="dropdown-content">
                                    <a href="index.php?page=DangNhap">Đăng nhập</a>
                                    <a href="index.php?page=DangKy">Đăng ký</a>
                                </div>';
                        }
                    ?> 
                    <div class="dropdown">                 
                </li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="index.php" class="logo">
                            <img src="./images/logo.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form id="frmSearch" method="POST">                           
                            <input class="input" name="contentSearch" id="contentSearch" placeholder="Tìm tác phẩm, tác giả, loại sách, nhà xuất bản mong muốn ... ">
                            <button class="search-btn" id="submitFrmSearch" name="submitFrmSearch">Tìm kiếm</button>
                        </form>                       
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->
                  

                        <!-- Cart -->
                        <div class="dropdown" id="sectionGioHang-Dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ Hàng</span>
                                <div class="qty" id="slSanPham1">
                                    <?php
                                        if(isset($_SESSION['cart']))
                                            echo count($_SESSION['cart']);
                                        else
                                            echo 0;
                                    ?>
                                </div>
                            </a>


                            <div class="cart-dropdown">
                                <div id="dsSanPham-DropDown" class="cart-list">

                                <?php							
									if(isset($_SESSION['cart'])){
										foreach ($_SESSION['cart'] as $key => $value) {
											include './templates/mauSanPham-Dropdown.php';																
                                        }
                                    } 
                                 ?>

                                </div>
                                <div class="cart-summary">
                                    <small>
                                        Có 
                                        <span id="slSanPham2">
                                            <?php 
                                                if(isset($_SESSION['cart']))
                                                    echo count($_SESSION['cart']);
                                                else
                                                    echo 0;
                                            ?>
                                        </span> sản phẩm
                                    
                                    </small>
                                    <h5 style="font-size: 14px; color: #D10024;">
                                        Tạm tính:
                                        <span id="tamTinh-GioHang-DropDown"> 
                                            <?php 
                                                if(isset($_SESSION['subTotal']))
                                                    echo number_format($_SESSION['subTotal'], 0, '.', '.');                                                                                    
                                            ?> 
                                        </span>
                                    </h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="./index.php?page=GioHang">Xem giỏ hàng</a>
                                    <a href="
                                            <?php 
                                                if(!isset($_SESSION["email"])){
                                                    echo './index.php?page=DangNhap';
                                                } 
                                                else{
                                                    echo './index.php?page=ThanhToan';
                                                }
                                            ?>">
                                        Thanh toán 
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->          
        </div>

        <div id="alert-boxAdd" class="alert-box success" style="">Thêm vào giỏ hàng thành công !!!</div>
        <div id="alert-boxRemove" class="alert-box success">Xoá sản phẩm thành công !!!</div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->

    <!-- NAVIGATION -->
    <nav id="bottom-header">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul id="mainNav" class="main-nav nav navbar-nav">
                <?php
                    if(isset($_GET["page"]))
                        $page = $_GET["page"];
                    else
                        $page = "Index";
                    switch($page)
                    {
                        case "Index":
                            echo '<li class="active"><a href="index.php">Trang chủ</a></li>
                            <li><a href="index.php?page=SanPham&view=all">Sản phẩm</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Văn Học">Văn học</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Kinh Tế">Kinh tế</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Tâm Lý - Kỹ Năng Sống">Tâm lý - Kỹ năng sống</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Thiếu Nhi">Thiếu nhi</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Nuôi Dạy Con">Nuôi dạy con</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Học Ngoại Ngữ">Học ngoại ngữ</a></li>';
                            break;
                        case "SanPham":
                            echo '<li><a href="index.php">Trang chủ</a></li>';
                            if(!isset($_GET["q"])){
                                echo '<li class="active"><a href="index.php?page=SanPham&view=all">Sản phẩm</a></li>';
                                echo '<li><a href="index.php?page=SanPham&view=search&q=Văn Học">Văn học</a></li>';
                                echo '<li><a href="index.php?page=SanPham&view=search&q=Kinh Tế">Kinh tế</a></li>';
                                echo '<li><a href="index.php?page=SanPham&view=search&q=Tâm Lý">Tâm lý - Kỹ năng sống</a></li>';
                                echo '<li><a href="index.php?page=SanPham&view=search&q=Thiếu Nhi">Thiếu nhi</a></li>';
                                echo '<li><a href="index.php?page=SanPham&view=search&q=Nuôi Dạy Con">Nuôi dạy con</a></li>';
                                echo '<li><a href="index.php?page=SanPham&view=search&q=Học Ngoại Ngữ">Học ngoại ngữ</a></li>';
                            }
                                
                            else{
                                echo '<li><a href="index.php?page=SanPham&view=all">Sản phẩm</a></li>';

                                if($_GET["q"] == 'Văn Học')
                                    echo '<li class="active"><a href="index.php?page=SanPham&view=search&q=Văn Học">Văn học</a></li>';
                                else
                                    echo '<li><a href="index.php?page=SanPham&view=search&q=Văn Học">Văn học</a></li>';
                            
                                if($_GET["q"] == 'Kinh Tế')
                                    echo '<li class="active"><a href="index.php?page=SanPham&view=search&q=Kinh Tế">Kinh tế</a></li>';
                                else
                                    echo '<li><a href="index.php?page=SanPham&view=search&q=Kinh Tế">Kinh tế</a></li>';

                                if($_GET["q"] == 'Tâm Lý')
                                    echo '<li class="active"><a href="index.php?page=SanPham&view=search&q=Tâm Lý">Tâm lý - Kỹ năng sống</a></li>';
                                else
                                    echo '<li><a href="index.php?page=SanPham&view=search&q=Tâm Lý">Tâm lý - Kỹ năng sống</a></li>';

                                if($_GET["q"] == 'Thiếu Nhi')
                                    echo '<li class="active"><a href="index.php?page=SanPham&view=search&q=Thiếu Nhi">Thiếu nhi</a></li>';
                                else
                                    echo '<li><a href="index.php?page=SanPham&view=search&q=Thiếu Nhi">Thiếu nhi</a></li>';

                                if($_GET["q"] == 'Nuôi Dạy Con')
                                    echo '<li class="active"><a href="index.php?page=SanPham&view=search&q=Nuôi Dạy Con">Nuôi dạy con</a></li>';
                                else
                                    echo '<li><a href="index.php?page=SanPham&view=search&q=Nuôi Dạy Con">Nuôi dạy con</a></li>';

                                if($_GET["q"] == 'Học Ngoại Ngữ')
                                    echo '<li class="active"><a href="index.php?page=SanPham&view=search&q=Học Ngoại Ngữ">Học ngoại ngữ</a></li>';
                                else
                                    echo '<li><a href="index.php?page=SanPham&view=search&q=Học Ngoại Ngữ">Học ngoại ngữ</a></li>';

                            }                           
                            break;                       
                        default:
                            echo '<li><a href="index.php">Trang chủ</a></li>
                            <li><a href="index.php?page=SanPham&view=all">Sản phẩm</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Văn Học">Văn học</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Kinh Tế">Kinh tế</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Tâm Lý">Tâm lý - kỹ năng sống</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Thiếu Nhi">Thiếu nhi</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Nuôi Dạy Con">Nuôi dạy con</a></li>
                            <li><a href="index.php?page=SanPham&view=search&q=Học Ngoại Ngữ">Học ngoại ngữ</a></li>';
                            break;
                    } 
                ?>
                    <!-- <li class="active"><a href="#">Trang chủ</a></li>
                    <li id="pSanPham" ><a href="index.php?page=SanPham">Sản phẩm</a></li>
                    <li><a href="#">Văn học</a></li>
                    <li><a href="#">Kinh tế</a></li>
                    <li><a href="#">Tâm lý - kỹ năng sống</a></li>
                    <li><a href="#">Thiếu nhi</a></li>
                    <li><a href="#">Nuôi dạy con</a></li>
                    <li><a href="#">Học ngoại ngữ</a></li> -->
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->
</header>
<!-- /HEADER -->



