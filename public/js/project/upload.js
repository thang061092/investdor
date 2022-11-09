$(document).ready(function () {
    const anh_dai_dien_mac_dinh = window.origin + '/frontend/images/default.png';
    $('#input_img_per').change(function (event) {
        event.preventDefault();
        var files = $(this)[0].files;
        var formData = new FormData();
        formData.append('file', files[0]);
        $.ajax({
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: window.origin + '/upload',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".loading_img_anh_dai_dien").show();
            },
            success: function (data) {
                $(".loading_img_anh_dai_dien").hide();
                $("#img_anh_dai_dien").attr("src", data.data);
                $(".preview img").show(); // Display image element
            },
            error: function (error) {
                $(".loading_img_anh_dai_dien").hide();
                $('#input_img_per').val('');
                alert('Upload không thành công!');
            }
        });
    });

    $('.btn_update_image_project').click(function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id')
        var anh_dai_dien =$('.img_anh_dai_dien img').attr('src');
        if (anh_dai_dien == anh_dai_dien_mac_dinh) {
            anh_dai_dien = null;
        }
        var count = $("img[name='img_project']").length;
        var image_selector = $("img[name='img_project']");
        var img_project = {};
        if (count > 0) {
            image_selector.each(function (k,v) {
                var data = {};
                type = $(this).data('type');
                data['file_type'] = $(this).attr('data-fileType');
                data['file_name'] = $(this).attr('data-fileName');
                data['path'] = $(this).attr('src');
                data['key'] = $(this).attr('data-key');
                var key = $(this).data('key');
                img_project[k] = data;
            });
        }
        var formData = {
            id: id,
            img_project: img_project,
            anh_dai_dien: anh_dai_dien
        };
        $.ajax({
            url: window.origin + '/admin/project/upload_image',
            type: "POST",
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".theloading").show();
            },
            success: function (data) {
                $(".theloading").hide();
                if (data.status == 200) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else {
                    alert('error')
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                }
            },
            error: function () {
                $(".theloading").hide();
                alert('error')
                setTimeout(function () {
                    window.location.reload();
                }, 500);
            }
        })
    })
})

function deleteImage(thiz) {
    var thiz_ = $(thiz);
    var key = $(thiz).data("key");
    var type = $(thiz).data("type");
    var id = $(thiz).data("id");
    if (confirm("Bạn có chắc chắn muốn xóa ảnh này ?")) {
        $(thiz_).closest("div .block").remove();
        toastr.success("Xóa ảnh thành công!", {
            timeOut: 2000,
        });
    }
}

$('#upload_avatar').change(function () {
    var contain = $(this).data("contain");
    var title = $(this).data("title");
    var type = $(this).data("type");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).simpleUpload(window.origin + "/upload", {
        allowedExts: ["jpg", "jpeg", "jpe", "jif", "jfif", "jfi", "png", "gif", "mp3", "mp4", "pdf"],
        maxFileSize: 20000000, //20MB,
        multiple: true,
        limit: 10,
        start: function (file) {
            fileType = file.type;
            fileName = file.name;
            this.block = $('<div class="block"></div>');
            this.progressBar = $('<div class="progressBar"></div>');
            this.block.append(this.progressBar);
            $('#' + contain).append(this.block);
        },
        data: {
            'type_img': type,
        },
        progress: function (progress) {
            this.progressBar.width(progress + "%");
        },
        success: function (data) {
            this.progressBar.remove();
            if (data.status == 200) {
                if (fileType == 'video/mp4') {
                    var item = "";
                    item += '<a  href="' + data.path + '" target="_blank"><span style="z-index: 9">' + fileName + '</span><img style="width: 50%;transform: translateX(50%)translateY(-50%);" src="https://image.flaticon.com/icons/png/512/29/29530.png" alt=""><img style="display:none" data-type="' + type + '" data-fileType="' + fileType + '"  data-fileName="' + fileName + '" name="img_avatar"  data-key="' + data.key + '" src="' + data.data + '" /></a>';
                    item += '<button type="button" onclick="deleteImage(this)"  data-type="' + type + '" data-key="' + data.key + '" class="cancelButton "><i class="fa fa-times-circle"></i></button>';
                    var data = $('<div ></div>').html(item);
                    this.block.append(data);
                } else if (fileType == 'audio/mp3' || fileType == 'audio/mpeg') {
                    var item = "";
                    item += '<a  href="' + data.path + '" target="_blank"><span style="z-index: 9">' + fileName + '</span><input type="hidden"><img style="width: 50%;transform: translateX(50%)translateY(-50%);" src="https://image.flaticon.com/icons/png/512/81/81281.png" alt=""><img style="display:none" data-type="' + type + '" data-fileType="' + fileType + '"  data-fileName="' + fileName + '" name="img_avatar"  data-key="' + data.key + '" src="' + data.data + '" /></a>';
                    item += '<button type="button" onclick="deleteImage(this)" data-type="' + type + '" data-key="' + data.key + '" class="cancelButton "><i class="fa fa-times-circle"></i></button>';
                    var data = $('<div ></div>').html(item);
                    this.block.append(data);
                } else {
                    var content = "";
                    content += '<a href="' + data.data + '" class="magnifyitem" data-magnify="gallery" data-toggle="lightbox" data-src="" data-group="thegallery" data-gallery="' + contain + '" data-max-width="992" data-type="image" data-title="' + title + '">';
                    content += '<img data-type="' + type + '" data-fileType="' + fileType + '"  data-fileName="' + fileName + '" name="img_avatar"  data-key="' + data.key + '" src="' + data.data + '" />';
                    content += '</a>';
                    content += '<button type="button" onclick="deleteImage(this)" data-type="' + type + '" data-key="' + data.key + '" class="cancelButton "><i class="fa fa-times-circle"></i></button>';

                    var data = $('<div ></div>').html(content);
                    this.block.append(data);
                }
            } else {
                var error = data.message;
                this.block.remove();
            }
        },
        error: function (error) {
            var msg = error.message;
            this.block.remove();
        }
    });
});

