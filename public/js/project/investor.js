$(document).ready(function () {
    $(".btn_add_member").click(function (event) {
        let name_member = $("input[name='name_member']").val();
        let position_member_vi = $("input[name='position_member_vi']").val();
        let position_member_en = $("input[name='position_member_en']").val();
        let investor_project_id = $("input[name='investor_project_id']").val();
        let avatar = $("input[name='avatar']")[0].files[0]
        let formData = new FormData();
        formData.append('name_member', name_member);
        formData.append('position_member_vi', position_member_vi);
        formData.append('position_member_en', position_member_en);
        formData.append('investor_project_id', investor_project_id);
        formData.append('avatar', avatar);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/admin/project/add_member_company',
            type: 'POST',
            data: formData,
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
                    $('#add-member').modal('hide')
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
});
