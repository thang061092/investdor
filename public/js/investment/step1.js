$(document).ready(function () {
    $('.step1').on('click', function () {
        let project_id = $("input[name='project_id']").val();
        let full_name = $("input[name='full_name']").val();
        let birthday = $("input[name='birthday']").val();
        let gender = $("input[name='gender']:checked").val();
        let phone_number = $("input[name='phone_number']").val();
        let bank_name = $("select[name='bank_code']").val();
        let account_number = $("input[name='account_number']").val();
        let account_name = $("input[name='account_name']").val();
        let formData = new FormData();
        formData.append('project_id', project_id);
        formData.append('full_name', full_name);
        formData.append('birthday', birthday);
        formData.append('gender', gender);
        formData.append('phone_number', phone_number);
        formData.append('bank_name', bank_name);
        formData.append('account_number', account_number);
        formData.append('account_name', account_name);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/investment/step2',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status == 200) {
                    window.location.href = window.origin + '/investment/step2/' + data.data.project_name + "?checksum=" + data.data.checksum;
                } else {
                    toastr.error(data.message ?? 'error')
                }
            },
            error: function () {
                toastr.error('error')
            }
        })
    })

    $('.step2').on('click', function () {
        let part_investment = $("input[name='part_investment']").val();
        let checksum = $("input[name='checksum']").val();
        let formData = new FormData();
        formData.append('part_investment', part_investment);
        formData.append('checksum', checksum);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/investment/step3',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status == 200) {
                    window.location.href = window.origin + '/investment/step3/' + data.data.project_name + "?checksum=" + data.data.checksum;
                } else {
                    toastr.error(data.message ?? 'error')
                }
            },
            error: function () {
                toastr.error('error')
            }
        })
    })

    $('.step3').on('click', function () {
        let checksum = $("input[name='checksum']").val();
        let agree = $("input[name='agree']:checked").val();
        let formData = new FormData();
        formData.append('checksum', checksum);
        formData.append('agree', agree);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/investment/step4',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status == 200) {
                    window.location.href = window.origin + '/investment/step4/' + data.data.project_name + "?checksum=" + data.data.checksum;
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
