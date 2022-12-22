$(document).ready(function () {
    $('.toggle-status').on('click', function () {
        let data = new FormData();
        data.append('id', $(this).data('id'));
        $.ajax({
            url: window.origin + '/admin/config/update_config_project',
            type: 'POST',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
        }).done(function (result) {
            toastr.success(result.message ?? 'Success')
        }).error(function (result) {
            toastr.error(result.message ?? 'Error')
        });
    });

    $('.swap').on('click', function () {
        let name = $(this).attr('data-name');
        let id = $(this).attr('data-id');
        let level = $(this).attr('data-level');
        $('.swap_level option').remove()
        $('#current_level').val('');
        $('#current_title').val('');
        $('#current_level').val(id);
        $('#current_title').val(name + ' - ' + level);
        $.ajax({
            url: window.origin + '/admin/config/config_index',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.status == 200) {
                    $.each(data.data, function (k, v) {
                        if (v.id == id) {
                            return true
                        }
                        $('.swap_level').append($('<option>', {value: v.id, text: v.name + ' - ' + v.level}));
                    })
                } else {
                    toastr.error(data.message ?? 'Error')
                }
            },
            error: function () {
                alert('error')
            }
        })
    })

    $('.btn_swap_block').on('click', function () {
        let current_level = $("input[name='current_level']").val()
        var swap_level = $("select[name='swap_level']").val()
        let formData = new FormData();
        formData.append('current_level', current_level);
        formData.append('swap_level', swap_level);
        $.ajax({
            url: window.origin + '/admin/config/swap_config_index',
            type: "POST",
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".theloading").show();
            },
            success: function (data) {
                $(".theloading").hide();
                if (data.status == 200) {
                    toastr.success(data.message)
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else {
                    toastr.error('error')
                }
            },
            error: function () {
                $(".theloading").hide();
                alert('error')
            }
        });
    })
})
