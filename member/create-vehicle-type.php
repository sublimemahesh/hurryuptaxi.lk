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

        <title>Vehicle Type || www.hurryuptaxi.lk</title>
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
                        <h2>Vehicle Type</h2>
                        <ul class="header-dropdown">
                            <li class="">
                                <a href="manage-vehicle-type.php">
                                    <i class="material-icons">list</i> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form class="form-horizontal"  method="post" action="post-and-get/vehicle-type.php" enctype="multipart/form-data"> 
                            <!--vehicle_name-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="vehicle_name">Vehicle Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" class="form-control" required="TRUE" placeholder=" Vehicle Name" autocomplete="off" name="name" >
                                        </div>
                                    </div>
                                </div>
                            </div> 
                          
                        
                            <!--Passengers-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="passengers">Passengers</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="passengers" class="form-control" placeholder="Passengers" autocomplete="off" name="passengers"  required="TRUE" min="0">
                                        </div>
                                    </div>
                                </div>
                                
                            <!--Baggages-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="baggages">Baggages</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="baggages" class="form-control" placeholder="Baggages" autocomplete="off" name="baggages"  required="TRUE" min="0">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                           
                           
                            <!--Image-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="image">Image</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="image" class="hidden-lg hidden-md">Image</label>
                                            <input type="file" id="image" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <!--save-->
                            <div class="row clearfix">
                                 <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">                                     
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
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