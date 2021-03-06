<!-- Page Loader -->
<style>
    .navbar .navbar-toggle::before {
        content: '' !important;
        font-family: 'Material Icons';
        font-size: 26px;

    }
</style>
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars --> 
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="navbar-toggle collapsed" aria-expanded="false">
                <ul class="nav navbar-nav navbar-right">  
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i style="margin-top: -5px !important; margin-left: -15px !important;" class="material-icons">settings</i> 
                        </a> 
                        <ul class="dropdown-menu">
                            <li>
                                <a href="profile.php">
                                    <i class="material-icons">person</i>Profile
                                </a>
                            </li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="edit-user.php?id=<?php echo $USER->id; ?>"><i class="material-icons">edit</i>Edit My Profile</a></li>
                            <li><a href="change-password.php"><i class="material-icons">vpn_key</i>Change Password</a></li> 
                            <li role="seperator" class="divider"></li>
                            <li><a href="post-and-get/log-out.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul> 
                    </li> 
                </ul>
            </div>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.php">
                <img src="../upload/logo-member-login.png" style="height:53px;"/>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">  
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">settings</i> 
                    </a> 
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php">
                                <i class="material-icons">person</i>Profile
                            </a>
                        </li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="edit-user.php?id=<?php echo $USER->id; ?>"><i class="material-icons">edit</i>Edit My Profile</a></li>
                        <li><a href="change-password.php"><i class="material-icons">vpn_key</i>Change Password</a></li> 
                        <li role="seperator" class="divider"></li>
                        <li><a href="post-and-get/log-out.php"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul> 
                </li> 
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info text-left">
            <div class="image pull-left">

                <?php
                if (!empty($USER->profile_picture)) {
                    ?>
                    <img src="../upload/user/<?php echo $USER->profile_picture; ?>" width="48" height="48" alt="User" />
                    <?php
                }
                ?>

            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $USER->name; ?>
                </div>
                <div class="email"><?php echo $USER->email; ?></div> 
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list" style="height: auto !important;">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="./">
                        <i class="material-icons">av_timer</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">folder_shared</i>
                        <span>My Members</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="create-new-user.php">
                                <i class="material-icons">add</i>
                                <span>Register New</span>
                            </a>
                        </li>
                        <li>
                            <a href="manage-user.php">
                                <i class="material-icons">list</i>
                                <span>View My Members</span>
                            </a>
                        </li>
                        <?php
                        if ($USER->id == 1) {
                            ?>
                            <li>
                                <a href="manage-all-users.php">
                                    <i class="material-icons">list</i>
                                    <span>View All Members</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?> 

                    </ul>
                </li>

                <?php
                if ($USER->id == 1) {
                    ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_box</i>
                            <span>App Users</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="create-customer.php">
                                    <i class="material-icons">add</i>
                                    <span>Add New</span>
                                </a>
                            </li>
                            <li>
                                <a href="manage-active-customers.php">
                                    <i class="material-icons">how_to_reg</i>
                                    <span>Active Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="manage-inactive-customers.php">
                                    <i class="material-icons">person_add_disabled</i>
                                    <span>InActive Users</span>
                                </a>
                            </li>

                        </ul>
                    </li>  
 

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">directions_car</i>
                            <span>Vehicle Type</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="create-vehicle-type.php">
                                    <i class="material-icons">add</i>
                                    <span>Add New</span>
                                </a>
                            </li>
                            <li>
                                <a href="manage-vehicle-type.php">
                                    <i class="material-icons">list</i>
                                    <span>Manage</span>
                                </a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_contact_calendar</i>
                            <span>View App Bookings</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="view-app-booking-all.php">
                                    <i class="material-icons">add</i>
                                    <span>View All </span>
                                </a>
                            </li>
                            <li>
                                <a href="view-app-booking-for-user.php">
                                    <i class="material-icons">list</i>
                                    <span>User Bookings</span>
                                </a>
                            </li>
                        </ul>
                    </li> 
                     <?php
                        if ($USER->id == 1) {
                            
                            ?> 
                    
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment_ind</i>
                        <span>Drivers</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="create-driver.php">
                                <i class="material-icons">add</i>
                                <span>Add New</span>
                            </a>
                        </li>
                        <li>
                            <a href="manage-driver.php">
                                <i class="material-icons">list</i>
                                <span>My Drivers</span>
                            </a>
                        </li>
                          
                            <li>
                                <a href="manage-all-drivers.php">
                                    <i class="material-icons">list</i>
                                    <span>All Drivers</span>
                                </a>
                            </li>
                         
                    </ul>
                </li> 
                   <?php
                        } else {
                            ?>
                  <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment_ind</i>
                        <span>My Drivers</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="create-driver.php">
                                <i class="material-icons">add</i>
                                <span>Add New</span>
                            </a>
                        </li>
                        <li>
                            <a href="manage-driver.php">
                                <i class="material-icons">list</i>
                                <span>Manage</span>
                            </a>
                        </li>
                          
                        
                    </ul>
                </li> 
                <?php
                            
                        }
                        ?>
                    
                    
                    <?php
                }
                ?> 
                <?php
                if ($USER->id == 1) {
                    ?>

                    <!--                    <li>
                                            <a href="javascript:void(0);" class="menu-toggle">
                                                <i class="material-icons">recent_actors</i>
                                                <span>Dealer</span>
                                            </a>
                                            <ul class="ml-menu">
                                                <li>
                                                    <a href="create-dealer.php">
                                                        <i class="material-icons">add</i>
                                                        <span>Add New</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="manage-dealer.php">
                                                        <i class="material-icons">list</i>
                                                        <span>Manage</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>-->

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">location_on</i>
                            <span>District</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="create-district.php">
                                    <i class="material-icons">add</i>
                                    <span>Add New</span>
                                </a>
                            </li>
                            <li>
                                <a href="manage-district.php">
                                    <i class="material-icons">list</i>
                                    <span>Manage</span>
                                </a>
                            </li>
                            <li>
                                <a href="arrange-district.php">
                                    <i class="material-icons">compare_arrows</i>
                                    <span>Arrange</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">store_mall_directory</i>
                            <span>Bank</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="create-bank.php">
                                    <i class="material-icons">add</i>
                                    <span>Add New</span>
                                </a>
                            </li>
                            <li>
                                <a href="manage-bank.php">
                                    <i class="material-icons">list</i>
                                    <span>Manage</span>
                                </a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">send</i>
                            <span>Commission</span>
                        </a>
                        <ul class="ml-menu">
                            <!--                            <li>
                                                            <a href="create-commission.php">
                                                                <i class="material-icons">add</i>
                                                                <span>Add New</span>
                                                            </a>
                                                        </li>-->
                            <li>
                                <a href="manage-commission.php">
                                    <i class="material-icons">list</i>
                                    <span>Manage</span>
                                </a>
                            </li>
                            <li>
                                <a href="all-paid-commissions.php">
                                    <i class="material-icons">list</i>
                                    <span>All Paid Commissions</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                  
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">send</i>
                        <span>My Commissions</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="paid-commissions.php">
                                <i class="material-icons">list</i>
                                <span>Paid Commissions</span>
                            </a>
                        </li>
                        <li>
                            <a href="pending-commissions.php">
                                <i class="material-icons">list</i>
                                <span>Pending Commissions</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">note_add</i>
                        <span>My Bookings</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="manage-bookings.php">
                                <i class="material-icons">list</i>
                                <span>Manage</span>
                            </a>
                        </li>
                        <?php
                        if ($USER->id == 1) {
                            ?>
                            <li>
                                <a href="manage-all-bookings.php">
                                    <i class="material-icons">list</i>
                                    <span>All Bookings</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php
                if ($USER->id == 1) {
                    ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">feedback</i>
                            <span>Guest Comments</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="create-comment.php">
                                    <i class="material-icons">add</i>
                                    <span>Add New</span>
                                </a>
                            </li>
                            <li>
                                <a href="manage-comments.php">
                                    <i class="material-icons">list</i>
                                    <span>Manage</span>
                                </a>
                            </li>
                            <li>
                                <a href="arrange-comments.php">
                                    <i class="material-icons">compare_arrows</i>
                                    <span>Arrange</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> <a href="javascript:void(0);">BY : SUBLIME HOLDINGS</a>.
            </div> 
        </div>
        <!-- #Footer -->
    </aside> 
</section>