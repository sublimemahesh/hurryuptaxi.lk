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
                <div class="tt-call-toggle tt-toggle-tab">
                    <div class="inside">
                        <ul>
                            <li>
                                <a href="skype:rentalcars?chat">
                                    <i class="tt-icon icon-skype-logo"></i>
                                    rentalcars
                                </a>
                            </li>
                            <li>
                                <a href="skype:+1-800-123-4567?call">
                                    <i class="tt-icon icon-whatsapp"></i>
                                    +1-800-123-4567
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="tt-icon icon-telegram"></i>
                                    #rentalcars
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@mailinfo.com">
                                    <i class="tt-icon icon-black-back-closed-envelope-shape"></i>
                                    info@mailinfo.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tt-map-toggle tt-toggle-tab">
                    <div id="contacts-map-main"></div>
                </div>
                <div class="tt-phrase-toggle tt-toggle-tab">
                    <div class="inside">
                        <form action="#" class="form-inline">
                            <div class="tt-col col">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="tt-col col-auto">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <ul class="tt-list-btn">
                <li><a href="#" data-target="tt-search-toggle" class="tt-btn-toggle">
                        <i class="icon-car2"></i>
                        <span class="tt-text">Search Auto</span>
                    </a></li>
                <li><a href="#" data-target="tt-call-toggle" class="tt-btn-toggle">
                        <i class="icon-telephone"></i>
                        <span class="tt-text">Call</span>
                    </a></li>
                <li><a href="#" data-target="tt-map-toggle" class="tt-btn-toggle">
                        <i class="icon-placeholder-for-map"></i>
                        <span class="tt-text">Find us</span>
                    </a></li>
                <li><a href="#" data-target="tt-phrase-toggle" class="tt-btn-toggle tt-btn-always">
                        <i class="icon-magnifying-glass"></i>
                    </a></li>
                <li><a href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="tt-text">EN</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="drodown-item"><a href="#">German</a></li>
                        <li class="drodown-item"><a href="#">France</a></li>
                        <li class="drodown-item"><a href="#">Italian</a></li>
                    </ul>
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
                        <div class="col-sm-12 col-lg-6 col-lg-push-6">
                            <h1>Welcome</h1>
                            <p>Hiring a car just got easier with the reliable service of Car Rental Service! Having covered all the 50 states in America, we offer the finest choice of vehicles ranging from economy to luxury.</p>
                            <p>We have tied up with renowned car rental brands so that we can provide our customers with the most economic car rental deals along with world class customer service. </p>
                            <ul class="list__marker">
                                <li>Best price guarantee</li>
                                <li>No cancellation or amendment fees</li>
                                <li>No hidden extras to pay - theft and damage cover included</li>
                            </ul>
                            <a href="services.html" class="btn">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Welcome -->
            <!-- Vehicle -->
            <div class="services-box">
                <div class="container">
                    <div class="box-list-posts swiper-container-services swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            $RENT_A_CARS = RentACar::all();

                            foreach ($RENT_A_CARS as $car) {
                                $RENT_A_CAR_PHOTOS = RentACarPhoto::getRentACarPhotosByRentACar($car['id']);
                                ?>
                                <!--<div class="col-md-3 col-sm-6 col-xs-12">-->
                                <div class="swiper-slide">
                                    <div class="post-column">
                                        <figure class="thumbnail">
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
                                        <div class="post-column__content">
                                            <h3>
                                                <a href="view-rent-a-car.php?id=<?php echo $car['id']; ?>"><?php echo $car['name']; ?></a>
                                            </h3>
                                            <span class="text-link">Vehicle Type - 
                                                <?php
                                                foreach (VehicleType::mainTypes() as $key => $VEHICLE_TYPE) {
                                                    if ($key == $car['mainTypes']) {
                                                        echo $VEHICLE_TYPE;
                                                    }
                                                }
                                                ?>
                                            </span>
                                            <span class="text-link">Request Type - 
                                                <?php
                                                foreach (VehicleType::requestTypes() as $key => $REQUEST_TYPE) {
                                                    if ($key == $car['requestTypes']) {
                                                        echo $REQUEST_TYPE;
                                                    }
                                                }
                                                ?>
                                            </span>
                                            <span class="text-link">Fuel Type - 
                                                <?php
                                                foreach (VehicleType::fuelTypes() as $key => $FUEL_TYPE) {
                                                    if ($key == $car['fuelType']) {
                                                        echo $FUEL_TYPE;
                                                    }
                                                }
                                                ?>
                                            </span>
                                            <a href="view-rent-a-car.php?id=<?php echo $car['id']; ?>" class="btn btn__marker"><i class="icon-arrows"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!--</div>-->
                                <?php
                            }
                            ?>
                        </div>
                        <div class="swiper-pagination swiper-pagination-services"></div>
                    </div>
                    <!-- // box-list-posts  -->
                </div>
            </div>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63371.803855932434!2d79.8211858627196!3d6.921922576462158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo!5e0!3m2!1sen!2slk!4v1526367858712" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                            <div class="swiper-slide">
                                <article class="block_tesimonial">
                                    <blockquote>
                                        <div class="inner_blockquote">
                                            <div class="wrapper">
                                                <p>I was very pleased once again. Hiring online was easy, collection was straight forward, and returning the car was quick. A very good experience! Thank you.</p>
                                                <span class="author_info">
                                                    <img src="assets/images/author_img.png" alt="">
                                                    <span class="name">Thomas Burgess</span>
                                                    <span class="position">Regular Customer</span>
                                                </span>
                                            </div>
                                        </div>
                                    </blockquote>
                                </article>
                            </div>
                            <div class="swiper-slide">
                                <article class="block_tesimonial">
                                    <blockquote>
                                        <div class="inner_blockquote">
                                            <div class="wrapper">
                                                <p>This is the second time this year that I have rented a Rental Cars direct vehicle and the cars were both virtually brand new. Awesome cars and very kind, helpful staff. Thank you!</p>
                                                <span class="author_info">
                                                    <img src="assets/images/author_img_1.png" alt="">
                                                    <span class="name">Donald Alford</span>
                                                    <span class="position">Regular Customer</span>
                                                </span>
                                            </div>
                                        </div>
                                    </blockquote>

                                </article>
                            </div>
                            <div class="swiper-slide">
                                <article class="block_tesimonial">
                                    <blockquote>
                                        <div class="inner_blockquote">
                                            <div class="wrapper">
                                                <p>Great Service, Absolutely Terrific staff, extremely professional!!! This was my first ever Car Renting experience, Awesome!!</p>
                                                <span class="author_info">
                                                    <img src="assets/images/author_img_2.png" alt="">
                                                    <span class="name">James Knudsen</span>
                                                    <span class="position">Regular Customer</span>
                                                </span>
                                            </div>
                                        </div>
                                    </blockquote>
                                </article>
                            </div>
                            <div class="swiper-slide">
                                <article class="block_tesimonial">
                                    <blockquote>
                                        <div class="inner_blockquote">
                                            <div class="wrapper">
                                                <p>Im really impressed with your staff at all moosa branch, patricia. She has sevice minded, be attentive, proactive. I think you have a very value staff with you.</p>
                                                <span class="author_info">
                                                    <img src="assets/images/author_img_3.png" alt="">
                                                    <span class="name">Bruce Justice</span>
                                                    <span class="position">Regular Customer</span>
                                                </span>
                                            </div>
                                        </div>
                                    </blockquote>
                                </article>
                            </div>
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