$('#upload_project').change(function () {
    var contain = $(this).data("contain");
    var title = $(this).data("title");
    var type = $(this).data("type");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).simpleUpload(window.origin + "/upload", {
        allowedExts: ["jpg", "jpeg", "jpe", "jif", "jfif", "jfi", "png", "gif", "mp3", "mp4", "pdf"],
        maxFileSize: 20000000, //20MB,
        multiple: true,
        limit: 10,
        start: function (file) {
            fileType = file.type;
            fileName = file.name;
            this.block = $('<div class="block"></div>');
            this.progressBar = $('<div class="progressBar"></div>');
            this.block.append(this.progressBar);
            $('#' + contain).append(this.block);
        },
        data: {
            'type_img': type,
        },
        progress: function (progress) {
            this.progressBar.width(progress + "%");
        },
        success: function (data) {
            this.progressBar.remove();
            if (data.status == 200) {
                if (fileType == 'video/mp4') {
                    var item = "";
                    item += '<a  href="' + data.path + '" target="_blank"><span style="z-index: 9">' + fileName + '</span><img style="width: 50%;transform: translateX(50%)translateY(-50%);" src="https://image.flaticon.com/icons/png/512/29/29530.png" alt=""><img style="display:none" data-type="' + type + '" data-fileType="' + fileType + '"  data-fileName="' + fileName + '" name="img_project"  data-key="' + data.key + '" src="' + data.data + '" /></a>';
                    item += '<button type="button" onclick="deleteImage(this)"  data-type="' + type + '" data-key="' + data.key + '" class="cancelButton "><i class="fa fa-times-circle"></i></button>';
                    var data = $('<div ></div>').html(item);
                    this.block.append(data);
                } else if (fileType == 'audio/mp3' || fileType == 'audio/mpeg') {
                    var item = "";
                    item += '<a  href="' + data.path + '" target="_blank"><span style="z-index: 9">' + fileName + '</span><input type="hidden"><img style="width: 50%;transform: translateX(50%)translateY(-50%);" src="https://image.flaticon.com/icons/png/512/81/81281.png" alt=""><img style="display:none" data-type="' + type + '" data-fileType="' + fileType + '"  data-fileName="' + fileName + '" name="img_project"  data-key="' + data.key + '" src="' + data.data + '" /></a>';
                    item += '<button type="button" onclick="deleteImage(this)" data-type="' + type + '" data-key="' + data.key + '" class="cancelButton "><i class="fa fa-times-circle"></i></button>';
                    var data = $('<div ></div>').html(item);
                    this.block.append(data);
                } else {
                    var content = "";
                    content += '<a href="' + data.data + '" class="magnifyitem" data-magnify="gallery" data-toggle="lightbox" data-src="" data-group="thegallery" data-gallery="' + contain + '" data-max-width="992" data-type="image" data-title="' + title + '">';
                    content += '<img data-type="' + type + '" data-fileType="' + fileType + '"  data-fileName="' + fileName + '" name="img_project"  data-key="' + data.key + '" src="' + data.data + '" />';
                    content += '</a>';
                    content += '<button type="button" onclick="deleteImage(this)" data-type="' + type + '" data-key="' + data.key + '" class="cancelButton "><i class="fa fa-times-circle"></i></button>';

                    var data = $('<div ></div>').html(content);
                    this.block.append(data);
                }
            } else {
                var error = data.message;
                this.block.remove();
            }
        },
        error: function (error) {
            var msg = error.message;
            this.block.remove();
        }
    });
});
