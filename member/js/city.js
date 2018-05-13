$(document).ready(function () {

    $('#district').change(function () {
        var disId = $(this).val();
        $.ajax({
            url: "post-and-get/ajax/city.php",
            type: "POST",
            data: {
                district: disId,
                action: 'GETCITYSBYDISTRICT'
            },
            dataType: "JSON",
            success: function (jsonStr) {

                var html = '<option value=""> -- Please Select City -- </option>';
                $.each(jsonStr, function (i, data) {
                    html += '<option value="' + data.id + '">';
                    html += data.name;
                    html += '</option>';
                });
                $('#city-bar').empty();
                $('#city-bar').append(html);
                $('select[name="data.name"]').val('data.id');
            }
        });
    });

});

$(document).ajaxStart(function () {
    $('#loading').show();
});

$(document).ajaxComplete(function () {
    $('#loading').hide();
});
