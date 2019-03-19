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

        <title>Add New Driver || Admin || hurryuptaxi.lk</title>
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
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card"  style="margin-top: 20px;">
                            <div class="header">
                                <h2>Add New Driver</h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-driver.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/driver.php" enctype="multipart/form-data"> 
                                    <!--name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Your name" autocomplete="off" name="name" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--email-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="name">Email</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" id="email" class="form-control" placeholder="Enter Your email" autocomplete="off" name="email" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Phone Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="contact_no">Phone Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="contact_no" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off" name="contact_no" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--NIC Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="nic_number">NIC Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="nic_number" class="form-control" placeholder="Enter NIC Number" autocomplete="off" name="nic_number" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--District-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="district">District</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <select class="form-control" autocomplete="off" type="text" id="district" autocomplete="off" name="district" required="TRUE">
                                                        <option value=""> -- Please Select District -- </option>
                                                        <?php foreach (District::all() as $key => $city) {
                                                            ?>
                                                            <option ind_id="<?php echo $city['id']; ?>" value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option><?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--City-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="city">City</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <select class="form-control" autocomplete="off" type="text" id="city-bar" autocomplete="off" name="city" required="TRUE">
                                                        <option value=""> -- Please Select a District First -- </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Profile Picture-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="image">Profile Picture</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" id="image" class="form-control" name="image" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Address-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="address">Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="address" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Vehicle Type-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="vehicle_type">Vehicle Type</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <select class="form-control" autocomplete="off" type="text" id="vehicle_type" autocomplete="off" name="vehicle_type" required="TRUE">
                                                        <option value=""> -- Please Select Vehicle Type -- </option>
                                                        <?php
                                                        $VEHICLE_TYPE = new VehicleType(NULL);
                                                        foreach ($VEHICLE_TYPE->all() as $key => $vehicle_type) {
                                                            ?>
                                                            <option  value="<?php echo $vehicle_type['id']; ?>"><?php echo $vehicle_type['name']; ?></option><?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Vehicle Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="vehicle_number">Vehicle Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="vehicle_number" class="form-control" placeholder="Enter Vehicle Number" autocomplete="off" name="vehicle_number" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Price Per KM-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="price_per_km">Price Per KM</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="price_per_km" class="form-control" placeholder="Enter Price Per KM" autocomplete="off" name="price_per_km" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Base Price-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="base_price">Base Price</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="base_price" class="form-control" placeholder="Enter Base Price" autocomplete="off" name="base_price" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Password-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="password" class="form-control" value="abc123" name="password"  required="TRUE">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Save-->
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5"> 
                                            <input type="hidden" id="user" class="form-control" value="<?php echo $_SESSION["id"] ?>" name="user">
                                            <input type="submit" name="add-driver" class="btn btn-primary m-t-15 waves-effect" value="Add Driver"/>
                                        </div>
                                    </div>

                                </form> 
                            </div>
                        </div>
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