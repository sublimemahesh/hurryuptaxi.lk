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
        <title>Contact Us | Hurryup Taxi</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/plugins/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/plugins/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <link href="assets/css/plugins/bootstrap-datetimepicker.css" rel="stylesheet">
        <link href="assets/css/plugins/jquery-ui.css" rel="stylesheet">
        <link href="assets/css/main-style.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="contact-form/style.css" rel="stylesheet" type="text/css"/>
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
                                        <a href="index.html" class="breadcrumbs__item-link">Home</a> <span>/</span> <a class="breadcrumbs__item-link">Contacts</a>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126908.85489853343!2d80.03612977336915!3d6.2766515187626215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae181d2d5030051%3A0x4ca48deb1176537!2sKarandeniya!5e0!3m2!1sen!2slk!4v1528190605849" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
                
                </div>
                <div class="contact-info-block">
                    <div class="logo-contacts">
                        <div class="logo">
                            <img src="images/logo/logo.png" alt=""/>
                        </div>
                    </div>
                    <div class="contact-info">
                        <span class="phone_number"><i class="icon-telephone"></i> (+)94-77-758-9288 / (+)94-78-770-1625</span>
                        <span class="phone_number"><i class="icon-black-back-closed-envelope-shape"></i> hurryuptaxi@gmail.com</span>
                        <span class="location_info">
                            <i class="icon-placeholder-for-map"></i>
                            <em>Hurry Up Taxi,</em>
                            <em>Mahaedanda,</em>
                            <em>Karandeniya.</em>
                        </span>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title text-center title-three no-margin">
                                        <div class="title-border">
                                            <h1 class="h1style">Send <span>Your message</span></h1>
                                        </div>
                                    </div>

                                    <div class="contact-form">
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-6">
                                                <label class="labelcon">Your Name</label>
                                                <span id="star">*</span>
                                                <input type="text" name="txtFullName" id="txtFullName" class="form-control input-validater">
                                                <span id="spanFullName" ></span>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <label class="labelcon">Your Email</label>
                                                <span id="star">*</span>
                                                <input type="text" name="txtEmail" id="txtEmail" class="form-control input-validater">
                                                <span id="spanEmail" ></span>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-6">
                                                <label class="labelcon">Your Country</label>
                                                <span id="star">*</span>
                                                <input type="text" name="txtCountry"  id="txtCountry" class="form-control input-validater">
                                                <span id="spanCountry" ></span>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <label class="labelcon">Your Contact Numbers</label>
                                                <input type="text" name="txtPhone" id="txtPhone" class="form-control input-validater">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-12">
                                                <label class="labelcon">Subject</label>
                                                <span id="star">*</span>
                                                <input type="text" name="txtSubject"  id="txtSubject" class="form-control input-validater">
                                                <span id="spanSubject" ></span>
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label class="labelcon">Your Message</label>
                                            <span id="star">*</span>
                                            <textarea name="txtMessage"  id="txtMessage" rows="6" class="form-control" placeholder="write message here"></textarea>
                                            <span id="spanMessage" ></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <label class="labelcon" for="comment">Security Code:</label>
                                                    <span id="star">*</span> 
                                                    <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the security code >> ">
                                                    <span id="capspan" ></span> 
                                                </div>
                                                <div class="col-sm-3"> 
                                                    <?php include("./contact-form/captchacode-widget.php"); ?> 
                                                </div>  
                                                <div class="col-sm-4">
                                                    <div class="div-check" >
                                                        <img src="contact-form/img/checking.gif" id="checking"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-8 text-right contact-btn">
                                            <button type="submit" id="btnSubmit" class="cp-btn-style1">SEND YOUR MESSAGE</button>
                                        </div> 
                                        <div id="dismessage" align="center"></div>
                                    </div>
                                </div>
                            </div>
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
        <script src="contact-form/scripts.js" type="text/javascript"></script>
    </body>
</html>