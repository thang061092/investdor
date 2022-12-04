$(document).ready(function () {
    $('.step1').on('click', function () {
        let project_id = $("input[name='project_id']").val();
        let formData = new FormData();
        formData.append('project_id', project_id);
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
        let formData = new FormData();
        formData.append('checksum', checksum);
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
