<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);

$id = '';
$id = $_GET['id'];
$DRIVER_PAYMENT = new DriverPayment($id);
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>View Payment History || Admin || hurryuptaxi.lk</title>

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
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    View Payment History
                                </h2>

                            </div> 
                            <div class="body">
                                <div class="table-responsive">
                                    <table id="myTable"class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Driver</th>
                                                <th>Date / Time</th> 
                                                <th>Price</th>                                                
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($DRIVER_PAYMENT->getHistoryByDriverPayment($id) as $driver_payment) {
                                                dd($driver_payment);
                                                if ($driver_payment['history'] == 0) {
                                                    ?>                                          

                                                    <?php
                                                } else {
                                                    $histories = (explode("///", $driver_payment['history']));
                                                    foreach ($histories as $history) {
                                                        $history_data = explode(",", $history);
                                                        ?>
                                                        <tr id="row_ ">
                                                            <td>
                                                                <?php
                                                                $USER = new User($history_data[0]);
                                                                echo $USER->name;
                                                                ?>                                                             
                                                            </td> 
                                                            <td> <?php
                                                                if (isset($history_data[1])) {
                                                                    echo $history_data[1];
                                                                }
                                                                ?>
                                                            </td>
                                                            <td> <?php
                                                                if (isset($history_data[2])) {
                                                                    echo $history_data[2];
                                                                }
                                                                ?>
                                                            </td>
                                                            <td> <?php
                                                                if (isset($history_data[3])) {
                                                                    echo $history_data[3];
                                                                }
                                                                ?>
                                                            </td>
                                                            <td> <?php
                                                                if (isset($history_data[4])) {
                                                                    echo $history_data[4];
                                                                }
                                                                ?>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?> 
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Driver</th>
                                                <th>Date / Time</th> 
                                                <th>Price</th>                                                
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
        <script src="js/ajax/loan.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#installment').DataTable({
                    destroy: true,
                    "order": [[3, "desc"]]
                });
            });

        </script>
    </body> 
</html> 