<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);

date_default_timezone_set('Asia/Colombo');

$createdAt = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Register New Member || www.hurryuptaxi.lk</title>
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
        <!-- Bootstrap Spinner Css -->
        <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?> 
        <section class="content">
            <div class="container-fluid"> 
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <!-- Vertical Layout -->
                <div class="card" style="margin-top: 20px;">
                    <div class="header">
                        <h2>Register New Member</h2>
                        <ul class="header-dropdown">
                            <li class="">
                                <a href="manage-user.php">
                                    <i class="material-icons">list</i> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form class="form-horizontal"  method="post" action="post-and-get/add-new-user.php" enctype="multipart/form-data"> 
                            <!--name-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" class="form-control" required="TRUE" placeholder="Member Name" autocomplete="off" name="name" >
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Email-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Member Email" autocomplete="off" required="TRUE" >
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
                                            <select class="form-control" autocomplete="off" type="text" id="district" autocomplete="off" name="district" required="TRUE">
                                                <option value=""> -- Select District -- </option>
                                                <?php foreach (District::all() as $key => $city) {
                                                    ?>
                                                    <option ind_id="<?php echo $city['id']; ?>" value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option><?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--City-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="city">City</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group place-select">
                                        <div class="form-line">
                                            <select class="form-control" autocomplete="off" type="text" id="city-bar" autocomplete="off" name="city" required="TRUE">
                                                <option value=""> -- Please Select a District First -- </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Dealer-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="dealer">Dealer</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group place-select">
                                        <div class="form-line">
                                            <select class="form-control" autocomplete="off" type="text" id="dealer" autocomplete="off" name="dealer">
                                                <option value=""> -- Select Dealer -- </option>
                                                <?php foreach (Dealer::all() as $key => $dealer) {
                                                    ?>
                                                    <option value="<?php echo $dealer['id']; ?>">
                                                        <?php echo $dealer['name']; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Address-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="address">Address</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="address" name="address" class="form-control" placeholder="Member Address" autocomplete="off"  required="TRUE">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Phone Number-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="phone_number">Phone Number</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="phone_number" class="form-control" placeholder="Member Phone Number" autocomplete="off" name="phone_number"  required="TRUE">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--NIC-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="nic">NIC</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nic" class="form-control" placeholder="Member NIC Number" autocomplete="off" name="nic" required="TRUE">
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
                                        <div class="form-line">
                                            <label for="image" class="hidden-lg hidden-md">Profile Picture</label>
                                            <input type="file" id="image" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--username-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="username">Username</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="username" class="hidden-lg hidden-md">Username</label>
                                            <input type="text" id="username" class="form-control"  required="TRUE" value="<?php echo User::getNextAvailableUsername(); ?>" disabled="TRUE" name="username">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Password-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="name">Password</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="password" class="hidden-lg hidden-md">Password</label>
                                            <input type="text" id="password" class="form-control" value="abc123" name="password"  required="TRUE">
                                            <input type="hidden" id="createdAt" name="createdAt" value="<?php echo $createdAt; ?>">
                                            <input type="hidden" id="parent" name="parent" value="<?php echo $_SESSION["id"]; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <br/> 
                            <!--Bank-->  
                            <hr style="margin-bottom: 10px;"/>
                            <div>
                                <h4 style="">Bank Details</h4> 
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="bank">Bank</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group place-select">
                                        <div class="form-line">
                                            <select class="form-control" autocomplete="off" type="text" id="bank" autocomplete="off" name="bank">
                                                <option value=""> -- Select Bank -- </option>
                                                <?php foreach (Bank::all() as $key => $bank) {
                                                    ?>
                                                    <option value="<?php echo $bank['id']; ?>">
                                                        <?php echo $bank['name']; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Branch-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="branch">Branch</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="branch" class="form-control" placeholder="Branch of The Bank" autocomplete="off" name="branch">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Account Type-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="account_type">Account Type</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group place-select">
                                        <div class="form-line">
                                            <select class="form-control" autocomplete="off" type="text" id="account_type" autocomplete="off" name="account_type">
                                                <option value="0"> -- Select Account Type -- </option>
                                                <option value="1">Saving Account</option>
                                                <option value="2">Current Account</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Holder Name-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="holder_name">Holder Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="holder_name" class="form-control" placeholder="Enter Holder Name" autocomplete="off" name="holder_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Account Type-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="account_number">Account Number</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="account_number" class="form-control" placeholder="Enter Account Number" autocomplete="off" name="account_number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--save-->
                            <div class="row clearfix">
                                <div class="col-md-12 text-center"> 

                                    <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect center-block" value="Register Member"/>
                                </div>
                            </div>

                        </form> 
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
        <script src="js/city.js" type="text/javascript"></script>

    </body>

</html>