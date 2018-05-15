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
        <link href="assets/css/plugins/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/plugins/jquery.smartmenus.bootstrap.css" rel="stylesheet">
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

    <body class="page__contacts">
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
                            <div class="breadcrumbs__title">Contacts</div>
                            <div class="breadcrumbs__items">
                                <div class="breadcrumbs__wrap">
                                    <div class="breadcrumbs__item">
                                        <a href="index.html" class="breadcrumbs__item-link">Home</a> <span>/</span> <a href="contacts.html" class="breadcrumbs__item-link">Contacts</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Breadcrumbs  -->
            <section class="contact-map">
                <div id="">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63371.803855932434!2d79.8211858627196!3d6.921922576462158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo!5e0!3m2!1sen!2slk!4v1526367858712" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="contact-info-block">
                    <div class="logo-contacts">
                        <div class="logo">
                            <a href="index.html">
                                <i class="icon-logo"></i>
                                <span>Rental</span>Cars
                            </a>
                        </div>
                    </div>
                    <div class="contact-info">
                        <span class="phone_number"><i class="icon-telephone"></i> 1-800-123-4567</span>
                        <span class="location_info">
                            <i class="icon-placeholder-for-map"></i>
                            <em>The Company Name Inc.</em>
                            <em>9870 St Vincent Place,</em>
                            <em>Glasgow, DC 45 Fr 45.</em> </span>
                    </div>
                    <div class="social-list">
                        <ul class="social-list__icons">
                            <li><a target="_blank" href="https://www.facebook.com/Tonytemplates/?ref=hl"><i class="icon-facebook-logo"></i></a></li>
                            <li><a target="_blank" href="https://twitter.com/tonytemplates/"><i class="icon-twitter-letter-logo"></i></a></li>
                            <li><a target="_blank" href="https://plus.google.com/"><i class="icon-google-plus"></i></a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/uas/login?"><i class="icon-linkedin-logo"></i></a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="wrap-form">
                            <h1>Leave a Message</h1>
                            <form id="contactform" class="contact-form comment-form" name="contactform" method="post" novalidate>
                                <div id="success">
                                    <p>Your message was sent successfully!</p>
                                </div>
                                <div id="error">
                                    <p>Something went wrong, try refreshing and submitting the form again.</p>
                                </div>
                                <div class="input-wrapper first-child">
                                    <input type="text" class="input-custom input-full" name="name" placeholder="Your name">
                                </div>
                                <div class="input-wrapper last-child">
                                    <input type="text" class="input-custom input-full" name="email" placeholder="E-mail">
                                </div>
                                <div class="textarea-wrapper">
                                    <textarea class="textarea-custom input-full" name="Comment" placeholder="Comment"></textarea>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="submit" id="submit" class="btn btn-form">Send message</button>
                                </div>
                            </form>
                        </div>
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

        <!-- Google map -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <!-- Google map -->
        <script src="assets/js/jquery.1.12.4.min.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/plugins/jquery.smartmenus.min.js"></script>
        <script src="assets/js/plugins/jquery.smartmenus.bootstrap.js"></script>
        <script src="assets/js/plugins/jquery.form.js"></script>
        <script src="assets/js/plugins/jquery.validate.min.js"></script>
        <script src="assets/js/plugins/stickup.min.js"></script>
        <script src="assets/js/plugins/tool.js"></script>
        <script src="assets/js/plugins/moment.js"></script>
        <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/custom.js"></script>

    </body>
</html>