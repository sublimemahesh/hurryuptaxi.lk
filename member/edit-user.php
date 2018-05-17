<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$MEMBER = new User($id);
?> 
﻿<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Edit User || Admin || www.hurryuptaxi.lk</title>

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
                <?php
                if (($_SESSION['id'] == $MEMBER->parent || $_SESSION['id'] == 1)) {
                    ?>

                    <div class="card">
                        <div class="header">
                            <?php
                            if ($MEMBER->id == 1) {
                                ?>
                                <h2>
                                    Edit My Profile
                                </h2>
                                <?php
                            } else {
                                ?>
                                <h2>
                                    Edit Member : <?php echo $MEMBER->username; ?>
                                </h2>
                                <?php
                            }
                            ?> 
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="post-and-get/add-new-user.php" enctype="multipart/form-data"> 

                                <div class="row clearfix"> 
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12"> 
                                        <div class="">

                                            <?php
                                            if ($MEMBER->id != 1) {
                                                ?>
                                                <label for="name" style="margin-left: 15px;">Join in &nbsp; <?php echo $MEMBER->createdAt; ?> </label>
                                                <?php
                                            }
                                            ?>  
                                        </div> 
                                    </div>
                                </div> 
                                <!--Name-->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
                                                <label for="name" class="hidden-lg hidden-md">Name</label>
                                                <input type="text" id="name" class="form-control" placeholder="Enter Member name" autocomplete="off" name="name" required="TRUE" value="<?php echo $MEMBER->name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!--Email-->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                        <label for="name">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="email" class="hidden-lg hidden-md">Email</label>
                                                <input type="email" id="email" class="form-control" placeholder="Enter Email" autocomplete="off" name="email" required="TRUE" value="<?php echo $MEMBER->email; ?>">
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
                                                <select name="district" id="district" class="form-control" required="TRUE" >
                                                    <option value=""> -- Please Select -- </option>
                                                    <?php
                                                    foreach (District::all() as $key => $district) {
                                                        if ($district['id'] == $MEMBER->district) {
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
                                    <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                        <label for="city">City</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group place-select">
                                            <div class="form-line">
                                                <label for="city" class="hidden-lg hidden-md">City</label>
                                                <select class="form-control" autocomplete="off" id="city-bar" autocomplete="off" name="city"  required="TRUE" >
                                                    <option> -- Please Select -- </option> 
                                                    <?php
                                                    $CITY = new City(Null);
                                                    foreach ($CITY->GetCitiesByDistrict($MEMBER->district) as $city) {

                                                        if ($city['id'] == $MEMBER->city) {
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
                                    <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                        <label for="dealer">Dealer</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group place-select">
                                            <div class="form-line">
                                                <label for="dealer" class="hidden-lg hidden-md">Dealer</label>
                                                <select class="form-control" autocomplete="off" type="text" id="dealer" autocomplete="off" name="dealer">
                                                    <option value=""> -- Please Select -- </option>
                                                    <?php
                                                    foreach (User::allDealers() as $key => $dealer) {
                                                        if ($dealer['id'] == $MEMBER->parent) {
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
                                    <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="address" class="hidden-lg hidden-md">Address</label>
                                                <input type="text" id="address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="address" value="<?php echo $MEMBER->address; ?>" required="TRUE" >
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!--Phone Number-->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                        <label for="phone_number">Phone Number</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="phone_number" class="hidden-lg hidden-md">Phone Number</label>
                                                <input type="text" id="phone_number" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off" name="phone_number" value="<?php echo $MEMBER->phone_number; ?>" required="TRUE" >
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!--NIC-->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                        <label for="nic">NIC</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="nic" class="hidden-lg hidden-md">NIC</label>
                                                <input type="text" id="nic" class="form-control" placeholder="Enter Your NIC Number" autocomplete="off" name="nic" value="<?php echo $MEMBER->nic; ?>" required="TRUE" >
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
                                            <label for="image" class="hidden-lg hidden-md">Profile Picture</label>
                                            <input type="file" id="image" class="form-control" name="image" value="<?php echo $MEMBER->profile_picture; ?>">
                                            <?php
                                            if ($MEMBER->profile_picture) {
                                                ?> 
                                                <img src="../upload/user/<?php echo $MEMBER->profile_picture; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div> 
                                <br/>
                                <!--Active-->

                                <?php
                                if ($USER->id == 1) {
                                    ?>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                            <label for="isActive">Status</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="filled-in chk-col-pink" type="checkbox" <?php
                                                if ($MEMBER->isActive == 1) {
                                                    echo 'checked';
                                                }
                                                ?> name="active" value="1" id="rememberme" style="margin-top: 6px;"/>
                                                <label for="rememberme">Activate / InActive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Payment-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                            <label for="payment">Payment</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="payment" class="hidden-lg hidden-md">Payment</label>
                                                    <input type="text" id="payment" class="form-control" placeholder="Enter Payment" autocomplete="off" name="payment" value="<?php echo $MEMBER->payment; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>

                                <!--Bank-->  
                                <hr style="margin-bottom: 10px;"/>
                                <div>
                                    <h4 style="">Bank Details</h4> 
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                        <label for="bank">Bank</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group place-select">
                                            <div class="form-line">
                                                <label for="bank" class="hidden-lg hidden-md">Bank</label>
                                                <select class="form-control" autocomplete="off" type="text" id="bank" autocomplete="off" name="bank">
                                                    <option value=""> -- Please Select -- </option>
                                                    <?php
                                                    foreach (Bank::all() as $key => $bank) {
                                                        if ($bank['id'] == $MEMBER->bank) {
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
                                    <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                        <label for="branch">Branch</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="branch" class="hidden-lg hidden-md">Branch</label>
                                                <input type="text" id="branch" class="form-control" placeholder="Enter Your Branch City" autocomplete="off" name="branch" value="<?php echo $MEMBER->branch; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!--Account Type-->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                        <label for="account_type">Account Type</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group place-select">
                                            <div class="form-line">
                                                <label for="account_type" class="hidden-lg hidden-md">Account Type</label>
                                                <select class="form-control" autocomplete="off" type="text" id="account_type" autocomplete="off" name="account_type"> 
                                                    <option value=""> -- Please Select -- </option> 
                                                    <option value="1" <?php
                                                    if ($MEMBER->account_type == 1) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Saving Account</option>
                                                    <option value="2" <?php
                                                    if ($MEMBER->account_type == 2) {
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
                                    <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                        <label for="holder_name">Holder Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="holder_name" class="hidden-lg hidden-md">Holder Name</label>
                                                <input type="text" id="holder_name" class="form-control" placeholder="Enter Holder Name" autocomplete="off" name="holder_name" value="<?php echo $MEMBER->holder_name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Account Number-->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2  hidden-sm  hidden-xs  form-control-label">
                                        <label for="account_number">Account Number</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="account_number" class="hidden-lg hidden-md">Account Number</label>
                                                <input type="text" id="account_number" class="form-control" placeholder="Enter Account Number" autocomplete="off" name="account_number" value="<?php echo $MEMBER->account_number; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12 text-center">
                                        <input type="hidden" id="oldImageName" value="<?php echo $MEMBER->profile_picture; ?>" name="oldImageName"/>
                                        <input type="hidden" id="id" value="<?php echo $MEMBER->id; ?>" name="id"/>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update" value="update">Save Changes</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <?php
                } else {
                    ?>

                    <div class="card">
                        <div class="header" >
                            <h2 style="color: red">
                                You don't have permission to access this page
                            </h2>
                            <ul class="header-dropdown">
                                <li>
                                    <a href="./">
                                        <i class="material-icons">person</i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <?php
                }
                ?>
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