$(document).ready(function () {
    $(".btn_add_role").click(function (event) {
        let name = $("input[name='name']").val();
        let url = $("input[name='url']").val();
        let menu_id = $("select[name='menu_id']").val();
        let formData = new FormData();
        formData.append('name', name);
        formData.append('url', url);
        formData.append('menu_id', menu_id);
        $.ajax({
            url: window.origin + '/admin/role/create',
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

    function getDataAction() {
        let arr = [];
        $("#action_user tbody").find("tr").each(function () {
            let id = $(this).find("#action_id").val();
            arr.push(id);
        });
        return arr;
    }

    $(".btn_update_action_user").on("click", function () {
        let user_id = $(this).attr('data-id')
        let actions = getDataAction();
        let formData = new FormData();
        formData.append('user_id', user_id);
        formData.append('actions', actions);
        $.ajax({
            url: window.origin + '/admin/user/update_role_employee',
            type: "POST",
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status != 200) {
                    toastr.error(data.message ?? 'Fail')
                } else {
                    toastr.success(data.message ?? 'Success')
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                }
            },
            error: function (error) {
                toastr.error('Fail')
            }
        });
    });

    $('body').on('click', '.clear_tr', function () {
        let id = $(this).attr('data-id')
        $('.clear_tr_' + id).remove()
    })

    $('.show_model_action').click(function () {
        let actions_id = getDataAction();
        let user_id = $(this).attr('data-id');
        $.ajax({
            method: "POST",
            url: window.origin + "/admin/role/get_action_add_user",
            data: {
                actions_id: JSON.stringify(actions_id),
                user_id: user_id
            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $("#tbl_modal_action").DataTable().destroy();
                $('#tbl_modal_action').DataTable({
                    "info": false,
                    data: data.data,
                    columns: [
                        {data: 'id', visible: false},
                        {data: 'name'},
                        {
                            mRender: function (data, type, row) {
                                return '<input type="checkbox" class="check_id_action" name="check_id_action" value="' + row.id + '" >'
                            }
                        }
                    ]
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    })

    $('.save_model_action').click(function () {
        let arrUsers = [];
        $('#tbl_modal_action').DataTable().rows().iterator('row', function (context, index) {
            let section = {};
            // haveDivSection = true;
            let id = $(this.row(index).data())[0].id;
            let node = $(this.row(index).node());
            let isChecked = $(node).closest("tr").find("input[type='checkbox']").prop("checked");
            if (isChecked) {
                let des = $(node).closest("tr").find("td").html();
                section['id'] = id;
                section['name'] = des;
                arrUsers.push(section);
            }
        });
        //Init data for tables
        let temp = "";
        if (arrUsers.length > 0) {
            for (let i = 0; i < arrUsers.length; i++) {
                temp += "<tr class='clear_tr_" + arrUsers[i].id + "'>";
                temp += "<input type='hidden' id='slug' value='" + arrUsers[i].name + "'>";
                temp += "<input type='hidden' id='action_id' value='" + arrUsers[i].id + "'>";
                temp += "<td>" + arrUsers[i].name + "</td>";
                temp += "<td style='color: red'><a class='nav-link clear_tr' data-id='" + arrUsers[i].id + "'><i class='fa fa-times'></i></a></td>";
                temp += "</tr>";
            }
            //Append HTML
            $("#action_user tbody").append(temp);
        }
    })
})

$('select[name="menu_id"]').selectize({
    create: false,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    maxItems: 1,
    sortField: {
        field: 'name',
        direction: 'asc'
    }
});
