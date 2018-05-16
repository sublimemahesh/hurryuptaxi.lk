<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);
$id = '';
if (isset($_GET['user'])) {
    $id = $_GET['user'];
}
$MEMBER = new User($id);
?> 
﻿<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Update Payments and Active || hurryuptaxi.lk</title>
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
                <?php
                if (isset($_GET['message'])) {

                    $MESSAGE = New Message($_GET['message']);
                    ?>
                    <div class="alert alert-<?php echo $MESSAGE->status; ?>" role = "alert">
                        <?php echo $MESSAGE->description; ?>
                    </div>
                    <?php
                }
                ?>

                <?php
                if ($USER->id == 1) {
                    ?>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Update Payments and Active
                                    </h2>

                                </div>
                                <div class="body row">
                                    <form class="form-horizontal col-sm-9 col-md-9" method="post" action="post-and-get/add-new-user.php" enctype="multipart/form-data"> 

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                                <label for="isActive">Status</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <input class="filled-in chk-col-pink" type="checkbox" <?php
                                                    if ($MEMBER->isActive == 1) {
                                                        echo 'checked';
                                                    }
                                                    ?> name="active" value="1" id="rememberme" style="margin-top: 6px;"/>
                                                    <label for="rememberme">Activate / InActive</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Payment-->
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                                <label for="payment">Payment</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="payment" class="hidden-lg hidden-md">Payment</label>
                                                        <input type="text" id="payment" class="form-control" placeholder="Enter Payment" autocomplete="off" name="payment" value="<?php echo $MEMBER->payment; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                                <label for="paymentDate">Payment Date</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="paymentDate" class="hidden-lg hidden-md">Payment Date</label>
                                                        <input type="date" id="paymentDate" class="form-control" placeholder="Select Payment Date" autocomplete="off" name="paymentDate" value="<?php echo $MEMBER->activePaymentDate; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-4"> 
                                                <input type="hidden" id="id" value="<?php echo $MEMBER->id; ?>" name="id">
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="updatePayment" value="submit">Save Changes</button>
                                            </div>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header" >
                                <h2 style="color: red">
                                    You don`t have access this page
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="./">
                                            <i class="material-icons">person</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>

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