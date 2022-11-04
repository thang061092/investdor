$(document).ready(function () {
    $('.city_project').change(function () {
        $('.district_project option').remove()
        $('.ward_project option').remove()
        let code = $(this).val();
        $.ajax({
            url: window.origin + '/address/district?code=' + code,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $(".theloading").hide();
                if (data.status == 200) {
                    $('.district_project').append($('<option>', {value: '', text: 'Chọn Quận/Huyện'}));
                    $.each(data.data, function (k, v) {
                        $('.district_project').append($('<option>', {value: v.code, text: v.name}));
                    })
                } else {
                    $('.district_project').append($('<option>', {value: '', text: 'Chọn Quận/Huyện'}));
                }
            },
            error: function (data) {
                $('.district_project').append($('<option>', {value: '', text: 'Chọn Quận/Huyện'}));
            }
        });
    });

    $('.district_project').change(function () {
        $('.ward_project option').remove()
        let code = $(this).val();
        $.ajax({
            url: window.origin + '/address/ward?code=' + code,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $(".theloading").hide();
                if (data.status == 200) {
                    $('.ward_project').append($('<option>', {value: '', text: 'Chọn Quận/Huyện'}));
                    $.each(data.data, function (k, v) {
                        $('.ward_project').append($('<option>', {value: v.code, text: v.name}));
                    })
                } else {
                    $('.ward_project').append($('<option>', {value: '', text: 'Chọn Quận/Huyện'}));
                }
            },
            error: function (data) {
                $('.ward_project').append($('<option>', {value: '', text: 'Chọn Quận/Huyện'}));
            }
        });
    });
})
