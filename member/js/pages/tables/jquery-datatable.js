$(function () {
    $('.js-basic-example').DataTable({
        responsive: true,
        iDisplayLength: 50,
        aLengthMenu: [[50, 100, 200, -1], [ 50, 100, 200, "All"]]
    });

    //Exportable table
//    $('.js-exportable').DataTable({
//        dom: 'Bfrtip',
//        responsive: true,
//        buttons: [
//            'copy', 'csv', 'excel', 'pdf', 'print'
//        ]
//    });
});