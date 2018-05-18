<?php
include_once(dirname(__FILE__) . '/class/include.php');
$RENT_A_CARS = RentACar::all();
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
        <title>Rent a car | Hurryup Taxi</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/plugins/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/plugins/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <link href="assets/css/plugins/swiper.min.css" rel="stylesheet">
        <link href="assets/css/plugins/intlTelInput.min.css" rel="stylesheet" >
        <link href="assets/css/plugins/remodal.min.css" rel="stylesheet" >
        <link href="assets/css/plugins/nouislider.min.css" rel="stylesheet" >
        <link href="assets/css/plugins/bootstrap-datetimepicker.css" rel="stylesheet">
        <link href="assets/css/plugins/jquery-ui.css" rel="stylesheet">
        <link href="assets/css/main-style.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

        <!-- Icon Font-->
        <link href="iconfont/style.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    </head>

    <body class="page__fleet">
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
                            <div class="breadcrumbs__title">Rent A Cars</div>
                            <div class="breadcrumbs__items">
                                <div class="breadcrumbs__wrap">
                                    <div class="breadcrumbs__item">
                                        <a href="./" class="breadcrumbs__item-link">Home</a> <span>/</span> <a class="breadcrumbs__item-link">Rent A Cars</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Breadcrumbs  -->
            <section class="isotop-box">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="gallery row" id="gallery">
                                <?php
                                foreach ($RENT_A_CARS as $car) {
                                    $RENT_A_CAR_PHOTOS = RentACarPhoto::getRentACarPhotosByRentACar($car['id']);
                                    ?>
                                    <div class="gallery__item col-xs-12 col-sm-6 col-xl-3">
                                        <figure class="gallery__item__image">
                                            <a class="hover" href="view-rent-a-car.php?id=<?php echo $car['id']; ?>">
                                                <?php
                                                foreach ($RENT_A_CAR_PHOTOS as $key => $img) {
                                                    if ($key === 0) {
                                                        ?>
                                                        <img src="upload/rent-car-photos/thumb/<?php echo $img['image_name'] ?>" alt=""/>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <i class = "icon-arrow-down-sign-to-navigate2"></i>
                                            </a>
                                        </figure>
                                        <div class = "gallery__item__content">
                                            <h6><a href = "view-rent-a-car.php?id=<?php echo $car['id']; ?>"><?php echo $car['name']; ?></a></h6>
                                            <ul class = "tt-list-descriptions">
                                                <li>
                                                    <i class = "tt-icon icon-car"></i>
                                                    Vehicle Type: <span>
                                                        <?php
                                                        foreach (VehicleType::mainTypes() as $key => $VEHICLE_TYPE) {
                                                            if ($key == $car['mainTypes']) {
                                                                echo $VEHICLE_TYPE;
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class = "tt-icon icon-logo"></i>
                                                    Request Type: 
                                                    <?php
                                                    foreach (VehicleType::requestTypes() as $key => $REQUEST_TYPE) {
                                                        if ($key == $car['requestTypes']) {
                                                            ?>
                                                            <span title="<?php echo $REQUEST_TYPE; ?>">
                                                                <?php
                                                                if (strlen($REQUEST_TYPE) > 21) {
                                                                    echo substr($REQUEST_TYPE, 0, 20) . '...';
                                                                } else {
                                                                    echo $REQUEST_TYPE;
                                                                }
                                                                ?>
                                                            </span>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                </li>
                                                <li>
                                                    <i class = "tt-icon icon-manual_g"></i>
                                                    Fuel Type: <span>
                                                        <?php
                                                        foreach (VehicleType::fuelTypes() as $key => $FUEL_TYPE) {
                                                            if ($key == $car['fuelType']) {
                                                                echo $FUEL_TYPE;
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                </li>
                                                <li class="icon-list">
                                                    <ul class="inline">
                                                        <li title="Passengers">
                                                            <i class = "tt-icon icon-group"></i>
                                                            <span><?php echo $car['noOfPassengers']; ?></span>
                                                        </li>
                                                        <li title="Baggages">
                                                            <i class = "tt-icon icon-luggage"></i>
                                                            <span><?php echo $car['noOfBaggage']; ?></span>
                                                        </li>
                                                        <li title="Doors">
                                                            <i class = "tt-icon icon-car-door"></i>
                                                            <span><?php echo $car['noOfDoors']; ?></span>
                                                        </li>
                                                        <li title="Air Conditioned">
                                                            <i class = "tt-icon icon-snowflake"></i>
                                                            <span>
                                                                <?php
                                                                if ($car['airConditioned'] == 1) {
                                                                    echo 'Yes';
                                                                } else {
                                                                    echo 'No';
                                                                }
                                                                ?>
                                                            </span>
                                                        </li>
                                                    </ul>


                                                </li>

                                            </ul>
                                            <a href = "view-rent-a-car.php?id=<?php echo $car['id']; ?>" class="btn">View More</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div> <!-- //row -->
                </div> <!-- //Container -->
            </section>

        </main>
        <!-- // Content  -->

        <!-- Footer -->
        <?php
        include './footer.php';
        ?>
        <!-- //Footer -->

        <?php
        include './add-order.php';
        ?>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="assets/js/jquery.1.12.4.min.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/plugins/jquery.smartmenus.min.js"></script>
        <script src="assets/js/plugins/jquery.smartmenus.bootstrap.js"></script>
        <script src="assets/js/plugins/swiper.min.js"></script>
        <script src="assets/js/plugins/stickup.min.js"></script>
        <script src="assets/js/plugins/intlTelInput.min.js"></script>
        <script src="assets/js/plugins/remodal.js"></script>
        <script src="assets/js/plugins/tool.js"></script>
        <script src="assets/js/plugins/nouislider.min.js"></script>
        <script src="assets/js/plugins/wnumb.js"></script>
        <script src="assets/js/plugins/jquery.form.js"></script>
        <script src="assets/js/plugins/jquery.validate.min.js"></script>
        <script src="assets/js/plugins/moment.js"></script>
        <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>