﻿<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$USE = new User($id);
?> 
﻿<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Edit User || Admin || hurryuptaxi.lk</title>

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
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>

        <section class="content">
            <div class="container-fluid"> 
                <!-- Body Copy -->
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Edit Member
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <h5>
                                            Join With Us : &nbsp; <i class=""><?php echo $USE->createdAt; ?></i> 
                                        </h5>
                                    </li>
                                </ul>
                            </div>

                            <div class="body row">
                                <form class="form-horizontal" method="post" action="post-and-get/add-new-user.php" enctype="multipart/form-data"> 
                                    <!--Name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Member name" autocomplete="off" name="name" required="TRUE" value="<?php echo $USE->name; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Email-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Email</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" id="email" class="form-control" placeholder="Enter Email" autocomplete="off" name="email" required="TRUE" value="<?php echo $USE->email; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--District-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="district">District</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group place-select">
                                                <div class="form-line"> 
                                                    <select name="district" id="district" class="form-control" >
                                                        <option value=""> -- Please Select -- </option>
                                                        <?php
                                                        foreach (District::all() as $key => $district) {
                                                            if ($district['id'] == $USE->district) {
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
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="city">City</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <select class="form-control" autocomplete="off" id="city-bar" autocomplete="off" name="city" required="TRUE">
                                                        <option> -- Please Select -- </option> 
                                                        <?php
                                                        $CITY = new City(Null);
                                                        foreach ($CITY->GetCitiesByDistrict($USE->district) as $city) {

                                                            if ($city['id'] == $USE->city) {
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
                                    <!--Dealer-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="dealer">Dealer</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <select class="form-control" autocomplete="off" type="text" id="dealer" autocomplete="off" name="dealer" required="TRUE">
                                                        <option value=""> -- Please Select -- </option>
                                                        <?php
                                                        foreach (Dealer::all() as $key => $dealer) {
                                                            if ($dealer['id'] == $USE->dealer) {
                                                                ?>
                                                                <option value="<?php echo $dealer['id']; ?>" selected>
                                                                    <?php echo $dealer['name']; ?>
                                                                </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $dealer['id']; ?>">
                                                                    <?php echo $dealer['name']; ?>
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
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="address">Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="address" value="<?php echo $USE->address; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Phone Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="phone_number">Phone Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="phone_number" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off" name="phone_number" value="<?php echo $USE->phone_number; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--NIC-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="nic">NIC</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="nic" class="form-control" placeholder="Enter Your NIC Number" autocomplete="off" name="nic" value="<?php echo $USE->nic; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Profile Picture-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="image">Profile Picture</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" id="image" class="form-control" name="image" value="<?php echo $USE->profile_picture; ?>">
                                                    <img src="../upload/user/<?php echo $USE->profile_picture; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--User Name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="username">User Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="username" class="form-control" placeholder="Enter User Name" autocomplete="off" name="username" required="TRUE" value="<?php echo $USE->username; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <!--Bank-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="bank">Bank</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <select class="form-control" autocomplete="off" type="text" id="bank" autocomplete="off" name="bank" required="TRUE">
                                                        <option value=""> -- Please Select -- </option>
                                                        <?php
                                                        foreach (Bank::all() as $key => $bank) {
                                                            if ($bank['id'] == $USE->bank) {
                                                                ?>
                                                                <option value="<?php echo $bank['id']; ?>" selected>
                                                                    <?php echo $bank['name']; ?>
                                                                </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $bank['id']; ?>">
                                                                    <?php echo $bank['name']; ?>
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
                                    <!--Branch-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="branch">Branch</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="branch" class="form-control" placeholder="Enter Your Branch City" autocomplete="off" name="branch" value="<?php echo $USE->branch; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Account Type-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="account_type">Account Type</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <select class="form-control" autocomplete="off" type="text" id="account_type" autocomplete="off" name="account_type" required="TRUE"> 
                                                        <option value=""> -- Please Select -- </option>
                                                        <option value="1" <?php
                                                        if ($USER->account_type == 1) {
                                                            echo 'selected';
                                                        }
                                                        ?>>Saving Account</option>
                                                        <option value="2" <?php
                                                        if ($USER->account_type == 2) {
                                                            echo 'selected';
                                                        }
                                                        ?>>Current Account</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Holder Name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="holder_name">Holder Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="holder_name" class="form-control" placeholder="Enter Holder Name" autocomplete="off" name="holder_name" value="<?php echo $USE->holder_name; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Account Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="account_number">Account Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="account_number" class="form-control" placeholder="Enter Account Number" autocomplete="off" name="account_number" value="<?php echo $USE->account_number; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Active-->
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="isActive">Account</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <input class="filled-in chk-col-pink" type="checkbox" <?php
                                            if ($USE->isActive == 1) {
                                                echo 'checked';
                                            }
                                            ?> name="active" value="1" id="rememberme" />
                                            <label for="rememberme">Activate</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-2"></div>  

                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <input type="hidden" id="oldImageName" value="<?php echo $USE->profile_picture; ?>" name="oldImageName"/>
                                                <input type="hidden" id="id" value="<?php echo $USE->id; ?>" name="id"/>
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update" value="update">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        <script src="js/add-new-ad.js" type="text/javascript"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="js/city.js" type="text/javascript"></script>

    </body>

</html>