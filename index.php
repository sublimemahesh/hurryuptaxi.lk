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
        <title>Rent a car - HTML 5 TEMPLATE</title>
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
        <!-- Color Tool -->
        <?php
        include './color-tools.php';
        ?>
        <!-- //Color Tool -->

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

            <!-- Slider -->
            <?php
            include './slider.php';
            ?>
            <!-- Slider -->
            <!-- Search -->
            <div class="book-form-box">
                <div class="container">
                    <form id="book-form" class="book-form" action="#">
                        <div class="book-form__block-select">
                            <div class="tt-col">
                                <div class="tt-row">
                                    <select class="tt-select-small tt-form-control" id="selectPrevTime">
                                        <option value="Location">Location</option>
                                        <option value="Galle">Galle</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Matara">Matara</option>
                                        <option value="Kandy">Kandy</option>
                                    </select>
                                    <select class="tt-select-small tt-form-control" id="selectPrevTime">
                                        <option value="VTYPE">Vehicle Type</option>
                                        <option value="Car">Car</option>
                                        <option value="Van">Van</option>
                                        <option value="Bus">Bus</option>
                                    </select>
                                    <select class="tt-select-small tt-form-control" id="selectPrevTime">
                                        <option value="RTYPE">Request Type</option>
                                        <option value="">Self Drive</option>
                                        <option value="">Wedding & Event</option>
                                        <option value="">Airport / City Transfer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="book-form__btn">
                            <input type="submit" class="btn" id="setDateBtn" data-remodal-target="modal" value="SEARCH">
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
                            <div class="col-md-3">
                                <div class="swiper-slide">
                                    <div class="post-column">
                                        <figure class="thumbnail"><img src="assets/images/post-sm-img-1.jpg" alt=""></figure>
                                        <div class="post-column__content">
                                            <h3><a href="#">Hyundai i30</a></h3>
                                            <span class="text-link">Request Type - Self Drive</span>
                                            <span class="text-link">Fuel Type - Diesel</span>
                                            <a href="vehicles.php" class="btn btn__marker"><i class="icon-arrows"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="swiper-slide">
                                    <div class="post-column">
                                        <figure class="thumbnail"><img src="assets/images/post-sm-img-2.jpg" alt=""></figure>
                                        <div class="post-column__content">
                                            <h3><a href="#">Hyundai i30</a></h3>
                                            <span class="text-link">Request Type - Self Drive</span>
                                            <span class="text-link">Fuel Type - Diesel</span>
                                            <a href="services.html" class="btn btn__marker"><i class="icon-arrows"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="swiper-slide">
                                    <div class="post-column">
                                        <figure class="thumbnail"><img src="assets/images/post-sm-img-3.jpg" alt=""></figure>
                                        <div class="post-column__content">
                                            <h3><a href="#">Hyundai i30</a></h3>
                                            <span class="text-link">Request Type - Self Drive</span>
                                            <span class="text-link">Fuel Type - Diesel</span>
                                            <a href="services.html" class="btn btn__marker"><i class="icon-arrows"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="swiper-slide">
                                    <div class="post-column">
                                        <figure class="thumbnail"><img src="assets/images/post-sm-img-3.jpg" alt=""></figure>
                                        <div class="post-column__content">
                                            <h3><a href="#">Hyundai i30</a></h3>
                                            <span class="text-link">Request Type - Self Drive</span>
                                            <span class="text-link">Fuel Type - Diesel</span>
                                            <a href="services.html" class="btn btn__marker"><i class="icon-arrows"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <span class="phone_number"><i class="icon-telephone"></i> 1-800-123-4567</span>
                            <span class="location_info">
                                <i class="icon-placeholder-for-map"></i>
                                <em>The Company Name Inc.</em>
                                <em>9870 St Vincent Place,</em>
                                <em>Glasgow, DC 45 Fr 45.</em>
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
        <?php
        include './add-order.php';
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
        <script src="assets/js/plugins/remodal.js"></script>
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