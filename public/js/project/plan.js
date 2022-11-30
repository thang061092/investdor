$(document).ready(function () {
    $(".btn_add_plan").click(function (event) {
        event.preventDefault();
        let title_vi = $("input[name='title_vi']").val();
        let title_en = $("input[name='title_en']").val();
        let description_vi = CKEDITOR.instances['description_vi'].getData();
        let description_en = CKEDITOR.instances['description_en'].getData();
        let id = $("input[name='id']").val();
        let formData = new FormData();
        formData.append('title_vi', title_vi);
        formData.append('title_en', title_en);
        formData.append('description_en', description_en);
        formData.append('description_vi', description_vi);
        formData.append('id', id);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/admin/project/add_plan',
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
                    $('#add_document').modal('hide')
                    toastr.success(data.message ?? 'Success')
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else {
                    toastr.error(data.message ?? 'error')
                }
            },
            error: function () {
                $(".theloading").hide();
                toastr.error('error')
            }
        })
    })

    $('.edit_plan').click(function () {
        $("input[name='edit_title_vi']").val('');
        $("input[name='edit_title_en']").val('');
        CKEDITOR.instances['edit_description_vi'].setData('')
        CKEDITOR.instances['edit_description_en'].setData('')
        $("input[name='edit_id']").val('');
        let id = $(this).attr('data-id');
        $.ajax({
            url: window.origin + '/admin/project/show_plan/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.status == 200) {
                    $("input[name='edit_title_vi']").val(data.data.title_vi);
                    $("input[name='edit_title_en']").val(data.data.title_en);
                    CKEDITOR.instances['edit_description_vi'].setData(data.data.description_vi)
                    CKEDITOR.instances['edit_description_en'].setData(data.data.description_en)
                    $("input[name='edit_id']").val(id);
                }
            },
            error: function () {
                alert('error')
            }
        })
    })

    $(".btn_edit_plan").click(function (event) {
        event.preventDefault();
        let title_vi = $("input[name='edit_title_vi']").val();
        let title_en = $("input[name='edit_title_en']").val();
        let description_vi = CKEDITOR.instances['edit_description_vi'].getData();
        let description_en = CKEDITOR.instances['edit_description_en'].getData();
        let id = $("input[name='edit_id']").val();
        let formData = new FormData();
        formData.append('title_vi', title_vi);
        formData.append('title_en', title_en);
        formData.append('description_vi', description_vi);
        formData.append('description_en', description_en);
        formData.append('id', id);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/admin/project/update_plan',
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
                    $('#add_document').modal('hide')
                    toastr.success(data.message ?? 'Success')
                    // setTimeout(function () {
                    //     window.location.reload();
                    // }, 500);
                } else {
                    toastr.error(data.message ?? 'error')
                }
            },
            error: function () {
                $(".theloading").hide();
                toastr.error('error')
            }
        })
    })

});
