<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);
$VEHICLE_TYPE =  new VehicleType(NULL);
?> 
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Vehicle Type || Admin || hurryuptaxi.lk</title>
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
                                    Manage Vehicle Type
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="create-vehicle-type.php">
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
                                                <th>Type</th>
                                                <th>Passengers</th>                                                 
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($VEHICLE_TYPE->all() as $key => $vehicle_type) {
                                                $key++;
                                                ?>
                                                <tr id="row_<?php echo  $vehicle_type['id'] ?>">
                                                    <td><?php echo $key; ?></td> 
                                                    <td><?php echo $vehicle_type['name']; ?></td>  
                                                    <td><?php echo $vehicle_type['passengers']; ?></td>
                                                    
                                                    <td> 
                                                        <a href="edit-vehicle-type.php?id=<?php echo $vehicle_type['id']; ?>" class="op-link btn btn-sm btn-info" title="Edit">
                                                            <i class="glyphicon glyphicon-pencil"></i>
                                                        </a> | 
                                                        <a href="add-vehicle-photos.php?id=<?php echo $vehicle_type['id']; ?>" class="op-link btn btn-sm btn-success" title="Add Vehicle Photo">
                                                            <i class="glyphicon glyphicon-picture"></i>
                                                        </a> | 
                                                        <a href="view-drivers-by-vehicle-type.php?id=<?php echo $vehicle_type['id']; ?>" class="op-link btn btn-sm btn-warning" title="View Drivers">
                                                            <i class="glyphicon glyphicon-tasks"></i> 
                                                        </a> | 

                                                        <a href="#" class="delete-vehicle-type btn btn-sm btn-danger" data-id="<?php echo $vehicle_type['id']; ?>" title="Delete">
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
                                                <th>Type</th>
                                                <th>Passengers</th>                                                 
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
        <script src="delete/js/vehicle-type.js" type="text/javascript"></script>
    </body>

</html> 