$(document).ready(function () {
    var id = $("input[name='id']").val();

    $('.toggle-extend').on('click', function (e) {
        let data = new FormData();
        data.append('extend', $(this).data('extend'));
        $.ajax({
            url: window.origin + '/admin/config/update_config_project/' + id,
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

    $('.toggle-asset').on('click', function (e) {
        let data = new FormData();
        data.append('asset', $(this).data('asset'));
        $.ajax({
            url: window.origin + '/admin/config/update_config_project/' + id,
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

    $('.toggle-document').on('click', function (e) {
        let data = new FormData();
        data.append('document', $(this).data('document'));
        $.ajax({
            url: window.origin + '/admin/config/update_config_project/' + id,
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

    $('.toggle-plan').on('click', function (e) {
        let data = new FormData();
        data.append('plan', $(this).data('plan'));
        $.ajax({
            url: window.origin + '/admin/config/update_config_project/' + id,
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

    $('.toggle-financial').on('click', function (e) {
        let data = new FormData();
        data.append('financial', $(this).data('financial'));
        $.ajax({
            url: window.origin + '/admin/config/update_config_project/' + id,
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

    $('.toggle-investor').on('click', function (e) {
        let data = new FormData();
        data.append('investor', $(this).data('investor'));
        $.ajax({
            url: window.origin + '/admin/config/update_config_project/' + id,
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
})
