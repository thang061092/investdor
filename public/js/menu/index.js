$(document).ready(function () {
    $(".btn_add_menu").click(function (event) {
        let name = $("input[name='name']").val();
        let part_menu = $("input[name='part_menu']").val();
        let parent_menu = $("select[name='parent_menu']").val();
        let formData = new FormData();
        formData.append('name', name);
        formData.append('part_menu', part_menu);
        formData.append('parent_menu', parent_menu);
        $.ajax({
            url: window.origin + '/admin/menu/create',
            type: "POST",
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".theloading").show();
            },
            success: function (data) {
                $(".theloading").hide();
                if (data.status == 200) {
                    $('#add-menu').modal('hide')
                    toastr.success(data.message ?? 'Success')
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else {
                    toastr.error(data.message ?? 'Fail')
                }
            },
            error: function () {
                $(".theloading").hide();
                toastr.error('Fail')
            }
        })
    });
})
