$(document).ready(function () {
    const img_default = window.origin + '/frontend/images/default.png';
    $('.confirm-bill').click(function () {
        $('.payment').hide();
        let id = $(this).attr('data-id')
        $.ajax({
            url: window.origin + '/admin/transaction/get_bill/' + id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $("input[name='bill_id']").val('')
                $("input[name='name_investor']").val('')
                $("input[name='name_project']").val('')
                $("input[name='created_at']").val('')
                $("input[name='amount_money']").val('')
                $("input[name='order_code']").val('')
                $("select[name='status']").val('')
                $("input[name='payment_date']").val('')
                $("textarea[name='note']").val('')
                $("input[name='ct-license']").val('')
                $("#img-license").attr("src", img_default);
                $("input[name='bill_id']").val(data.data.id)
                $("input[name='name_investor']").val(data.data.user.full_name)
                $("input[name='name_project']").val(data.data.project.name_vi)
                $("input[name='created_at']").val(data.data.time_create)
                $("input[name='amount_money']").val(data.data.amount_money)
                $("input[name='order_code']").val(data.data.order_code)
                $("select[name='status']").val(data.data.status)
            },
            error: function () {
                alert('error')
                setTimeout(function () {
                    window.location.reload();
                }, 500);
            }
        })
    })

    $(".status_bill").on('change', function () {
        let status = $(this).val();
        $("input[name='payment_date']").val('')
        $("textarea[name='note']").val('')
        $("input[name='ct-license']").val('')
        $("#img-license").attr("src", img_default);
        if (status == 'success') {
            $('.payment').show();
        } else {
            $('.payment').hide();
        }
    })

    $('.btn_confirm_transaction').click(function () {
        let id = $("input[name='bill_id']").val()
        let note = $("textarea[name='note']").val()
        let status = $("select[name='status']").val()
        let payment_date = $("input[name='payment_date']").val()
        let file = $("input[name='ct-license']")[0].files[0]
        let formData = new FormData();
        formData.append('note', note);
        formData.append('file', file);
        formData.append('payment_date', payment_date);
        formData.append('id', id);
        formData.append('status', status);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/admin/transaction/update_bill',
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
                    $('#confirm-bill').modal('hide')
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
    })

    $('.btn_payment_contract').click(function () {
        let id = $("input[name='contract_id']").val()
        let tien_goc = $("input[name='tien_goc']").val()
        let tien_lai = $("input[name='tien_lai']").val()
        let ngay_thanh_toan = $("input[name='ngay_thanh_toan']").val()
        let file = $("input[name='chung_tu']")[0].files[0]
        let formData = new FormData();
        formData.append('id', id);
        formData.append('principal', tien_goc);
        formData.append('payment_date', ngay_thanh_toan);
        formData.append('money_interest', tien_lai);
        formData.append('file', file);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/admin/transaction/payment_contract',
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
                    $('#confirm-bill').modal('hide')
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
    })
});
