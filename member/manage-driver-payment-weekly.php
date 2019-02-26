<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);
$DRIVER_PAYMENT = new DriverPayment(NULL);


if (isset($_GET['id'])) {
    $id = '';
    $id = $_GET['id'];
}
$asia_date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
$today = $asia_date->format('Y-m-d');

$WEEKLY = new DateTime($today);
$WEEKLY->modify('-7 day');
$weekly = $WEEKLY->format('Y-m-d');
?> 
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Drivers Payments|| Admin || hurryuptaxi.lk</title>
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                                <h2>Driver Payment Weekly</h2>
                                <div class="dropdown pull-right" style="margin-top: -20px;">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select the type
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">                                       
                                        <li><a href="manage-driver-payment-weekly.php?id=<?php echo $id ?>">Weekly</a></li>
                                        <li><a href="manage-driver-payment.php?id=<?php echo $id ?>">Monthly</a></li>
                                    </ul>
                                </div> 
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table id="myTable"class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th> 
                                                <th>Date</th> 
                                                <th>Time</th> 
                                                <th>Price</th>       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($DRIVER_PAYMENT->getPaymentByDriver($weekly, $today, $id) as $key => $driver_payment) {
                                                $key++;
                                                ?>
                                                <tr id="row_<?php echo $driver_payment['id']; ?>">
                                                    <td><?php echo $key; ?></td> 
                                                    <td><?php echo $driver_payment['date']; ?></td> 
                                                    <td><?php echo $driver_payment['time']; ?></td> 
                                                    <td><?php echo number_format($driver_payment['price'], 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>   
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>                                                
                                                <th>Date</th> 
                                                <th>Time</th> 
                                                <th>Price</th>                                              
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
        <script src="delete/js/driver_payment.js" type="text/javascript"></script>

    </body>

</html> 