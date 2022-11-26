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
        let role_id = $(this).attr('data-id')
        let users = getDataUser();
        let menus = getDataMenu();
        let formData = new FormData();
        formData.append('role_id', role_id);
        formData.append('users', users)
        formData.append('menus', menus)
        $.ajax({
            url: window.origin + '/role/update',
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
                    alert(data.message);
                } else {
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                }
            },
            error: function (error) {
                alert('error');
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
                                return '<input type="checkbox" class="check_id_user" name="check_id_user" value="' + row._id + '" >'
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
            let id = $(this.row(index).data())[0]._id;
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
        console.log(menuids)
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
                console.log(data)
                $("#tbl_modal_menu").DataTable().destroy();
                $('#tbl_modal_menu').DataTable({
                    "info": false,
                    data: data.data,
                    columns: [
                        {data: 'id', visible: false},
                        {data: 'name'},
                        {
                            mRender: function (data, type, row) {
                                return '<input type="checkbox" class="check_id_user" name="check_id_user" value="' + row._id + '" >'
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
            var id = $(this.row(index).data())[0]._id;
            var node = $(this.row(index).node());
            var isChecked = $(node).closest("tr").find("input[type='checkbox']").prop("checked");
            if (isChecked) {
                var des = $(node).closest("tr").find("td").html();
                section['id'] = id;
                section['name'] = des;
                arrUsers.push(section);
            }
        });
        //Init data for tables
        var temp = "";
        if (arrUsers.length > 0) {
            for (var i = 0; i < arrUsers.length; i++) {
                temp += "<tr class='clear_tr_" + arrUsers[i].id + "'>";
                temp += "<input type='hidden' id='name' value='" + arrUsers[i].name + "'>";
                temp += "<input type='hidden' id='menu_id' value='" + arrUsers[i].id + "'>";
                temp += "<td>" + arrUsers[i].name + "</td>";
                temp += "<td style='color: red'><a class='nav-link clear_tr' data-id='" + arrUsers[i].id + "'><i class='fa fa-times'></i></a></td>";
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
        console.log(users)
        var formData = new FormData();
        formData.append('name', name);
        formData.append('users', users)
        formData.append('menus', menus)
        $.ajax({
            url: window.origin + '/admin/role/store',
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
                    alert(data.message);
                } else {
                    setTimeout(function () {
                        window.location.href = window.origin + '/role/get_all';
                    }, 500);
                }
            },
            error: function (error) {
                alert('error');
            }
        });
    });
})
