<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);
date_default_timezone_set('Asia/Colombo');

$date = date('Y-m-d');
$time = date('H:i:s');

$id = '';
$id = $_GET['id'];
$DRIVER = new Driver($id);

?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Add Driver Payment || www.hurryuptaxi.lk</title>
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


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
                        <h2>Add Driver Payment</h2>
                        <ul class="header-dropdown">
                            <li class="">
                                <a href="manage-all-drivers.php">
                                    <i class="material-icons">list</i> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form class="form-horizontal"  method="post" action="post-and-get/driver_payment.php" enctype="multipart/form-data"> 
                            <!--name-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="name">Driver Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"   class="form-control"   autocomplete="off" value="<?php echo $DRIVER->name ?>" >                                           
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Date time-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="date">Date Time</label>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date" name="date" class="form-control datepicker" value="<?php echo $date ?>"   autocomplete="off" required="TRUE" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="time" name="time" class="form-control" value="<?php echo $time ?>"   autocomplete="off" required="TRUE" >
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--Price-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="price">Price</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="price" class="hidden-lg hidden-md">Price</label>
                                            <input type="number" id="price" class="form-control"  name="price"  required="TRUE" placeholder="Price" min="0">

                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--save-->
                            <div class="row clearfix">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-10  ">
                                    <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect center-block" value="Create"/>
                                    <input type="hidden"  value="<?php echo $DRIVER->id ?>"  name="driver" >
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

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});
            });
        </script> 
    </body>

</html>