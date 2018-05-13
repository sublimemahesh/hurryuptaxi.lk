<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);

$USE = new User(NULL);
?> 
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Edit Profile Admin || hurryuptaxi.lk || Sublime Web Manager</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';

        if ($USER->id == 1) {
            ?>
            <section class="content">
                <div class="container-fluid"> 
                    <?php
                    if (isset($_GET['message'])) {

                        $MESSAGE = New Message($_GET['message']);
                        ?>
                        <div class="alert alert-<?php echo $MESSAGE->status; ?>" role = "alert">
                            <?php echo $MESSAGE->description; ?>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card" style="margin-top: 20px;">
                                <div class="header">
                                    <h2> Edit Your Profile</h2>
                                </div>
                                <div class="body row">
                                    <form class="form-horizontal col-sm-12 col-md-12" method="post" action="post-and-get/add-new-user.php" enctype="multipart/form-data"> 
                                        <!--Name-->
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="name">Name</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="name" class="form-control" placeholder="Enter your name" value="<?php echo $USER->name; ?>"  name="name"  required="TRUE">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Username-->
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="username" class="form-control" placeholder="Enter your username" value="<?php echo $USER->username; ?>" name="username" required="TRUE">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <!--Email-->
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="email" id="email" class="form-control" placeholder="Enter your email" value="<?php echo $USER->email; ?>" name="email" required="TRUE">
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
                                                        <input type="file" id="image" class="form-control" name="image" value="<?php echo $USER->profile_picture; ?>">
                                                        <img src="../upload/user/<?php echo $USER->profile_picture; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">
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
                                                                if ($district['id'] == $USER->district) {
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
                                                            foreach ($CITY->GetCitiesByDistrict($USER->district) as $city) {

                                                                if ($city['id'] == $USER->city) {
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
                                                                if ($dealer['id'] == $USER->dealer) {
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
                                                        <input type="text" id="address" class="form-control" placeholder="Enter Your Address" autocomplete="off" name="address" value="<?php echo $USER->address; ?>">
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
                                                        <input type="text" id="phone_number" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off" name="phone_number" value="<?php echo $USER->phone_number; ?>">
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
                                                        <input type="text" id="nic" class="form-control" placeholder="Enter Your NIC Number" autocomplete="off" name="nic" value="<?php echo $USER->nic; ?>">
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
                                                                if ($bank['id'] == $USER->bank) {
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
                                                        <input type="text" id="branch" class="form-control" placeholder="Enter Your Branch City" autocomplete="off" name="branch" value="<?php echo $USER->branch; ?>">
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
                                                        <input type="text" id="holder_name" class="form-control" placeholder="Enter Holder Name" autocomplete="off" name="holder_name" value="<?php echo $USER->holder_name; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Account Type-->
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="account_number">Account Number</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="account_number" class="form-control" placeholder="Enter Account Number" autocomplete="off" name="account_number" value="<?php echo $USER->account_number; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

                                                <input type="hidden" id="id" value="<?php echo $USER->id; ?>" name="id"/>
                                                <input type="hidden" id="authToken" value="<?php echo $_SESSION["authToken"]; ?>" name="authToken"/>
                                                <input type="hidden" id="oldImageName" value="<?php echo $USER->profile_picture; ?>" name="oldImageName"/>
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update" value="submit">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <?php
        } else {
            ?>
            <section class="content">
                <div class="container-fluid"> 
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header" >
                                    <h2 style="color: red">
                                        You don`t have acces this page. Pleace inform admin change your details
                                    </h2>
                                    <ul class="header-dropdown">
                                        <li>
                                            <a href="profile.php">
                                                <i class="material-icons">person</i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <?php
    }
    ?>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script> 
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/add-new-ad.js" type="text/javascript"></script>
    <script src="js/city.js" type="text/javascript"></script>

</body>

</html>