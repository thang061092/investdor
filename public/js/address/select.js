$(document).ready(function () {
    $('.city_project').change(function () {
        $('.district_project option').remove()
        $('.ward_project option').remove()
        let id = $(this).val();
        $.ajax({
            url: window.origin + '/address/district?id=' + id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $(".theloading").hide();
                if (data.status == 200) {
                    $('.district_project').append($('<option>', {value: '', text: 'Chọn Quận/Huyện'}));
                    $('.ward_project').append($('<option>', {value: '', text: 'Chọn Xã/Phường'}));
                    $.each(data.data, function (k, v) {
                        $('.district_project').append($('<option>', {value: v.id, text: v.name}));
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
        let id = $(this).val();
        $.ajax({
            url: window.origin + '/address/ward?id=' + id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $(".theloading").hide();
                if (data.status == 200) {
                    $('.ward_project').append($('<option>', {value: '', text: 'Chọn Xã/Phường'}));
                    $.each(data.data, function (k, v) {
                        $('.ward_project').append($('<option>', {value: v.id, text: v.name}));
                    })
                } else {
                    $('.ward_project').append($('<option>', {value: '', text: 'Chọn Xã/Phường'}));
                }
            },
            error: function (data) {
                $('.ward_project').append($('<option>', {value: '', text: 'Chọn Xã/Phường'}));
            }
        });
    });
})
