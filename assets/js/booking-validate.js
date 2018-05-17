$(document).ready(function () {

    $('#book').click(function (e) {
        e.preventDefault();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!$('#pick_up').val() || $('#pick_up').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter pick up location",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#drop_off').val() || $('#drop_off').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter drop off location",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('.pick_up_date').val() || $('.pick_up_date').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter pick up date",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('.pick_up_time').val() || $('.pick_up_time').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter pick up time",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('.drop_off_date').val() || $('.drop_off_date').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter drop off date",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('.drop_off_time').val() || $('.drop_off_time').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter drop off time",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#first_name').val() || $('#first_name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your first name",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#second_name').val() || $('#second_name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your second name",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        }else if (!$('#contact_number').val() || $('#contact_number').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your contact number",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#email').val() || $('#email').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter your email",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });

        } else if (!emailReg.test($('#email').val())) {
            swal({
                title: "Error!",
                text: "please enter a valid email",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {
            $("#bookingform").submit();
        }
    });

});
 