﻿<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);
$RENT_A_CAR = new RentACar(NULL);
?> 
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage All Rent A Cars || Admin || hurryuptaxi.lk</title>
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
                                    Manage All Rent A Cars
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="create-rent-a-car.php">
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
                                                <th>Name</th>
                                                <th>Main Type</th> 
                                                <th>Phone Number</th>
                                                <th>City</th>
                                                <th>Vehicle Number</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($RENT_A_CAR->all() as $key => $rent_a_car) {
                                                ?>
                                                <tr id="row_<?php echo $rent_a_car['id']; ?>">
                                                    <td><?php echo $rent_a_car['id']; ?></td> 
                                                    <td><?php echo $rent_a_car['name']; ?></td> 
                                                    <td>
                                                        <?php
                                                        $VEHICLE_TYPE = new VehicleType();
                                                        echo $VEHICLE_TYPE->mainTypes()[$rent_a_car['mainTypes']];
                                                        ?>
                                                    </td> 
                                                    <td><?php echo $rent_a_car['phoneNumber']; ?></td>
                                                    <td>
                                                        <?php
                                                        $CITY = new City($rent_a_car['city']);
                                                        echo $CITY->name;
                                                        ?>
                                                    </td> 
                                                    <td><?php echo $rent_a_car['vehicleNumber']; ?></td> 
                                                    <td> 
                                                        <a href="edit-rent-a-car.php?id=<?php echo $rent_a_car['id']; ?>" class="op-link btn btn-sm btn-info">
                                                            <i class="glyphicon glyphicon-pencil"></i>
                                                        </a>
                                                        <a href="add-rent-a-car-photos.php?id=<?php echo $rent_a_car['id']; ?>" class="op-link btn btn-sm btn-success">
                                                            <i class="glyphicon glyphicon-picture"></i>
                                                        </a>

                                                        <a href="#" class="delete-rent-a-car btn btn-sm btn-danger" data-id="<?php echo $rent_a_car['id']; ?>">
                                                            <i class="glyphicon glyphicon-trash" data-type="cancel"></i>
                                                        </a>

                                                        <?php
                                                        if ($rent_a_car['isActive'] == 1) {
                                                            ?>
                                                            <a href="#" class="active-rent-a-car btn btn-sm btn-info" data-id="<?php echo $rent_a_car['id']; ?>" active="true">
                                                                <i class="glyphicon glyphicon-eye-open" data-type="cancel" title="Active"></i>
                                                            </a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="#" class="active-rent-a-car btn btn-sm btn-info" data-id="<?php echo $rent_a_car['id']; ?>" active="false">
                                                                <i class="glyphicon glyphicon-eye-close" data-type="cancel" title="InActive"></i>
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>


                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>   
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Main Type</th> 
                                                <th>Phone Number</th>
                                                <th>City</th>
                                                <th>Vehicle Number</th>
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
        <script src="delete/js/rent-a-car.js" type="text/javascript"></script>
        <script src="js/active-vehicle.js" type="text/javascript"></script>
    </body>

</html> 