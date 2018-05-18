<?php
include_once(dirname(__FILE__) . '/class/include.php');

$id = $_GET['id'];
$RENT_A_CAR = new RentACar($id);
$RENT_A_CAR_PHOTOS = RentACarPhoto::getRentACarPhotosByRentACar($RENT_A_CAR->id);
$CITY = new City($RENT_A_CAR->city);

$today = date("Y-m-d", time());
date_default_timezone_set('Asia/Colombo');
$now = date('Y-m-d H:i:s');

if (isset($_GET['message'])) {
    $message = $_GET['message'];
} else {
    $message = '';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="html 5 template">
        <meta name="author" content="tonytemplates.com">
        <link rel="icon" href="favicon.ico">
        <title><?php echo $RENT_A_CAR->name; ?> | Hurryup Taxi</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/plugins/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/plugins/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <link href="assets/css/plugins/lightslider.min.css" rel="stylesheet" >
        <link href="assets/css/plugins/intlTelInput.min.css" rel="stylesheet" >
        <link href="assets/css/plugins/bootstrap-datetimepicker.css" rel="stylesheet">
        <link href="assets/css/plugins/jquery-ui.css" rel="stylesheet">
        <link href="assets/plugins/timepicki/css/timepicki.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/main-style.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/plugins/nivo-slider.css" rel="stylesheet">



        <!-- Icon Font-->
        <link href="iconfont/style.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    </head>

    <body class="page__details">
        <!-- Loader -->
        <?php
        include './loader.php';
        ?>
        <!-- //Loader -->
        <!-- Header -->
        <?php
        include './header.php';
        ?>
        <!-- // Header -->

        <!-- Content  -->
        <main id="page-content">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs__title"><?php echo $RENT_A_CAR->name; ?></div>
                            <div class="breadcrumbs__items">
                                <div class="breadcrumbs__wrap">
                                    <div class="breadcrumbs__item">
                                        <a href="./" class="breadcrumbs__item-link">Home</a> <span>/</span> <a href="rent-a-car.php" class="breadcrumbs__item-link">Rent A Cars</a> <span>/</span> <a class="breadcrumbs__item-link"><?php echo $RENT_A_CAR->name; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <?php
                if ($message === 'success') {
                    ?>
                    <div class="alert alert-success  alert-dismissible fade in col-md-12">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> Booking was completed successfully. Please check your email.
                    </div>
                    <?php
                } elseif ($message === 'error') {
                    ?>
                    <div class="alert alert-danger  alert-dismissible fade in col-md-12">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong> There was an error. Please try again.
                    </div>
                    <?php
                }
                ?>
            </div>
            <!-- // Breadcrumbs  -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="model-details-box">

                            <div class="model-details-box__inner">
                                <div class="model-details-box__info">
                                    <table class="details-car">
                                        <tr>
                                            <th colspan="2">VEHICLE FEATURES</th>
                                        </tr>
                                        <tr>
                                            <td>Vehicle Type:</td>
                                            <td class="col-width">
                                                <?php
                                                foreach (VehicleType::mainTypes() as $key => $VEHICLE_TYPE) {
                                                    if ($key == $RENT_A_CAR->mainTypes) {
                                                        echo $VEHICLE_TYPE;
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Request Type:</td>
                                            <td>
                                                <?php
                                                foreach (VehicleType::requestTypes() as $key => $REQUEST_TYPE) {
                                                    if ($key == $RENT_A_CAR->requestTypes) {
                                                        echo $REQUEST_TYPE;
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fuel Type:</td>
                                            <td>
                                                <?php
                                                foreach (VehicleType::fuelTypes() as $key => $FUEL_TYPE) {
                                                    if ($key == $RENT_A_CAR->fuelType) {
                                                        echo $FUEL_TYPE;
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>City:</td>
                                            <td><?php echo $CITY->name; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Passengers:</td>
                                            <td><?php echo $RENT_A_CAR->noOfPassengers; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No of Baggage :</td>
                                            <td><?php echo $RENT_A_CAR->noOfBaggage; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No of Doors:</td>
                                            <td><?php echo $RENT_A_CAR->noOfDoors; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Air Conditioned:</td>
                                            <td>
                                                <?php
                                                if ($RENT_A_CAR->airConditioned == 1) {
                                                    echo 'Yes';
                                                } else {
                                                    echo 'No';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="details-car car-rates">
                                        <tr>
                                            <th colspan="2">VEHICLE RATES (per day)</th>
                                        </tr>
                                        <tr>
                                            <td>Self Drive</td>
                                            <td class="col-width"><?php echo 'LKR ' . number_format($RENT_A_CAR->price_self_drive, 2) . '/='; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tours/ Chauffeur Driven</td>
                                            <td><?php echo 'LKR ' . number_format($RENT_A_CAR->price_tours, 2) . '/='; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Weddings & Events</td>
                                            <td><?php echo 'LKR ' . number_format($RENT_A_CAR->price_wedding, 2) . '/='; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Airport/ City Transfers</td>
                                            <td><?php echo 'LKR ' . number_format($RENT_A_CAR->price_airport, 2) . '/='; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="model-slider-wrapper">
                                    <ul id="lightSlider" class="model-slider">
                                        <?php
                                        foreach ($RENT_A_CAR_PHOTOS as $img) {
                                            ?>
                                            <li data-thumb="upload/rent-car-photos/thumb/<?php echo $img['image_name']; ?>">
                                                <img src="upload/rent-car-photos/<?php echo $img['image_name']; ?>" alt="" />
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- // order-details-form  -->
                        <form action="post-and-get/booking.php" class="order-details-form" name="bookingform" id="bookingform" method="post">
                            <div class="inner-form">
                                <h3>Booking Form</h3>
                                <div class="inner-form__elements">
                                    <div class="inner-half">
                                        <h5>New Reservation</h5>
                                        <div class="location">
                                            <input type="text" name="pick_up" id="pick_up" placeholder="Your pickup location">
                                            <i class="icon-placeholder-for-map"></i>
                                        </div>
                                        <div class="location-drop-off">
                                            <input type="text" name="drop_off" id="drop_off" placeholder="Enter drop-off location">
                                            <i class="icon-placeholder-for-map"></i>
                                        </div>
                                        <div class="inner-half__width">
                                            <div class="input-date">
                                                <input type="text" name="pick_up_date" id="datepicker" class="pick_up_date" placeholder="Pick-up date">
                                                <i class="icon-calendar-with-a-clock-time-tools"></i>
                                            </div>
                                            <div class="input-time">
                                                <input type="text" name="pick_up_time" id="timepicker1" class="pick_up_time" placeholder="Pick-up time">
                                                <i class="icon-clock"></i>
                                            </div>
                                        </div>
                                        <div class="inner-half__width">
                                            <div class="input-date">
                                                <input type="text" name="drop_off_date" id="datepicker2" class="drop_off_date" placeholder="Drop-off date">
                                                <i class="icon-calendar-with-a-clock-time-tools"></i>
                                            </div>
                                            <div class="input-time">
                                                <input type="text" name="drop_off_time" id="timepicker2" class="drop_off_time" placeholder="Drop-off time">
                                                <i class="icon-clock"></i>
                                            </div>
                                        </div>
                                        <div class="passengers-luggage">
                                            <div class="passengers">
                                                <span>Passengers*</span>
                                                <select name="no_of_passengers">
                                                    <?php
                                                    $passengers = $RENT_A_CAR->noOfPassengers;
                                                    for ($i = 1; $i <= $passengers; $i++) {
                                                        ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="luggage">
                                                <span>Baggage*</span>
                                                <select name="no_of_baggage">
                                                    <?php
                                                    $baggage = $RENT_A_CAR->noOfBaggage;
                                                    for ($i = 0; $i <= $baggage; $i++) {
                                                        ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-half">
                                        <h5>Passenger's Contact Info</h5>
                                        <div class="inner-half__width">
                                            <div class="first-name">
                                                <input type="text" name="first_name" id="first_name" placeholder="First Name*">
                                            </div>
                                            <div class="last-name">
                                                <input type="text" name="second_name" id="second_name" placeholder="Last Name*">
                                            </div>
                                        </div>

                                        <div class="inner-half__width">
                                            <div class="your-phone">
                                                <input type="tel" name="contact_number" id="contact_number"   placeholder="Your phone">
                                            </div>
                                            <div class="email">
                                                <input type="text" name="email" id="email" placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="specialreguests">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="rent_a_car" value="<?php echo $id; ?>" name="rent_a_car"/>
                                <input type="hidden" id="date_time_booked" value="<?php echo $now; ?>" name="date_time_booked"/>
                                <button type="submit" class="btn" name="book" id="book">Book Now</button>
                            </div>
                        </form>
                        <!-- // order-details-form  -->
                    </div>
                </div>
            </div>
        </main>
        <!-- // Content  -->

        <!-- Footer -->
        <?php
        include './footer.php';
        ?>
        <!-- //Footer -->

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="assets/js/jquery.1.12.4.min.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/plugins/jquery.smartmenus.min.js"></script>
        <script src="assets/js/plugins/jquery.smartmenus.bootstrap.js"></script>
        <script src="assets/js/plugins/stickup.min.js"></script>
        <script src="assets/js/plugins/lightslider.min.js"></script>
        <script src="assets/js/plugins/intlTelInput.min.js"></script>
        <script src="assets/js/plugins/tool.js"></script>
        <script src="assets/js/plugins/moment.js"></script>
        <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/booking-validate.js" type="text/javascript"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="assets/js/plugins/jquery.nivo.slider.js"></script>
        <script src="assets/plugins/timepicki/js/timepicki.js" type="text/javascript"></script>
        <script>

            $(function () {
                $("#datepicker").datepicker({
                    dateFormat: 'yy-mm-dd'
                }).val();
            });
            $(function () {
                $("#datepicker2").datepicker({
                    dateFormat: 'yy-mm-dd'
                }).val();
            });
            $(function () {
                $('#timepicker1').timepicki();
            });
            $(function () {
                $('#timepicker2').timepicki();
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".timepicker_wrap ").hide();
            });
        </script>

    </body>
</html>

