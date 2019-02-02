<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);

$id = '';
$id = $_GET['id'];
$DRIVER = new Driver($id);
?> 
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>View Driver  || Admin || hurryuptaxi.lk</title>
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
                                    Driver : <?php echo $DRIVER->name?>
                                </h2>
                                 
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-9 col-md-9">
                                        <ul class="list-group">
                                            <li class="list-group-item bcg-color"><b>Your Details</b></li>
                                            <li class="list-group-item"><b>Name</b> : <?php echo $DRIVER->name  ?></li> 
                                            

                                             


                                         
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 col-md-3">  
                                        <img src="../upload/driver/<?php echo $DRIVER->profile_picture ?>" class="img img-responsive img-thumbnail img-circle"/> 
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