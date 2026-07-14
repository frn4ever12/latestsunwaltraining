$(document).ready(function () {
    

    // Province-District-Municipality cascading dropdowns
    $("#Province").change(function () {
        var provinceId = $(this).val();

        if (provinceId) {
            $.ajax({
                url: "/districts/" + provinceId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#District')
                        .empty()
                        .append(
                            '<option value="">--कृपया छान्नुहोस्--</option>'
                        );
                    $.each(data, function (key, value) {
                        $('#District').append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                },
            });
        }
    });

    $("#District").change(function () {
        var districtId = $(this).val();
       
        if (districtId) {
            $.ajax({
                url: "/municipalities/" + districtId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#SthaniyaTaha')
                        .empty()
                        .append(
                            '<option value="">--कृपया छान्नुहोस्--</option>'
                        );
                    $.each(data, function (key, value) {
                        $('#SthaniyaTaha').append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                },
            });
        }
    });

    
    $('#entryDate').val(getTodayDate());
    // Initialize Select2
    $(".select2").select2({
        theme: "bootstrap4",
        width: "100%",
        placeholder: "--कृपया छान्नुहोस्--",
    });
});
