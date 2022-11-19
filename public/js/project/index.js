$(document).ready(function () {
    $('.status_project').on('change', function () {
        let status = $(this).val();
        let id = $(this).attr('data-id');
        let formData = new FormData();
        formData.append('status', status);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/admin/project/update_status_project/' + id,
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status == 200) {
                    toastr.success(data.message ?? 'Success')
                } else {
                    toastr.error(data.message ?? 'Fail')
                    setTimeout(function () {
                        window.location.reload();
                    }, 1500);
                }
            },
            error: function () {
                toastr.error('Fail')
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            }
        })
    })
});
