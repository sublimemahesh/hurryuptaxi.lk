<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Collapse | Bootstrap Based Admin Template - Material Design</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?> 

        <section class="content">
            <div class="container-fluid">

                <div class="row clearfix">
                    <!-- Basic Examples -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    BASIC EXAMPLES
                                    <small>Extend the default collapse behavior to create an accordion with the panel component.</small>
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="row clearfix">

                                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                        <b>Panel Danger</b>
                                        <div class="panel-group" id="accordion_4" role="tablist" aria-multiselectable="true">
                                            <form class="form-horizontal"  method="post" action="post-and-get/rent-a-car.php" enctype="multipart/form-data"> 

                                                <div class="panel panel-danger">
                                                    <div class="panel-heading" role="tab" id="headingOne_4">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion_4" href="#collapseOne_4" aria-expanded="true" aria-controls="collapseOne_4">
                                                                Vehicle Owner Details
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne_4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_4">
                                                        <div class="panel-body">

                                                            <!--Contact Name-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="conatcName">Contact Name</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="conatcName" class="form-control" placeholder="Enter Contact Name" autocomplete="off" name="conatcName" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Phone Number-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="phoneNumber">Phone Number</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="phoneNumber" class="form-control" placeholder="Enter Phone Number" autocomplete="off" name="phoneNumber" required="TRUE">
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
                                                                            <input type="email" id="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" name="email" required="TRUE">
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
                                                            <!--Address-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="address">Address</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="address" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading" role="tab" id="headingTwo_4">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_4" href="#collapseTwo_4" aria-expanded="false"
                                                               aria-controls="collapseTwo_4">
                                                                Vehicle Details
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo_4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_4">
                                                        <div class="panel-body">
                                                            <!--Title or Vehicle-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="name">Title or Vehicle</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="name" class="form-control" placeholder="Enter Your Title or Vehicle" autocomplete="off" name="name" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <!-- Main Types -->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="mainTypes">Vehicle Type</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group place-select">
                                                                        <div class="form-line">
                                                                            <select class="form-control" autocomplete="off" type="text" id="mainTypes" autocomplete="off" name="mainTypes" required="TRUE">
                                                                                <option value="0"> -- Select Vehicle Type -- </option>

                                                                                <?php foreach (VehicleType::mainTypes() as $key => $VEHICLE_TYPE) {
                                                                                    ?>
                                                                                    <option value="<?php echo $key; ?>"> 
                                                                                        <?php echo $VEHICLE_TYPE; ?>
                                                                                    </option>

                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Request Types-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="requestTypes">Request Type</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group place-select">
                                                                        <div class="form-line">
                                                                            <select class="form-control" autocomplete="off" type="text" id="requestTypes" autocomplete="off" name="requestTypes" required="TRUE">
                                                                                <option value="0"> -- Select Request Type -- </option>

                                                                                <?php foreach (VehicleType::requestTypes() as $key => $REQUEST_TYPE) {
                                                                                    ?>
                                                                                    <option value="<?php echo $key; ?>"> 
                                                                                        <?php echo $REQUEST_TYPE; ?>
                                                                                    </option>

                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Fuel Types-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="fuelType">Fuel Type</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group place-select">
                                                                        <div class="form-line">
                                                                            <select class="form-control" autocomplete="off" type="text" id="fuelType" autocomplete="off" name="fuelType" required="TRUE">
                                                                                <option value="0"> -- Select Fuel Type -- </option>

                                                                                <?php foreach (VehicleType::fuelTypes() as $key => $FUEL_TYPE) {
                                                                                    ?>
                                                                                    <option value="<?php echo $key; ?>"> 
                                                                                        <?php echo $FUEL_TYPE; ?>
                                                                                    </option>

                                                                                    <?php
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
                                                                    <label for="vehicleNumber">Vehicle Number</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="vehicleNumber" class="form-control" placeholder="Enter Vehicle Number" autocomplete="off" name="vehicleNumber" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--No Of Passengers-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="noOfPassengers">No Of Passengers</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="noOfPassengers" class="form-control" placeholder="Enter No Of Passengers" autocomplete="off" name="noOfPassengers" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--No Of Baggage-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="noOfBaggage">No Of Baggage</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="noOfBaggage" class="form-control" placeholder="Enter No Of Baggage" autocomplete="off" name="noOfBaggage" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--No Of Doors-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="noOfDoors">No Of Doors</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="noOfDoors" class="form-control" placeholder="Enter No Of Doors" autocomplete="off" name="noOfDoors" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Air Conditioned-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="airConditioned">Air Conditioned</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group place-select">
                                                                        <div class="form-line">
                                                                            <select class="form-control" autocomplete="off" type="text" id="airConditioned" autocomplete="off" name="airConditioned" required="TRUE">
                                                                                <option value=""> -- Please Select Air Conditioned -- </option>
                                                                                <option value="1">Yes</option>
                                                                                <option value="2">No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading" role="tab" id="headingThree_4">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_4" href="#collapseThree_4" aria-expanded="false"
                                                               aria-controls="collapseThree_4">
                                                                Prices
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree_4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_4">
                                                        <div class="panel-body">
                                                            <!--Self Drive Price / Excited Self Drive-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="excited_milage_self_drive">Self Drive</label>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="price_self_drive" class="form-control" placeholder="Enter Self Drive Price" autocomplete="off" name="price_self_drive" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="excited_milage_self_drive" class="form-control" placeholder="Enter Excited Self Drive" autocomplete="off" name="excited_milage_self_drive" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Tours / Chauffeur Driven Price / Excited Milage Tour-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="price_tours">Tours / Chauffeur Driven</label>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="price_tours" class="form-control" placeholder="Enter Tours / Chauffeur Driven Price" autocomplete="off" name="price_tours" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="excited_milage_tour" class="form-control" placeholder="Enter Excited Milage Tour" autocomplete="off" name="excited_milage_tour" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Airport / City Transfers Price / Excited Milage Airport-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="price_airport">Airport / City Transfers</label>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="price_airport" class="form-control" placeholder="Enter Airport / City Transfers Price" autocomplete="off" name="price_airport" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="excited_milage_airport" class="form-control" placeholder="Enter Excited Milage Airport" autocomplete="off" name="excited_milage_airport" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Weddings & Events Price / Excited Milage Wedding-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                                    <label for="price_wedding">Weddings & Events</label>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="price_wedding" class="form-control" placeholder="Enter Weddings & Events Price" autocomplete="off" name="price_wedding" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="excited_milage_wedding" class="form-control" placeholder="Enter Excited Milage Wedding" autocomplete="off" name="excited_milage_wedding" required="TRUE">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Save-->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5"> 
                                                                    <input type="hidden" id="user" class="form-control" value="<?php echo $_SESSION["id"] ?>" name="user">
                                                                    <input type="submit" name="add-rent-a-car" class="btn btn-primary m-t-15 waves-effect" value="Add Car"/>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- #END# Multiple Items To Be Open -->
            </div>
        </section>

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