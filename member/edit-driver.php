<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$DRIVER = new Driver($id);
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Edit Driver || Admin || hurryuptaxi.lk</title>
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
                                <h2>Edit Driver</h2>

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
                                                    <label for="name" class="hidden-lg hidden-md">Name</label>
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Your name" autocomplete="off" name="name" value="<?php echo $DRIVER->name; ?>">
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
                                                    <input type="email" id="email" class="form-control" placeholder="Enter Your email" autocomplete="off" name="email"  value="<?php echo $DRIVER->email; ?>">
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
                                                    <label for="contact_no" class="hidden-lg hidden-md">Phone Number</label>
                                                    <input type="text" id="contact_no" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off" name="contact_no" value="<?php echo $DRIVER->contact_no; ?>">
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
                                                    <label for="nic_number" class="hidden-lg hidden-md">NIC Number</label>
                                                    <input type="text" id="nic_number" class="form-control" placeholder="Enter NIC Number" autocomplete="off" name="nic_number" value="<?php echo $DRIVER->nic_number ?>">
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
                                                    <select name="district" id="district" class="form-control" >
                                                        <option value=""> -- Please Select -- </option>
                                                        <?php
                                                        foreach (District::all() as $key => $district) {
                                                            if ($district['id'] == $DRIVER->district) {
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
                                                    <select class="form-control" autocomplete="off" id="city-bar" autocomplete="off" name="city" required="TRUE">
                                                        <option> -- Please Select -- </option> 
                                                        <?php
                                                        $CITY = new City(Null);
                                                        foreach ($CITY->GetCitiesByDistrict($DRIVER->district) as $city) {

                                                            if ($city['id'] == $DRIVER->city) {
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
                                    <!--Profile Picture-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="image">Profile Picture</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="image" class="hidden-lg hidden-md">Profile Picture</label>
                                                    <input type="file" id="image" class="form-control" name="image" value="">
                                                    <img src="<?php echo $DRIVER->profile_picture; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">
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
                                                    <input type="text" id="address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="address" value="<?php echo $DRIVER->address; ?>">
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
                                                    <label for="vehicle_number" class="hidden-lg hidden-md">Vehicle Number</label>
                                                    <input type="text" id="vehicle_number" class="form-control" placeholder="Enter Vehicle Number" autocomplete="off" name="vehicle_number" value="<?php echo $DRIVER->vehicle_number; ?>">
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
                                                            if ($DRIVER->vehicle_type == $vehicle_type['id']) {
                                                                ?>
                                                                <option  value="<?php echo $vehicle_type['id']; ?>" selected=""><?php echo $vehicle_type['name']; ?></option>
                                                            <?php } else { ?>
                                                                <option  value="<?php echo $vehicle_type['id']; ?>"><?php echo $vehicle_type['name']; ?></option><?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
 
                                                     
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
                                                    <label for="price_per_km" class="hidden-lg hidden-md">Price Per KM</label>
                                                    <input type="text" id="price_per_km" class="form-control" placeholder="Enter Price Per KM" autocomplete="off" name="price_per_km" value="<?php echo $DRIVER->price_per_km;?>">
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
                                                    <input type="text" id="base_price" class="form-control" placeholder="Enter Base Price" autocomplete="off" name="base_price" value="<?php echo $DRIVER->base_price;?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Password-->
                                      
                                    <!--Save-->
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-4"> 
                                            <input type="hidden" id="oldImageName" value="<?php echo $DRIVER->profile_picture; ?>" name="oldImageName"/>
                                            <input type="hidden" id="user" class="form-control" value="<?php echo $_SESSION["id"] ?>" name="user">
                                            <input type="hidden" id="id" value="<?php echo $DRIVER->id; ?>" name="id"/>
                                            <input type="submit" name="edit-driver" class="btn btn-primary m-t-15 waves-effect" value="Save Changes"/>
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