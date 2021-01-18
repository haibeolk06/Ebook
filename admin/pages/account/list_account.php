
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ebook</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
                                            <li class="breadcrumb-item active">Show All</li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Account</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        
                        <table>
                            <tr style="text-align: center; font-size: 14px">
                                <th width="100">User Id</th>
                                <th width="100">User role</th>
                                <th width="200">Email</th>
                                <th width="150">Password</th>
                                <th width="200">First name</th>
                                <th width="200">Last name</th>
                                <th width="150">Phone number</th>
                                <th width="200">Acction</th>
                            </tr>
                            <?php
                                // include('../DBConnect.php');
                                $sql = "SELECT u.*, r.role_name FROM user u, user_role r WHERE u.User_Role = r.Role_Id";
                                $bang = DataProvider::ExecuteQuery($sql);

                                while($row = mysqli_fetch_array($bang))
                                {
                                    ?>
                                        <tr style="text-align: center;"> 
                                            <td><?php echo $row["User_Id"]; ?></td>
                                            <td><?php echo $row["role_name"]; ?></td>
                                            <td><?php echo $row["Email"]; ?></td>
                                            <td><?php echo $row["Password"]; ?></td>
                                            <td><?php echo $row["First_Name"]; ?></td>
                                            <td><?php echo $row["Last_Name"]; ?></td>
                                            <td><?php echo $row["Phonenumber"]; ?></td>
                                            <td>
                                                <a href="index.php?act=1&sub=3&id=<?php echo $row["User_Id"]; ?>">
                                                    <i class="far fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a href="index.php?act=1&sub=2&id=<?php echo $row["User_Id"]; ?>">
                                                    <i style="margin-left: 15px" class="la la-times-circle-o"></i>
                                                    <span >Delete</span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>	
                        </table>

                        
                    </div> <!-- container -->

                </div> <!-- content -->
            </div>
