<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);
?> 
﻿<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage User || Admin || hurryuptaxi.lk</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" /> 
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
                <!-- Manage Districts -->

                <div class="card">
                    <div class="header">
                        <h2>
                            Manage User
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="create-new-user.php">
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th> 
                                        <th>Username</th> 
                                        <th>Status</th>
                                        <th  style="width: 200px">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $USE = new User(NULL);
                                    if (isset($_GET['user'])) {
                                        $USERS = $USE->GetUserByParent($_GET['user']);
                                    } else {
                                        $USERS = $USE->GetUserByParent($_SESSION["id"]);
                                    }

                                    foreach ($USERS as $key => $user) {
                                        ?>
                                        <tr id="row_<?php echo $user['id']; ?>">
                                            <td><?php echo $user['id']; ?></td> 
                                            <td><?php echo substr($user['name'], 0, 20); ?></td>  
                                            <td><?php echo substr($user['username'], 0, 20); ?></td>
                                            <td>
                                                <?php
                                                if ($user['isActive'] == 1) {
                                                    ?>
                                                    <a href="#" title="Active this Account" class="op-link dan-suc-btn"><i class="material-icons">check_box</i></a>
                                                    <?php
                                                } else {
                                                    ?>

                                                    <a href="#" title="Inactive this Account" class="op-link dan-suc-btn"><i class="material-icons">check_box_outline_blank</i></a>
                                                    <?php
                                                }
                                                ?>
                                            </td>  
                                            <td  style="width: 200px"> 
                                                <a href="edit-user.php?id=<?php echo $user['id']; ?>" class="op-link btn btn-sm btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                                |
                                                <a href="manage-user.php?user=<?php echo $user['id']; ?>" class="op-link btn btn-sm btn-warning"><i class="glyphicon glyphicon-user"></i></a>
                                                |
                                                <a href="change-password-user.php?user=<?php echo $user['id']; ?>" class="op-link btn btn-sm btn-info"><i class="glyphicon glyphicon-lock"></i></a>
                                                <?php
                                                if ($USER->id == 1) {
                                                    ?>
                                                    |
                                                    <a href="set-payment-and-active.php?user=<?php echo $user['id']; ?>" class="op-link btn btn-sm btn-info"><i class="glyphicon glyphicon-usd"></i></a>
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
                                        <th>Username</th> 
                                        <th>Status</th>
                                        <th  style="width: 200px">Options</th>
                                    </tr>
                                </tfoot>
                            </table>
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
    </body>

</html> 