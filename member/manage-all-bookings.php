<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);
$RENT_A_CAR = new RentACar(NULL);

if ($_SESSION["id"] == 1) {
    $BOOKINGS = Booking::all();
}
?> 
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Bookings || Admin || hurryuptaxi.lk</title>
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
                                    Manage Bookings
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="#">
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
                                                <th>Booked Date</th>
                                                <th>Rent A Car</th> 
                                                <th>Pick Up Date</th>
                                                <th>Drop Off Date</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
foreach ($BOOKINGS as $key => $booking) {
    $RENT_A_CAR = new RentACar($booking['rent_a_car']);
    ?>
                                                <tr id="row_<?php echo $booking['id']; ?>">
                                                    <td><?php echo $booking['id']; ?></td> 
                                                    <td><?php echo $booking['date_time_booked']; ?></td> 
                                                    <td><?php echo $RENT_A_CAR->name; ?></td>
                                                    <td><?php echo $booking['pick_up_date']; ?></td>
                                                    <td><?php echo $booking['drop_off_date']; ?></td>
                                                    <td> 
                                                        <a href="edit-booking.php?id=<?php echo $booking['id']; ?>" class="op-link btn btn-sm btn-info">
                                                            <i class="glyphicon glyphicon-pencil"></i>
                                                        </a>
                                                        <a href="#" class="delete-booking btn btn-sm btn-danger" data-id="<?php echo $booking['id']; ?>">
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
                                                <th>Booked Date</th>
                                                <th>Rent A Car</th> 
                                                <th>Pickup Date</th>
                                                <th>Drop Off Date</th>
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
        <script src="delete/js/booking.js" type="text/javascript"></script>

    </body>

</html> 