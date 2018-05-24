$(document).ready(function () {
    $('#step-1').click(function () {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!$('#conatcName').val() || $('#conatcName').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your accommodation name",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#phoneNumber').val() || $('#phoneNumber').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter accommodation address",
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
        } else if (!$('#phone').val() || $('#phone').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter your contact number",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });

        } else if (!$('#type').val() || $('#type').val().length === 0) {
            swal({
                title: "Error!",
                text: "please select your accommodation type",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#city-bar').val() || $('#city-bar').val().length === 0) {
            swal({
                title: "Error!",
                text: "please select your city",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {
            $('#collapseOne').collapse("hide");
            $('#collapseTwo').collapse("show");
        }
    });

    $('#step-2').click(function () {

        checked = $("input[type=checkbox]:checked").length;

        if (checked < 1) {
            swal({
                title: "Error!",
                text: "please select at least one facility",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {
            $('#collapseThree').collapse("hide");
            $('#collapseFour').collapse("show");
        }
    });

    $('#create').click(function () {
        var description = tinyMCE.get('description').getContent(), patt;
        patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;
        if (description === '' || patt.test(content)) {
            swal({
                title: "Error!",
                text: "please enter Accommodation description",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }
    });


    $('#step-prev-1').click(function () {
        $('#collapseTwo').collapse("hide");
        $('#collapseOne').collapse("show");
        $.scrollTo(100, 0, "slow", "#collapseOne");
    });
    $('#step-prev-2').click(function () {
        $('#collapseThree').collapse("hide");
        $('#collapseTwo').collapse("show");
        $.scrollTo(100, 0, "slow", "#collapseTwo");
    });
    $('#step-prev-3').click(function () {
        $('#collapseFour').collapse("hide");
        $('#collapseThree').collapse("show");
        $.scrollTo(100, 0, "slow", "#collapseThree");
    });

});