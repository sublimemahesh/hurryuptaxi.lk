<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$RENT_A_CAR = new RentACar($id);
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Edit Rent A Car || Admin || hurryuptaxi.lk</title>
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
                        <div class="card" style="margin-top: 20px;">
                            <div class="header">
                                <h2>Edit Rent A Car</h2>

                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/rent-a-car.php" enctype="multipart/form-data"> 

                                    <!--name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Your name" value="<?php echo $RENT_A_CAR->name ?>" autocomplete="off" name="name" >
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Main Types-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="mainTypes">Main Type</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <select class="form-control" autocomplete="off" type="text" id="mainTypes" autocomplete="off" name="mainTypes">
                                                        <option value=""> -- Select Vehicle Type -- </option>

                                                        <?php
                                                        foreach (VehicleType::mainTypes() as $key => $VEHICLE_TYPE) {
                                                            if ($key == $RENT_A_CAR->mainTypes) {
                                                                ?>
                                                                <option value="<?php echo $key; ?>" selected=""> 
                                                                    <?php echo $VEHICLE_TYPE; ?>
                                                                </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $key; ?>">
                                                                    <?php echo $VEHICLE_TYPE; ?>
                                                                </option>
                                                                <?php
                                                            }
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
                                                    <select class="form-control" autocomplete="off" type="text" id="account_type" autocomplete="off" name="requestTypes">
                                                        <option value=""> -- Select Request Type -- </option>

                                                        <?php
                                                        foreach (VehicleType::requestTypes() as $key => $VEHICLE_TYPE) {
                                                            if ($key == $RENT_A_CAR->requestTypes) {
                                                                ?>
                                                                <option value="<?php echo $key; ?>" selected=""> 
                                                                    <?php echo $VEHICLE_TYPE; ?>
                                                                </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $key; ?>">
                                                                    <?php echo $VEHICLE_TYPE; ?>
                                                                </option>
                                                                <?php
                                                            }
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
                                                    <select class="form-control" autocomplete="off" type="text" id="fuelType" autocomplete="off" name="fuelType">
                                                        <option value=""> -- Select Fuel Type -- </option>

                                                        <?php
                                                        foreach (VehicleType::fuelTypes() as $key => $VEHICLE_TYPE) {
                                                            if ($key == $RENT_A_CAR->fuelType) {
                                                                ?>
                                                                <option value="<?php echo $key; ?>" selected=""> 
                                                                    <?php echo $VEHICLE_TYPE; ?>
                                                                </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $key; ?>">
                                                                    <?php echo $VEHICLE_TYPE; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Conatc Name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="conatcName">Conatc Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="conatcName" class="form-control" placeholder="Enter Conatc Name" autocomplete="off" name="conatcName" value="<?php echo $RENT_A_CAR->conatcName ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Phone Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="phoneNumber">Phone Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="phoneNumber" class="form-control" placeholder="Enter Phone Number" autocomplete="off" name="phoneNumber" value="<?php echo $RENT_A_CAR->phoneNumber ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Email-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" id="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" name="email" value="<?php echo $RENT_A_CAR->email ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--District-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                            <label for="district">District</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group place-select">
                                                <div class="form-line"> 
                                                    <label for="district" class="hidden-lg hidden-md">District</label>
                                                    <select name="district" id="district" class="form-control" required="TRUE" >
                                                        <option value=""> -- Please Select -- </option>
                                                        <?php
                                                        foreach (District::all() as $key => $district) {
                                                            if ($district['id'] == $RENT_A_CAR->district) {
                                                                ?>
                                                                <option value="<?php echo $district['id']; ?>" selected>
                                                                    <?php echo $district['name']; ?>
                                                                </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $district['id']; ?>">
                                                                    <?php echo $district['name']; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--City-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                            <label for="city">City</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <label for="city" class="hidden-lg hidden-md">City</label>
                                                    <select class="form-control" autocomplete="off" id="city-bar" autocomplete="off" name="city"  required="TRUE" >
                                                        <option> -- Please Select -- </option> 
                                                        <?php
                                                        $CITY = new City(Null);
                                                        foreach ($CITY->GetCitiesByDistrict($RENT_A_CAR->district) as $city) {

                                                            if ($city['id'] == $RENT_A_CAR->city) {
                                                                ?>
                                                                <option value="<?php echo $city['id']; ?>" selected>
                                                                    <?php echo $city['name']; ?>
                                                                </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $city['id']; ?>">
                                                                    <?php echo $city['name']; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        }
                                                        ?> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!--Address-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="address">Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="address" value="<?php echo $RENT_A_CAR->address ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Vehicle Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="vehicleNumber">Vehicle Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="vehicleNumber" class="form-control" placeholder="Enter Vehicle Number" autocomplete="off" name="vehicleNumber" value="<?php echo $RENT_A_CAR->vehicleNumber ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--No Of Passengers-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="noOfPassengers">No Of Passengers</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="noOfPassengers" class="form-control" placeholder="Enter No Of Passengers" autocomplete="off" name="noOfPassengers" value="<?php echo $RENT_A_CAR->noOfPassengers ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--No Of Baggage-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="noOfBaggage">No Of Baggage</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="noOfBaggage" class="form-control" placeholder="Enter No Of Baggage" autocomplete="off" name="noOfBaggage" value="<?php echo $RENT_A_CAR->noOfBaggage ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--No Of Doors-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="noOfDoors">No Of Doors</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="noOfDoors" class="form-control" placeholder="Enter No Of Doors" autocomplete="off" name="noOfDoors" value="<?php echo $RENT_A_CAR->noOfDoors ?>">
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
                                                    <select class="form-control" autocomplete="off" type="text" id="airConditioned" autocomplete="off" name="airConditioned" value="<?php echo $RENT_A_CAR->airConditioned ?>">

                                                        <option value=""> -- Please Select -- </option> 
                                                        <option value="1" <?php
                                                        if ($RENT_A_CAR->airConditioned == 1) {
                                                            echo 'selected';
                                                        }
                                                        ?>>Yes</option>
                                                        <option value="2" <?php
                                                        if ($RENT_A_CAR->airConditioned == 0) {
                                                            echo 'selected';
                                                        }
                                                        ?>>No</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Save-->
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5"> 
                                            <input type="hidden" id="user" class="form-control" value="<?php echo $_SESSION["id"] ?>" name="user">
                                            <input type="hidden" id="id" value="<?php echo $RENT_A_CAR->id; ?>" name="id"/>
                                            <input type="submit" name="edit-rent-a-car" class="btn btn-primary m-t-15 waves-effect" value="Save Changes"/>
                                        </div>
                                    </div>

                                </form> 

                            </div>
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