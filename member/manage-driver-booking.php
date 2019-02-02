<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);
$id = '';
$id = $_GET['id'];
$APPBOOKING = new AppBooking($id);
?> 
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Driver || Admin || hurryuptaxi.lk</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <link href="plugins/node-waves/waves.css" rel="stylesheet" >

        <link href="plugins/animate-css/animate.css" rel="stylesheet" >
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" >
        <link href="css/style.css" rel="stylesheet">

        <link href="css/themes/all-themes.css" rel="stylesheet">
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>
        <section class="content">
            <div class="container-fluid"> 
                <!-- Manage Districts -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card" style="margin-top: 20px;">
                            <div class="header">
                                <h2>
                                    Manage Driver Bookings
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="create-driver.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">

                                     <table id="myTable"class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Customer</th>
                                                <th>Driver</th>                                                 
                                                <th>Pick up</th>
                                                <th>Destination</th>
                                                <th>Date / Time</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($APPBOOKING->getBookingsByDriver($id) as $key => $app_booking) {
                                                $key++;
                                                ?>
                                                <tr id="row_<?php echo $app_booking['id'] ?>">
                                                    <td><?php echo $key; ?></td> 
                                                    <td><?php
                                                        $CUSTOMER = new Customer($app_booking['customer']);
                                                        echo $CUSTOMER->name;
                                                        ?></td>  
                                                    <td><?php
                                                        $DRIVER = new Driver($app_booking['driver']);
                                                        echo $DRIVER->name;
                                                        ?></td>
                                                    <td><?php echo $app_booking['pickup']; ?></td>
                                                    <td><?php echo $app_booking['destination']; ?></td>
                                                    <td><?php echo $app_booking['date_time']; ?></td>
                                                    <td><?php echo $app_booking['price']; ?></td>
                                                    <td><?php
                                                        if ($app_booking['status'] == 1) {
                                                            echo'<p style=color:blue;>Pending</p>';
                                                        } else if ($app_booking['status'] == 2) {
                                                            echo '<p style=color:green;>Excepted</p>';
                                                        } elseif ($app_booking['status'] == 3) {
                                                            echo '<p style=color:red;>Cancel</p>';
                                                        } else {
                                                            echo '<p style=color:black;>NO responce</p>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td> 
                                                        <a href="#" class="delete-app-booking btn btn-sm btn-danger" data-id="<?php echo $app_booking['id']; ?>">
                                                            <i class="glyphicon glyphicon-trash" data-type="cancel"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>   
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Customer</th>
                                                <th>Driver</th>                                                 
                                                <th>Pick up</th>
                                                <th>Destination</th>
                                                <th>Date / Time</th>
                                                <th>Price</th>
                                                <th>Status</th>                                                
                                                <th>Options</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script>
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/pages/tables/jquery-datatable.js"></script>
        <script src="js/demo.js"></script>
        <script src="delete/js/member.js" type="text/javascript"></script>
        <script src="delete/js/driver.js" type="text/javascript"></script>

    </body>

</html> 