<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);

date_default_timezone_set('Asia/Colombo');

$createdAt = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Register New Customer || www.hurryuptaxi.lk</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
        <!-- Bootstrap Spinner Css -->
        <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?> 
        <section class="content">
            <div class="container-fluid"> 
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <!-- Vertical Layout -->
                <div class="card" style="margin-top: 20px;">
                    <div class="header">
                        <h2>Create Customer</h2>
                        <ul class="header-dropdown">
                            <li class="">
                                <a href="manage-user.php">
                                    <i class="material-icons">list</i> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form class="form-horizontal"  method="post" action="post-and-get/add-new-customer.php" enctype="multipart/form-data"> 
                            <!--name-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" class="form-control" required="TRUE" placeholder="Name" autocomplete="off" name="name" >
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Email-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off" required="TRUE" >
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Address-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="contact_no">Contact No</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="contact_no" name="contact_no" class="form-control" placeholder=" Contact No" autocomplete="off"  required="TRUE">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                           
                            <!--Password-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="name">Password</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="password" class="hidden-lg hidden-md">Password</label>
                                            <input type="text" id="password" class="form-control"  name="password"  required="TRUE" placeholder="Password">
                                            <input type="hidden" id="created_at" name="created_at" value="<?php echo $createdAt; ?>">

                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--Active-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                    <label for="isActive">Status</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input class="filled-in chk-col-pink" type="checkbox" checked name="active" value="1" id="rememberme" style="margin-top: 6px;"/>
                                        <label for="rememberme">Activate / InActive</label>
                                    </div>
                                </div>
                            </div>

                            <!--save-->
                            <div class="row clearfix">
                                <div class="col-md-12 text-center">
                                    <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect center-block" value="Create"/>
                                </div>
                            </div>

                        </form> 
                    </div>
                </div>
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/city.js" type="text/javascript"></script>

    </body>

</html>