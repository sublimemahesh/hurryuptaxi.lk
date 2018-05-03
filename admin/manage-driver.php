﻿<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);
$DRIVER = new Driver(NULL)
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
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Drivers
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-driver.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <!-- <div class="table-responsive">-->
                                <div>
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Phone Number</th> 
                                                <th>Address</th>
                                                <th>Vehicle Number</th>
                                                <th>NIC Number</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($DRIVER->GetDriversByUser($_SESSION["id"]) as $key => $driver) {
                                                ?>
                                                <tr id="row_<?php echo $driver['id']; ?>">
                                                    <td><?php echo $driver['id']; ?></td> 
                                                    <td><?php echo $driver['name']; ?></td> 
                                                    <td><?php echo $driver['contact_no']; ?></td> 
                                                    <td><?php echo $driver['address']; ?></td>
                                                    <td><?php echo $driver['vehicle_number']; ?></td> 
                                                    <td><?php echo $driver['nic_number']; ?></td> 
                                                    <td> 
                                                        <a href="edit-driver.php?id=<?php echo $driver['id']; ?>" class="op-link btn btn-sm btn-success">
                                                            <i class="glyphicon glyphicon-pencil"></i>
                                                        </a>

                                                        <a href="#" class="delete-driver btn btn-sm btn-danger" data-id="<?php echo $driver['id']; ?>">
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
                                                <th>Name</th>
                                                <th>Phone Number</th> 
                                                <th>Address</th>
                                                <th>Vehicle Number</th>
                                                <th>NIC Number</th>
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
        <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/pages/ui/dialogs.js"></script>
        <script src="js/demo.js"></script>
        <script src="delete/js/driver.js" type="text/javascript"></script>
    </body>

</html> 