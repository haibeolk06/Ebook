<php>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>

                    
                    <!-- setting user -->
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="assets\images\users\user-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                Marcia J. <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0 text-white">
                                    Welcome !
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>



                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.php" class="logo text-center">
                        <span class="logo-lg">
                            <img src="assets\images\ebook.png" alt="" height="24">
                            <!-- <span class="logo-lg-text-light">Upvex</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="assets\images\ebook-logo.ico" alt="" height="28">
                        </span>
                    </a>
                </div>

                
            </div>
            <!-- end Topbar -->
            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Dashboards</li>

                            <!-- Quản lý tài khoản -->
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="la la-user"></i>
                                    <span> Account </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <?php
                                    {
                                        ?>
                                            <li>
                                                <a href="index.php?act=1">Show All</a>
                                            </li>
                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <a href="index.php?act=1&sub=4">Add Account</a>
                                    </li>

                                </ul>
                            </li>


                            <!-- Quản lý NXB -->
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="la la-university"></i>
                                    <span> Publishing CO</span>
                                    <span class="menu-arrow"></span>
                                    
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <?php
                                    {
                                        ?>
                                            <li>
                                                <a href="index.php?act=2">All Publishing</a>
                                            </li>
                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <a href="index.php?act=2&sub=4">Add Publishing</a>
                                    </li>

                                </ul>
                                
                            </li>

                            <!-- Quản Lý Loại sản phẩm -->
                            <li>
                                <a href="javascript: void(0);">
                                    <i class=" la la-th-large"></i>
                                    <span> Category </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <?php
                                    {
                                        ?>
                                            <li>
                                                <a href="index.php?act=3">All Category</a>
                                            </li>
                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <a href="index.php?act=3&sub=4">Add Category</a>
                                    </li>

                                </ul>
                            </li>
                

                            <!-- Quản lý sản phẩm -->
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="la la-book"></i>
                                    <span> Product </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <?php
                                    {
                                        ?>
                                            <li>
                                                <a href="index.php?act=4">All Product</a>
                                            </li>
                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <a href="index.php?act=4&sub=4">Add Product</a>
                                    </li>

                                </ul>
                            </li>


                            <!-- Quản lý đơn hàng -->
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="la la-book"></i>
                                    <span> Purchase </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <?php
                                    {
                                        ?>
                                            <li>
                                                <a href="index.php?act=5">All Purchase</a>
                                            </li>
                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <a href="index.php?act=5&sub=4">Add Purchase</a>
                                    </li>

                                </ul>
                            </li>


                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->


            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
    
</php>