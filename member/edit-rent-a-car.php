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
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="name" class="hidden-lg hidden-md">Name</label>
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Your name" value="<?php echo $RENT_A_CAR->name ?>" autocomplete="off" name="name" required="TRUE">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Main Types-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="mainTypes">Vehicle Type</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <label for="mainTypes" class="hidden-lg hidden-md">Vehicle Type</label>
                                                    <select class="form-control" autocomplete="off" type="text" id="mainTypes" autocomplete="off" name="mainTypes" required="TRUE">
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
                                                    <label for="requestTypes" class="hidden-lg hidden-md">Request Type</label>
                                                    <select class="form-control" autocomplete="off" type="text" id="account_type" autocomplete="off" name="requestTypes" required="TRUE">
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
                                                    <label for="fuelType" class="hidden-lg hidden-md">Fuel Type</label>
                                                    <select class="form-control" autocomplete="off" type="text" id="fuelType" autocomplete="off" name="fuelType" required="TRUE">
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
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="conatcName">Conatc Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="conatcName" class="hidden-lg hidden-md">Conatc Name</label>
                                                    <input type="text" id="conatcName" class="form-control" placeholder="Enter Conatc Name" autocomplete="off" name="conatcName" value="<?php echo $RENT_A_CAR->conatcName ?>" required="TRUE">
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
                                                    <label for="phoneNumber" class="hidden-lg hidden-md">Phone Number</label>
                                                    <input type="text" id="phoneNumber" class="form-control" placeholder="Enter Phone Number" autocomplete="off" name="phoneNumber" value="<?php echo $RENT_A_CAR->phoneNumber ?>" required="TRUE">
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
                                                    <label for="email" class="hidden-lg hidden-md">Email</label>
                                                    <input type="email" id="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" name="email" value="<?php echo $RENT_A_CAR->email ?>" required="TRUE">
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
                                                    <label for="district" class="hidden-lg hidden-md">District</label>
                                                    <select name="district" id="district" class="form-control" required="TRUE">
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
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="city">City</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <label for="city" class="hidden-lg hidden-md">City</label>
                                                    <select class="form-control" autocomplete="off" id="city-bar" autocomplete="off" name="city"  required="TRUE">
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
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="address">Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="address" class="hidden-lg hidden-md">Address</label>
                                                    <input type="text" id="address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="address" value="<?php echo $RENT_A_CAR->address ?>"  required="TRUE">
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
                                                    <label for="vehicleNumber" class="hidden-lg hidden-md">Vehicle Number</label>
                                                    <input type="text" id="vehicleNumber" class="form-control" placeholder="Enter Vehicle Number" autocomplete="off" name="vehicleNumber" value="<?php echo $RENT_A_CAR->vehicleNumber ?>" required="TRUE">
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
                                                    <label for="noOfPassengers" class="hidden-lg hidden-md">No Of Passengers</label>
                                                    <input type="text" id="noOfPassengers" class="form-control" placeholder="Enter No Of Passengers" autocomplete="off" name="noOfPassengers" value="<?php echo $RENT_A_CAR->noOfPassengers ?>" required="TRUE">
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
                                                    <label for="noOfBaggage" class="hidden-lg hidden-md">No Of Baggage</label>
                                                    <input type="text" id="noOfBaggage" class="form-control" placeholder="Enter No Of Baggage" autocomplete="off" name="noOfBaggage" value="<?php echo $RENT_A_CAR->noOfBaggage ?>" required="TRUE">
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
                                                    <label for="noOfDoors" class="hidden-lg hidden-md">No Of Doors</label>
                                                    <input type="text" id="noOfDoors" class="form-control" placeholder="Enter No Of Doors" autocomplete="off" name="noOfDoors" value="<?php echo $RENT_A_CAR->noOfDoors ?>" required="TRUE">
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
                                                    <label for="airConditioned" class="hidden-lg hidden-md">Air Conditioned</label>
                                                    <select class="form-control" autocomplete="off" type="text" id="airConditioned" autocomplete="off" name="airConditioned" value="<?php echo $RENT_A_CAR->airConditioned ?>" required="TRUE">

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
                                    
                                     <!--Price Self Drive-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="price_self_drive">Price Self Drive</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="price_self_drive" class="hidden-lg hidden-md">Price Self Drive</label>
                                                    <input type="text" id="price_self_drive" class="form-control" placeholder="Enter Price Self Drive" autocomplete="off" name="price_self_drive" required="TRUE" value="<?php echo $RENT_A_CAR->price_self_drive ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Price Tours-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="price_tours">Price Tours</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="price_tours" class="hidden-lg hidden-md">Price Tours</label>
                                                    <input type="text" id="price_tours" class="form-control" placeholder="Enter Price Tours" autocomplete="off" name="price_tours" required="TRUE" value="<?php echo $RENT_A_CAR->price_tours ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Price Wedding-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="price_wedding">Price Wedding</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="price_wedding" class="hidden-lg hidden-md">Price Wedding</label>
                                                    <input type="text" id="price_wedding" class="form-control" placeholder="Enter Price Wedding" autocomplete="off" name="price_wedding" required="TRUE" value="<?php echo $RENT_A_CAR->price_wedding ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Price Airport-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="price_airport">Price Airport</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="price_airport" class="hidden-lg hidden-md">Price Airport</label>
                                                    <input type="text" id="price_airport" class="form-control" placeholder="Enter Price Airport" autocomplete="off" name="price_airport" required="TRUE" value="<?php echo $RENT_A_CAR->price_airport ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Price Per Excited Milage-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="price_per_excited_milage">Price Per Excited Milaget</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="price_per_excited_milage" class="hidden-lg hidden-md">Price Per Excited Milaget</label>
                                                    <input type="text" id="price_per_excited_milage" class="form-control" placeholder="Enter Price Per Excited Milage" autocomplete="off" name="price_per_excited_milage" required="TRUE" value="<?php echo $RENT_A_CAR->price_per_excited_milage ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Save-->
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-4"> 
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