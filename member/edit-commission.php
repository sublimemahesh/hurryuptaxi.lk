<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$USER = new User($_SESSION["id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$COMMISSION = new Commission($id);
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Edit Commission || Admin || hurryuptaxi.lk</title>
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
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card" style="margin-top: 20px;">
                            <div class="header">
                                <h2>Edit Commission</h2>

                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/commission.php" enctype="multipart/form-data"> 
                                    <!--User-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="user">User</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <label for="user" class="hidden-lg hidden-md">User</label>
                                                    <select class="form-control" autocomplete="off" type="text" id="user" autocomplete="off" name="user">
                                                        <option value=""> -- Please Select -- </option>
                                                        <?php
                                                        foreach (User::all() as $key => $user) {
                                                            if ($user['id'] == $COMMISSION->user) {
                                                                ?>
                                                                <option value="<?php echo $user['id']; ?>" selected>
                                                                    <?php echo $user['name']; ?>
                                                                </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $user['id']; ?>">
                                                                    <?php echo $user['name']; ?>
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
                                    <!--Member-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="parent">Member</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <label for="parent" class="hidden-lg hidden-md">Member</label>
                                                    <select class="form-control" autocomplete="off" type="text" id="parent" autocomplete="off" name="parent">
                                                        <option value=""> -- Please Select -- </option>
                                                        <?php
                                                        foreach (User::all() as $key => $parent) {
                                                            if ($parent['id'] == $COMMISSION->parent) {
                                                                ?>
                                                                <option value="<?php echo $parent['id']; ?>" selected>
                                                                    <?php echo $parent['name']; ?>
                                                                </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $parent['id']; ?>">
                                                                    <?php echo $parent['name']; ?>
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
                                    <!--Bank-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
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
                                                            if ($bank['id'] == $COMMISSION->bank) {
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
                                    <!--Payment Reference-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="payment_reference">Payment Reference</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="payment_reference" class="hidden-lg hidden-md">Payment Reference</label>
                                                    <input type="text" id="payment_reference" class="form-control" placeholder="Enter Payment Reference" autocomplete="off" name="payment_reference" value="<?php echo $COMMISSION->payment_reference ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Other Comment-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="other_comment">Other Comment</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="">
                                                    <label for="other_comment" class="hidden-lg hidden-md">Other Comment</label>
                                                    <textarea type="text" id="other_comment" class="form-control" placeholder="Enter Other Comment" autocomplete="off" name="other_comment">
                                                        <?php echo $COMMISSION->other_comment ?>
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Save-->
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-4"> 
                                            
                                            <input type="submit" name="edit-commission" class="btn btn-primary m-t-15 waves-effect" value="Save Changes"/>
                                        </div>
                                    </div>

                                </form> 
                            </div>
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
        <script src="js/city.js" type="text/javascript"></script>

    </body>

</html>