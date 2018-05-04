<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);
?> 
﻿<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Profile || Admin || hurryuptaxi.lk</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>

        <section class="content">
            <div class="container-fluid"> 
                <!-- Body Copy -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Profile
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="edit-profile.php?id=<?php echo $USER->id; ?>">
                                                    Edit My Profile
                                                </a>
                                            </li> 
                                            <li>
                                                <a href="change-password.php?id=<?php echo $USER->id; ?>">
                                                    Change Password
                                                </a>
                                            </li> 
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-9 col-md-9">
                                        <ul class="list-group">
                                            <li class="list-group-item bcg-color"><b>Your Details</b></li>
                                            <li class="list-group-item"><b>Name</b> : <?php echo $USER->name; ?></li> 
                                            <li class="list-group-item"><b>Username</b> : <?php echo $USER->username; ?></li> 
                                            <li class="list-group-item"><b>Email</b> : <?php echo $USER->email; ?></li> 
                                            <li class="list-group-item"><b>Phone Number</b> : <?php echo $USER->phone_number; ?></li> 
                                            <li class="list-group-item"><b>Address</b> : <?php echo $USER->address; ?></li> 
                                            <li class="list-group-item"><b>NIC</b> : <?php echo $USER->nic; ?></li> 

                                            <li class="list-group-item"><b>District</b> :
                                                <?php
                                                $DISTRICT = new District($USER->district);
                                                echo $DISTRICT->name;
                                                ?>
                                            </li> 
                                            <li class="list-group-item"><b>City</b> : 
                                                <?php
                                                $CITY = new City($USER->city);
                                                echo $CITY->name;
                                                ?>
                                            </li> 
                                            <li class="list-group-item"><b>Dealer</b> : 
                                                <?php
                                                $DEALEAR = new Dealer($USER->dealer);
                                                echo $DEALEAR->name;
                                                ?>
                                            </li> 


                                            <li class="list-group-item"><b>Created Date</b> : <?php echo $USER->createdAt; ?></li>
                                            <li class="list-group-item"><b>Last Login</b> : <?php echo $USER->lastLogin; ?></li> 
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 col-md-3">  
                                        <img src="../upload/user/<?php echo $USER->profile_picture; ?>" class="img img-responsive img-thumbnail"/> 
                                    </div>
                                    
                                    <div class="col-sm-9 col-md-9">
                                        <ul class="list-group">
                                            <li class="list-group-item bcg-color"><b>Bank Details</b></li>
                                            <li class="list-group-item"><b>Bank</b> : 
                                                <?php
                                                $BANK = new Bank($USER->bank);
                                                echo $BANK->name;
                                                ?>
                                            </li>
                                            <li class="list-group-item"><b>Branch</b> : <?php echo $USER->branch; ?></li>
                                            <li class="list-group-item"><b>Account Type</b> :
                                                <?php
                                                if ($USER->account_type == 1) {
                                                    ?>
                                                    Saving Account
                                                    <?php
                                                } elseif ($USER->account_type == 2) {
                                                    ?>
                                                    Current Account
                                                    <?php
                                                }
                                                ?>
                                            </li>
                                            <li class="list-group-item"><b>Holder Name</b> : <?php echo $USER->holder_name; ?></li>
                                            <li class="list-group-item"><b>Account Number</b> : <?php echo $USER->account_number; ?></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Body Copy --> 
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script>
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>
    </body>

</html>