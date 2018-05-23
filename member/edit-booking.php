<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if($_SESSION["id"] == 1) {
    $disabled = '';
} else {
    $disabled = 'disabled=""';
}

$BOOKING = new Booking($id);
$RENT_A_CAR = new RentACar($BOOKING->rent_a_car);
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>View Booking || Admin || hurryuptaxi.lk</title>
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
                                <h2>View Booking - #<?php echo $id; ?></h2>

                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/booking.php" enctype="multipart/form-data" > 

                                    <!--Rent A Car-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="rentACar">Rent A Car</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="rentACar" class="hidden-lg hidden-md">Rent A Car</label>
                                                    <input type="text" id="rentACar" class="form-control" placeholder="Enter name" value="<?php echo $RENT_A_CAR->name ?>" autocomplete="off" name="rentACar" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--First Name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="first_name">First Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="first_name" class="hidden-lg hidden-md">First Name</label>
                                                    <input type="text" id="first_name" class="form-control" placeholder="Enter first name" value="<?php echo $BOOKING->first_name; ?>" autocomplete="off" name="first_name" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Second Name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="second_name">Second Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="second_name" class="hidden-lg hidden-md">Second Name</label>
                                                    <input type="text" id="second_name" class="form-control" placeholder="Enter second name" value="<?php echo $BOOKING->second_name; ?>" autocomplete="off" name="second_name" required="TRUE" <?php echo $disabled; ?>>
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
                                                    <input type="email" id="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" name="email" value="<?php echo $BOOKING->email ?>" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Phone Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="contact_number">Phone Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="contact_number" class="hidden-lg hidden-md">Phone Number</label>
                                                    <input type="text" id="contact_number" class="form-control" placeholder="Enter Phone Number" autocomplete="off" name="contact_number" value="<?php echo $BOOKING->contact_number ?>" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Pick Up Location-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="pick_up">Pick Up Location</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="pick_up" class="hidden-lg hidden-md">Pick Up Location</label>
                                                    <input type="text" id="pick_up" class="form-control" placeholder="Enter Pick Up Location" autocomplete="off" name="pick_up" value="<?php echo $BOOKING->pick_up; ?>" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Drop Off Location-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="drop_off">Drop Off Location</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="drop_off" class="hidden-lg hidden-md">Drop Off Location</label>
                                                    <input type="text" id="drop_off" class="form-control" placeholder="Enter Pick Up Location" autocomplete="off" name="drop_off" value="<?php echo $BOOKING->drop_off; ?>" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!--Pick Up Date-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="pick_up_date">Pick Up Date</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="pick_up_date" class="hidden-lg hidden-md">Pick Up Date</label>
                                                    <input type="text" id="pick_up_date" class="form-control" placeholder="Enter Pick Up Date" autocomplete="off" name="pick_up_date" value="<?php echo $BOOKING->pick_up_date ?>"  required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Pick Up Time-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="pick_up_time">Pick Up Time</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="pick_up_time" class="hidden-lg hidden-md">Pick Up Time</label>
                                                    <input type="text" id="pick_up_time" class="form-control" placeholder="Enter Pick Up Time" autocomplete="off" name="pick_up_time" value="<?php echo $BOOKING->pick_up_time ?>" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Drop Off Date-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="drop_off_date">Drop Off Date</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="drop_off_date" class="hidden-lg hidden-md">Drop Off Date</label>
                                                    <input type="text" id="drop_off_date" class="form-control" placeholder="Enter Drop Off Date" autocomplete="off" name="drop_off_date" value="<?php echo $BOOKING->drop_off_date ?>" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Drop Off Time-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="drop_off_time">Drop Off Time</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="drop_off_time" class="hidden-lg hidden-md">Drop Off Time</label>
                                                    <input type="text" id="drop_off_time" class="form-control" placeholder="Enter Drop Off Time" autocomplete="off" name="drop_off_time" value="<?php echo $BOOKING->drop_off_time ?>" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--No Of Passengers-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="no_of_passengers">No of Passengers</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="no_of_passengers" class="hidden-lg hidden-md">No Of Passengers</label>
                                                    <input type="text" id="no_of_passengers" class="form-control" placeholder="Enter No Of Passengers" autocomplete="off" name="no_of_passengers" value="<?php echo $BOOKING->no_of_passengers ?>" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--No Of Baggage-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="no_of_baggage">No Of Baggage</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="no_of_baggage" class="hidden-lg hidden-md">No Of Baggage</label>
                                                    <input type="text" id="no_of_baggage" class="form-control" placeholder="Enter No Of Baggage" autocomplete="off" name="no_of_baggage" value="<?php echo $BOOKING->no_of_baggage ?>" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Message-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="message">Message</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="message" class="hidden-lg hidden-md">Message</label>
                                                    <input type="text" id="message" class="form-control" placeholder="Enter Message" autocomplete="off" name="message" value="<?php echo $BOOKING->message ?>" required="TRUE" <?php echo $disabled; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Save-->
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-4"> 
                                            <input type="hidden" id="rent_a_car" class="form-control" value="<?php echo $BOOKING->rent_a_car; ?>" name="rent_a_car">
                                            <input type="hidden" id="id" value="<?php echo $BOOKING->id; ?>" name="id"/>
                                            <input type="submit" name="edit-rent-a-car" class="btn btn-primary m-t-15 waves-effect" value="Save Changes" <?php echo $disabled; ?> />
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