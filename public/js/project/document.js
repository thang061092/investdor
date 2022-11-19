$(document).ready(function () {
    $(".btn_add_document").click(function (event) {
        event.preventDefault();
        let title_vi = $("input[name='title_vi']").val();
        let title_en = $("input[name='title_en']").val();
        let name_file_vi = $("input[name='name_file_vi']").val();
        let name_file_en = $("input[name='name_file_en']").val();
        let id = $("input[name='id']").val();
        let file = $('#file_document')[0].files[0]
        let formData = new FormData();
        formData.append('title_vi', title_vi);
        formData.append('title_en', title_en);
        formData.append('name_file_vi', name_file_vi);
        formData.append('name_file_en', name_file_en);
        formData.append('id', id);
        formData.append('file', file);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/admin/project/add_document',
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

    $('.edit_document').click(function () {
        $("input[name='edit_title_vi']").val('');
        $("input[name='edit_title_en']").val('');
        $("input[name='edit_name_file_vi']").val('');
        $("input[name='edit_name_file_en']").val('');
        $("input[name='edit_file_document']").val('');
        $("input[name='edit_id']").val('');
        let id = $(this).attr('data-id');
        $.ajax({
            url: window.origin + '/admin/project/show_document/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.status == 200) {
                    $("input[name='edit_title_vi']").val(data.data.title_vi);
                    $("input[name='edit_title_en']").val(data.data.title_en);
                    $("input[name='edit_name_file_vi']").val(data.data.name_file_vi);
                    $("input[name='edit_name_file_en']").val(data.data.name_file_en);
                    $("input[name='edit_file_document']").val('');
                    $("input[name='edit_id']").val(id);
                }
            },
            error: function () {
                alert('error')
            }
        })
    })

    $(".btn_edit_document").click(function (event) {
        event.preventDefault();
        let title_vi = $("input[name='edit_title_vi']").val();
        let title_en = $("input[name='edit_title_en']").val();
        let name_file_vi = $("input[name='edit_name_file_vi']").val();
        let name_file_en = $("input[name='edit_name_file_en']").val();
        let id = $("input[name='edit_id']").val();
        let file = $('#edit_file_document')[0].files[0]


        let formData = new FormData();
        formData.append('title_vi', title_vi);
        formData.append('title_en', title_en);
        formData.append('name_file_vi', name_file_vi);
        formData.append('name_file_en', name_file_en);
        formData.append('id', id);
        formData.append('file', file);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/admin/project/edit_document',
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

});
