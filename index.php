<?php
include_once(dirname(__FILE__) . '/class/include.php');


$CITY = new City(NULL);
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
        <title>Hurryup Taxi | Rent A Car | Sri Lanka</title>
        <!-- Bootstrap core CSS -->
        <script>
            if (top !== self && ['iPad', 'iPhone', 'iPod'].indexOf(navigator.platform) >= 0)
                top.location.replace(self.location.href);
        </script>
        <link href="assets/css/plugins/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/plugins/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <link href="assets/css/plugins/nivo-slider.css" rel="stylesheet">
        <link href="assets/css/plugins/swiper.min.css" rel="stylesheet">
        <link href="assets/css/plugins/intlTelInput.min.css" rel="stylesheet">
        <link href="assets/css/plugins/remodal.min.css" rel="stylesheet">
        <link href="assets/css/plugins/bootstrap-datetimepicker.css" rel="stylesheet">
        <link href="assets/css/plugins/animate.css" rel="stylesheet">
        <link href="assets/css/plugins/jquery-ui.css" rel="stylesheet">
        <link href="assets/css/main-style.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- Icon Font-->
        <link href="iconfont/style.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    </head>

    <body class="page__home">
        <!-- Loader -->
        <?php
        include './loader.php';
        ?>
        <!-- //Loader -->
        <!-- Header -->
        <div id="tt-mobile-top-box">
            <div class="tt-container-toggle">
                <div class="tt-search-toggle tt-toggle-tab">
                    <form id="book-form" class="tt-search-toggle inside" name="form" action="rent-a-car.php" method="get">
                        <div class="book-form__block-select">
                            <div class="tt-row">
                                <div class="tt-col">
                                    <select class="tt-select-small tt-form-control" id="selectPrevTime" name="city">
                                        <option value="">Location</option>
                                        <?php
                                        $cities = $CITY->all();
                                        foreach ($cities as $city) {
                                            ?>
                                            <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                    <select class="tt-select-small tt-form-control" id="selectPrevTime" name="vehicletype">
                                        <option value="">Vehicle Type</option>
                                        <?php foreach (VehicleType::mainTypes() as $key => $VEHICLE_TYPE) {
                                            ?>
                                            <option value="<?php echo $key; ?>"> 
                                                <?php echo $VEHICLE_TYPE; ?>
                                            </option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <select class="tt-select-small tt-form-control" id="selectPrevTime" name="requesttype">
                                        <option value="">Request Type</option>
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
                        <div class="book-form__btn tt-row">
                            <input type="submit" class="btn" id="search" value="SEARCH">
                        </div>


                    </form>
                </div>
            </div>
            <ul class="tt-list-btn">
                <li>
                    <a href="#" data-target="tt-search-toggle" class="tt-btn-toggle">
                        <i class="icon-car2"></i>
                        <span class="tt-text">Search Auto</span>
                    </a>
                </li>
                <li class="header-tp">
                    <a href="#">
                        <i class="icon-telephone"></i>
                        <span class="tt-text">(+)94-77-758-9288</span>
                        <span class="tt-text header-tp2"> / (+)94-77-758-9288</span>
                    </a>
                </li>
                <li class="header-email">
                    <a href="#">
                        <i class="icon-telephone"></i>
                        <span class="tt-text">hurryuptaxi@gmail.com</span>
                    </a>
                </li>
            </ul>
        </div>
        <?php
        include './header.php';
        ?>
        <!-- // Header -->
        <!-- Content  -->
        <main id="page-content">

            <!-- Slider -->
            <?php
            include './slider.php';
            ?>
            <!-- Slider -->
            <!-- Search -->
            <div class="book-form-box">
                <div class="container">
                    <form id="book-form" class="book-form" name="form" action="rent-a-car.php" method="get">
                        <div class="book-form__block-select">
                            <div class="tt-col">
                                <div class="tt-row">
                                    <select class="tt-select-small tt-form-control" id="selectPrevTime" name="city">
                                        <option value="">Location</option>
                                        <?php
                                        $cities = $CITY->all();
                                        foreach ($cities as $city) {
                                            ?>
                                            <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                    <select class="tt-select-small tt-form-control" id="selectPrevTime" name="vehicletype">
                                        <option value="">Vehicle Type</option>
                                        <?php foreach (VehicleType::mainTypes() as $key => $VEHICLE_TYPE) {
                                            ?>
                                            <option value="<?php echo $key; ?>"> 
                                                <?php echo $VEHICLE_TYPE; ?>
                                            </option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <select class="tt-select-small tt-form-control" id="selectPrevTime" name="requesttype">
                                        <option value="">Request Type</option>
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
                        <div class="book-form__btn">
                            <input type="submit" class="btn" id="search" value="SEARCH">
                        </div>
                    </form>

                </div>
            </div>
            <!-- // Search -->
            <!-- Welcome -->
            <div class="parallax_box">
                <figure class="thumbnail move_img wow slideInLeft" data-wow-delay="0.5s"></figure>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6 col-lg-push-6 welcome-text">
                            <p>Siyapatha Taxi & Rent A Car Service (Hurryup Taxi) ඔබට ප්‍රවාහන පහසුකම් ලබා ගත හැකි සහ ප්‍රවාහන පහසුකම් සපයා දිය හැකි අන්තර්ජාල සොදුරු නවාතැනකි. මෙම ක්‍රම වේදය යටතේ සැපයුම්කරුවන්, අතරමැදියන් සහ ගැණුම්කරුවන් එකිනෙකා මුණගැසිමට අවස්ථාවක් උදා වෙන අතර, වාහන ඇති, තැති සැමට ආදායම් මාර්ගයක් සලසා ගත හැකිවේ.එසේම සියළුම ප්‍රවාහන පහසුකම් අපගේ අන්තර්ජාලය හරහා සිදුවන බැවින් වේගවත් ප්‍රවාහන පහසුකම් ලබා ගැනිමට හැකියාවක් මෙමගින් උදාවනු ඇත... </p>
                            <a href="about.php" class="btn">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Welcome -->
            <!-- Vehicle -->
            <section class="blog-posts-carousel">
                <div class="container">
                    <h1>Rent A Cars</h1>
                    <span class="text-link">What you can hire from us</span>
                    <div class="swiper-container swiper-container-blog">
                        <div class="swiper-wrapper gallery">

                            <?php
                            $RENT_A_CARS = RentACar::getActiveVehicles();

                            foreach ($RENT_A_CARS as $key => $car) {
                                if ($key < 9) {
                                    $RENT_A_CAR_PHOTOS = RentACarPhoto::getRentACarPhotosByRentACar($car['id']);
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="gallery__item">
                                            <figure class="gallery__item__image">
                                                <?php
                                                foreach ($RENT_A_CAR_PHOTOS as $key => $img) {
                                                    if ($key === 0) {
                                                        ?>
                                                        <img src="upload/rent-car-photos/thumb/<?php echo $img['image_name'] ?>" alt=""/>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </figure>
                                            <div class="gallery__item__content">
                                                <h6><a href = "view-rent-a-car.php?id=<?php echo $car['id']; ?>" title="<?php echo $car['name']; ?>"><?php
                                                        if (strlen($car['name']) > 26) {
                                                            echo substr($car['name'], 0, 23) . '...';
                                                        } else {
                                                            echo $car['name'];
                                                        }
                                                        ?></a></h6>
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
                                                <a href = "view-rent-a-car.php?id=<?php echo $car['id']; ?>" class="btn">Book Now</a></div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <span class="swiper-button-next2 swiper-button-next"><i class="icon-left-arrow2"></i></span>
                    <span class="swiper-button-prev2 swiper-button-prev"><i class="icon-left-arrow"></i></span>
                    <a href = "rent-a-car.php" class="btn view-vehicle">View More Vehicles <i class="icon-left-arrow2"></i><i class="icon-left-arrow2"></i></a></div>
                </div>
            </section>
            <!-- // Vehicle -->
            <!-- Contact Us -->
            <section class="car-info-box" data-wow-duration="1s" data-wow-delay="1s">
                <div class="car-info-box__description">
                    <div class="desc-inner">
                        <h1>Car Hire</h1>
                        <span class="text-link">Search for the best deals on rental cars</span>
                        <div class="contact-info">
                            <span class="phone_number"><i class="icon-telephone"></i> (+)94-77-758-9288 / <br>(+)94-78-770-1625</span>
                            <span class="phone_number"><i class="icon-black-back-closed-envelope-shape"></i> hurryuptaxi@gmail.com</span>
                            <span class="location_info">
                                <i class="icon-placeholder-for-map"></i>
                                <em>Hurry Up Taxi,</em>
                                <em>Mahaedanda,</em>
                                <em>Karandeniya.</em> 
                            </span>
                        </div>
                    </div>
                </div>
                <figure class="car-info-box__thumb has-second-img">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126908.85489853343!2d80.03612977336915!3d6.2766515187626215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae181d2d5030051%3A0x4ca48deb1176537!2sKarandeniya!5e0!3m2!1sen!2slk!4v1528190605849" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </figure>
            </section>
            <!-- // Contact Us -->
            <!-- Testimonials -->
            <section class="testimonials-carousel_box">
                <div class="container">
                    <h1>Clients Say</h1>
                    <span class="text-link">What our clients say about us</span>
                    <div class="swiper-container-blockquote swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            $COMMENTS = Comments::activeComments();

                            foreach ($COMMENTS as $comment) {
                                ?>
                                <div class="swiper-slide">
                                    <article class="block_tesimonial">
                                        <blockquote>
                                            <div class="inner_blockquote">
                                                <div class="wrapper">
                                                    <p><?php echo $comment['comment']; ?></p>
                                                    <span class="author_info">
                                                        <img src="upload/comments/<?php echo $comment['image_name']; ?>" class="img-circle" alt=""/>
                                                        <span class="name"><?php echo $comment['name']; ?></span>
                                                        <span class="position"><?php echo $comment['city']; ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </article>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="swiper-pagination swiper-pagination-blockquote"></div>
                    <span class="swiper-button-next1"><i class="icon-left-arrow2"></i></span>
                    <span class="swiper-button-prev1"><i class="icon-left-arrow"></i></span>
                </div>
            </section>
            <!-- // Testimonials -->
        </main>
        <!-- // Content  -->
        <!-- Footer -->
        <?php
        include './footer.php';
        ?>
        <!-- //Footer -->
        <!-- Google map -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="assets/js/jquery.1.12.4.min.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/plugins/wow.min.js"></script>
        <script src="assets/js/plugins/jquery.smartmenus.min.js"></script>
        <script src="assets/js/plugins/jquery.smartmenus.bootstrap.js"></script>
        <script src="assets/js/plugins/jquery.nivo.slider.js"></script>
        <script src="assets/js/plugins/swiper.min.js"></script>
        <script src="assets/js/plugins/intlTelInput.min.js"></script>
        <script src="assets/js/plugins/stickup.min.js"></script>
        <script src="assets/js/plugins/tool.js"></script>
        <script src="assets/js/plugins/jquery.form.js"></script>
        <script src="assets/js/plugins/jquery.validate.min.js"></script>
        <script src="assets/js/plugins/moment.js"></script>
        <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>