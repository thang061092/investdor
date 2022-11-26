$(document).ready(function () {
    function getDataUser() {
        let arr = [];
        $("#role_user tbody").find("tr").each(function () {
            let id = $(this).find("#user_id").val();
            arr.push(id);
        });
        return arr;
    }

    function getDataMenu() {
        let arr = [];
        $("#role_menu tbody").find("tr").each(function () {
            let id = $(this).find("#menu_id").val();
            arr.push(id);
        });
        return arr;
    }

    $(".btn_update_role").on("click", function () {
        let id = $(this).attr('data-id')
        let users = getDataUser();
        let menus = getDataMenu();
        let formData = new FormData();
        formData.append('id', id);
        formData.append('users', users)
        formData.append('menus', menus)
        $.ajax({
            url: window.origin + '/admin/group/update',
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
                    toastr.error(data.message ?? 'Error')
                } else {
                    toastr.success(data.message ?? 'Success')
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                }
            },
            error: function (error) {
                toastr.error('Error')
            }
        });
    });

    $('body').on('click', '.clear_tr', function () {
        var id = $(this).attr('data-id')
        $('.clear_tr_' + id).remove()
    })

    $('.show_model_user').click(function () {
        let userids = getDataUser();
        $.ajax({
            method: "POST",
            url: window.origin + "/admin/user/get_user_add_role",
            data: {
                user_ids: JSON.stringify(userids)
            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $("#tbl_modal_user").DataTable().destroy();
                $('#tbl_modal_user').DataTable({
                    "info": false,
                    data: data.data,
                    columns: [
                        {data: 'id', visible: false},
                        {data: 'email'},
                        {
                            mRender: function (data, type, row) {
                                return '<input type="checkbox" class="check_id_user" name="check_id_user" value="' + row.id + '" >'
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

    $('.save_model_user').click(function () {
        let arrUsers = [];
        $('#tbl_modal_user').DataTable().rows().iterator('row', function (context, index) {
            let section = {};
            // haveDivSection = true;
            let id = $(this.row(index).data())[0].id;
            var node = $(this.row(index).node());
            var isChecked = $(node).closest("tr").find("input[type='checkbox']").prop("checked");
            if (isChecked) {
                var des = $(node).closest("tr").find("td").html();
                section['id'] = id;
                section['email'] = des;
                arrUsers.push(section);
            }
        });
        //Init data for tables
        var temp = "";
        if (arrUsers.length > 0) {
            for (let i = 0; i < arrUsers.length; i++) {
                temp += "<tr class='clear_tr_" + arrUsers[i].id + "'>";
                temp += "<input type='hidden' id='email' value='" + arrUsers[i].email + "'>";
                temp += "<input type='hidden' id='user_id' value='" + arrUsers[i].id + "'>";
                temp += "<td>" + arrUsers[i].email + "</td>";
                temp += "<td style='color: red'><a class='nav-link clear_tr' data-id='" + arrUsers[i].id + "'><i class='fa fa-times'></i></a></td>";
                temp += "</tr>";
            }
            //Append HTML
            $("#role_user tbody").append(temp);
        }
    })

    $('.show_model_menu').click(function () {
        let menuids = getDataMenu();
        $.ajax({
            method: "POST",
            url: window.origin + "/admin/menu/get_menu_add_role",
            data: {
                menuids: JSON.stringify(menuids)
            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $("#tbl_modal_menu").DataTable().destroy();
                $('#tbl_modal_menu').DataTable({
                    "info": false,
                    data: data.data,
                    columns: [
                        {data: 'slug', visible: false},
                        {data: 'name'},
                        {
                            mRender: function (data, type, row) {
                                return '<input type="checkbox" class="check_id_user" name="check_id_user" value="' + row.slug + '" >'
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

    $('.save_model_menu').click(function () {
        var arrUsers = [];
        $('#tbl_modal_menu').DataTable().rows().iterator('row', function (context, index) {
            var section = {};
            // haveDivSection = true;
            var slug = $(this.row(index).data())[0].slug;
            var node = $(this.row(index).node());
            var isChecked = $(node).closest("tr").find("input[type='checkbox']").prop("checked");
            if (isChecked) {
                var des = $(node).closest("tr").find("td").html();
                section['slug'] = slug;
                section['name'] = des;
                arrUsers.push(section);
            }
        });
        console.log(arrUsers)
        //Init data for tables
        var temp = "";
        if (arrUsers.length > 0) {
            for (var i = 0; i < arrUsers.length; i++) {
                temp += "<tr class='clear_tr_" + arrUsers[i].slug + "'>";
                temp += "<input type='hidden' id='name' value='" + arrUsers[i].name + "'>";
                temp += "<input type='hidden' id='menu_id' value='" + arrUsers[i].slug + "'>";
                temp += "<td>" + arrUsers[i].name + "</td>";
                temp += "<td style='color: red'><a class='nav-link clear_tr' data-id='" + arrUsers[i].slug + "'><i class='fa fa-times'></i></a></td>";
                temp += "</tr>";
            }
            //Append HTML
            $("#role_menu tbody").append(temp);
        }
    })

    $(".btn_create_role").on("click", function () {
        var name = $("input[name='name']").val()
        var users = getDataUser();
        var menus = getDataMenu();
        var formData = new FormData();
        formData.append('name', name);
        formData.append('users', users)
        formData.append('menus', menus)
        $.ajax({
            url: window.origin + '/admin/group/store',
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
                    toastr.error(data.message ?? 'Error')
                } else {
                    toastr.success(data.message ?? 'Success')
                    setTimeout(function () {
                        window.location.href = window.origin + '/admin/group/list';
                    }, 500);
                }
            },
            error: function (error) {
                toastr.error('Error')
            }
        });
    });
})
