$(document).ready(function () {
    $('.check_register').on('click', function () {
        let id = $("input[name='id']").val();
        let otp = $("input[name='otp']").val();
        let formData = new FormData();
        formData.append('id', id);
        formData.append('otp', otp);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/otp_register',
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
                    setTimeout(function () {
                        window.location.href = window.origin + '/home-page';
                    }, 500);
                } else {
                    toastr.error(data.message ?? 'error')
                }
            },
            error: function () {
                toastr.error('error')
            }
        })
    })

    $('.auth_forgot_password').on('click', function () {
        let email = $("input[name='email']").val();
        let formData = new FormData();
        formData.append('email', email);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/send_email_forgot_pass',
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
                    toastr.error(data.message ?? 'error')
                }
            },
            error: function () {
                toastr.error('error')
            }
        })
    })

    $('.new_password_post').on('click', function () {
        let password = $("input[name='password']").val();
        let re_password = $("input[name='re_password']").val();
        let token = $("input[name='token']").val();
        let formData = new FormData();
        formData.append('password', password);
        formData.append('re_password', re_password);
        formData.append('token', token);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/new_password_post',
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
                    setTimeout(function () {
                        window.location.href = window.origin + '/login';
                    }, 500);
                } else {
                    toastr.error(data.message ?? 'error')
                }
            },
            error: function () {
                toastr.error('error')
            }
        })
    })
})
