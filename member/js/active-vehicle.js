$(document).ready(function () {
    $('.active-rent-a-car').click(function () {

        var id = $(this).attr("data-id");
        var status = $(this).attr("active");

        if (status === 'true') {
            swal({
                title: "Are you sure?",
                text: "Are you want to inactive this vehicle?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, inactive it!",
                closeOnConfirm: false
            }, function () {
                $.ajax({
                    url: "js/ajax/active-vehicle.php",
                    type: "POST",
                    data: {id: id, option: 'inactive'},
                    dataType: "JSON",
                    success: function (jsonStr) {
                        if (jsonStr.status) {

                            swal({
                                title: "Inactivated!",
                                text: "Car has been inactivated.",
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                            location.reload();
                        }
                    }
                });
            });
        } else if (status === 'false') {
            swal({
                title: "Are you sure?",
                text: "Are you want to active this vehicle?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, active it!",
                closeOnConfirm: false
            }, function () {

                $.ajax({
                    url: "js/ajax/active-vehicle.php",
                    type: "POST",
                    data: {id: id, option: 'active'},
                    dataType: "JSON",
                    success: function (jsonStr) {
                        if (jsonStr.status) {

                            swal({
                                title: "Activated!",
                                text: "Car has been activated.",
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                            location.reload();

                        }
                    }
                });
            });
        }

    });
});