<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dash</title>
        <link
            href="http://fonts.cdnfonts.com/css/roboto?styles=14394,14400"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="theme/css/bootstrap.min.css" />
        <link rel="stylesheet" href="theme/css/font-awesome.min.css" />
        <link rel="stylesheet" href="theme/css/nice-select2.css" />
        <link rel="stylesheet" href="theme/css/reset.css" />
        <!--FILE TYPES CHO INPUT HTML-->
        <link rel="stylesheet" href="theme/scss/types.css" />
        <!--FILE TYPES CHO POPUP HTML-->
        <link rel="stylesheet" href="theme/scss/popup.css" />
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 mb-4">
                    <span class="lbl">Họ và tên</span>
                    <input
                        type="text"
                        class="form-control"
                        name=""
                        placeholder=".........."
                    />
                </div>
                <div class="col-6 mb-4">
                    <label for="state-1" class="c-check">
                        <input type="checkbox" id="state-1" name="" />
                        <span class="text">Chưa đầu tư</span>
                    </label>
                </div>
                <div class="col-6 mb-4">
                    <!--Chú ý thay đổi ID từ e-select-{id}-->
                    <span class="lbl">Chọn năm</span>
                    <select
                        name=""
                        class="e-select c-select"
                        id="e-select-1"
                        data-text="Chọn năm"
                        data-default="Chọn"
                    >
                        <option value="">2022</option>
                    </select>
                </div>
                <div class="col-6 mb-4">
                    <!--Chú ý thay đổi ID từ e-select-{id}-->
                    <span class="lbl">Mô tả ngắn</span>
                    <textarea name="" class="form-control"></textarea>
                </div>
                <div class="col-12 mb-4">
                    <button class="c-btn btn btn-sm btn-success save">
                        Lưu
                    </button>
                    <button class="c-btn btn btn-sm btn-danger delete">
                        Xóa
                    </button>
                </div>
                <div class="col-12 my-4">
                    <div class="ls">
                        <div class="elementor_json_field">
                            <p class="form-title">Chi nhánh</p>
                            <div class="hidden-item" style="display: none">
                                <div class="item col-100">
                                    <div
                                        class="elementor_json_field_control col-100"
                                    >
                                        <div
                                            class="elementor_json_field_control_name"
                                        >
                                            <label>Tiêu đề</label>
                                        </div>
                                        <div
                                            class="elementor_json_field_control_content col"
                                        >
                                            <input
                                                type="text"
                                                data-name="title"
                                                data-type="text"
                                                class="control text title form-control"
                                                value=""
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="elementor_json_field_control col-100"
                                    >
                                        <div
                                            class="elementor_json_field_control_name"
                                        >
                                            <label>Nội dung</label>
                                        </div>
                                        <div
                                            class="elementor_json_field_control_content col"
                                        >
                                            <textarea
                                                type="text"
                                                data-name="content"
                                                data-type="text"
                                                class="control text content form-control"
                                                value=""
                                                rows="5"
                                            ></textarea>
                                        </div>
                                    </div>
                                    <span class="close">
                                        <i
                                            class="fa fa-times"
                                            aria-hidden="true"
                                        ></i>
                                    </span>
                                </div>
                            </div>
                            <div
                                class="list-items list-items-json_fieldcontents rounded"
                            >
                                <div class="item col-100">
                                    <div
                                        class="elementor_json_field_control col-100"
                                    >
                                        <div
                                            class="elementor_json_field_control_name"
                                        >
                                            <label>Tiêu đề</label>
                                        </div>
                                        <div
                                            class="elementor_json_field_control_content col"
                                        >
                                            <input
                                                type="text"
                                                data-name="title"
                                                data-type="text"
                                                class="control text title form-control"
                                                value=""
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="elementor_json_field_control col-100"
                                    >
                                        <div
                                            class="elementor_json_field_control_name"
                                        >
                                            <label>Nội dung</label>
                                        </div>
                                        <div
                                            class="elementor_json_field_control_content col"
                                        >
                                            <textarea
                                                type="text"
                                                data-name="content"
                                                data-type="text"
                                                class="control text content form-control"
                                                value=""
                                                rows="5"
                                            ></textarea>
                                        </div>
                                    </div>
                                    <span class="close">
                                        <i
                                            class="fa fa-times"
                                            aria-hidden="true"
                                        ></i>
                                    </span>
                                </div>
                            </div>
                            <div class="text-center" style="width: 80%">
                                <div class="btnadmin">
                                    <button
                                        type="button"
                                        class="btn btn-success add-json_fieldcontents action"
                                    >
                                        Thêm mới
                                        <i
                                            class="fa fa-plus"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="item-image">
                        <p class="title-image toggle">
                            Ảnh sản phẩm
                            <span class="control">
                                <i
                                    class="fa fa-angle-down"
                                    aria-hidden="true"
                                ></i>
                            </span>
                        </p>
                        <label for="image" class="btn-image content">
                            <input type="file" id="image" class="d-none" />
                            <img
                                src="https://via.placeholder.com/350x350"
                                class="img-fluid"
                                alt=""
                            />
                            <a href="" title="Xem trước" class="preview">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <p class="note note-image">
                                Nhấn vào ảnh để xem hoặc cập nhật
                            </p>
                            <a href="" title="" class="action delete">
                                Xóa ảnh
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </label>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="ls-item-image">
                        <label class="title-image toggle">
                            Album ảnh sản phẩm
                            <span class="control">
                                <i
                                    class="fa fa-angle-down"
                                    aria-hidden="true"
                                ></i>
                            </span>
                        </label>
                        <div class="ls content">
                            <label class="image" for="image-1" template>
                                <input
                                    type="file"
                                    name="img[]"
                                    id="image-1"
                                    class="d-none"
                                    accept="image/*"
                                    onchange="document.getElementById('src-image-1').src = window.URL.createObjectURL(this.files[0])"
                                />
                                <img
                                    src="https://via.placeholder.com/350x350"
                                    class="img-fluid"
                                    alt=""
                                    id="src-image-1"
                                />
                                <a href="" title="Xem trước" class="preview">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </label>
                            <!--random mã ID-->
                            <label
                                class="plus-image"
                                data-id="1019292"
                                data-number="1"
                            >
                                <span class="text">Thêm ảnh</span>
                                <i
                                    class="fa fa-picture-o"
                                    aria-hidden="true"
                                ></i>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <button
                        type="button"
                        class="btn btn-sm btn-primary"
                        data-toggle="modal"
                        data-target="#alert_modal-1"
                    >
                        Launch demo success
                    </button>
                    <button
                        type="button"
                        class="btn btn-sm btn-primary"
                        data-toggle="modal"
                        data-target="#alert_modal-2"
                    >
                        Launch demo failed
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div
            class="modal fade"
            id="alert_modal-1"
            tabindex="-1"
            role="dialog"
            aria-labelledby="alertModal"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content success">
                    <div class="alert-modal text-center">
                        <div class="alert-modal__ico-wrap">
                            <div
                                class="alert-modal__ico rounded-ico rounded-circle d-inline-block"
                            >
                                <svg
                                    width="4rem"
                                    height="4rem"
                                    viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg"
                                    version="1.1"
                                    fill="none"
                                    stroke="#fff"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="3"
                                >
                                    <polyline
                                        points="2.75 8.75,6.25 12.25,13.25 4.75"
                                    />
                                </svg>
                            </div>
                        </div>
                        <p class="alert-modal__tit mb-2">Success</p>
                        <div
                            class="alert-modal__cnt mx-auto text-bdy mb-md-3 mb-2"
                        >
                            We've sent a confirmation to your e-mail for
                            verification.
                        </div>
                        <button
                            type="button"
                            class="close alert-modal__close p-2 mb-2"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            OK
                        </button>
                        <div class="alert-modal__note">
                            -- Click to see opposite state --
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="modal fade"
            id="alert_modal-2"
            tabindex="-1"
            role="dialog"
            aria-labelledby="alertModal"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content failed">
                    <div class="alert-modal text-center">
                        <div class="alert-modal__ico-wrap">
                            <div
                                class="alert-modal__ico rounded-ico rounded-circle d-inline-block"
                            >
                                <svg
                                    width="3rem"
                                    height="3rem"
                                    fill="#fff"
                                    viewBox="0 0 8 8"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M1.41 0l-1.41 1.41.72.72 1.78 1.81-1.78 1.78-.72.69 1.41 1.44.72-.72 1.81-1.81 1.78 1.81.69.72 1.44-1.44-.72-.69-1.81-1.78 1.81-1.81.72-.72-1.44-1.41-.69.72-1.78 1.78-1.81-1.78-.72-.72z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <p class="alert-modal__tit mb-2">Failed !</p>
                        <div
                            class="alert-modal__cnt mx-auto text-bdy mb-md-3 mb-2"
                        >
                            Oops ! Something goes wrong. Wait a minute and try
                            again later. Oops ! Something goes wrong. Wait a
                            minute and try again later.
                        </div>
                        <button
                            type="button"
                            class="close alert-modal__close p-2 mb-2"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            OK
                        </button>
                        <div class="alert-modal__note">
                            -- Click to see opposite state --
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CẦN NHÚNG FULL CÁC LIB NÀY A NHÉ-->
        <script src="theme/js/jquery.slim.min.js"></script>
        <script src="theme/js/bootstrap.bundle.min.js"></script>
        <script src="theme/js/nice-select2.js"></script>
        <script>
            // Riêng Select
            var selects = $(".e-select");
            if (selects.length > 0) {
                selects.each(function (i, e) {
                    var _id = $(e).attr("id");
                    var placeholderText = $(e).attr("data-text");
                    var placeholderText =
                        placeholderText != null
                            ? placeholderText
                            : $(e).attr("data-default");
                    var _option = {
                        searchable: true,
                        placeholder: placeholderText,
                    };
                    if (typeof NiceSelect !== undefined) {
                        NiceSelect.bind(document.getElementById(_id), _option);
                    }
                });
            }
        </script>
        <script>
            // Riêng JSON
            var ELEMENTOR_JSON_FIELD = function (clazz) {
                this.currentClazz = clazz != "" ? clazz : "contents";
                var self1 = this;
                this.uniqueID = function () {
                    return (
                        "elementor_json_field_" +
                        Math.random().toString(36).substr(2, 9)
                    );
                };
                this.initAddItem = function () {
                    var self = this;
                    $(".elementor_json_field .add-" + self.currentClazz).click(
                        async function (event) {
                            event.preventDefault();
                            var html = $(this)
                                .closest(".elementor_json_field")
                                .find(".hidden-item")
                                .html();
                            var fdivs = $(html).find(
                                ".elementor_json_field_control_content > div"
                            );
                            for (var i = 0; i < fdivs.length; i++) {
                                var uniqueID = self.uniqueID();
                                var div = $(fdivs[i]);
                                var oldId = div.attr("class");
                                var dataType = div.attr("data-type");
                                html = html.replace(
                                    new RegExp(oldId, "g"),
                                    uniqueID
                                );
                            }
                            $(
                                ".elementor_json_field .list-items-" +
                                    self.currentClazz
                            ).append(html);
                        }
                    );
                };
                this.initCloseItem = function () {
                    var self = this;
                    $(document).on(
                        "click",
                        ".elementor_json_field .list-items-" +
                            self.currentClazz +
                            " span.close",
                        function (event) {
                            event.preventDefault();
                            $(this).parents(".item").remove();
                            self.getDataValue();
                        }
                    );
                };
                this.initChange = function () {
                    var self = this;
                    $(document).on(
                        "change",
                        ".elementor_json_field .list-items-" +
                            self.currentClazz +
                            " .item .gallery,.elementor_json_field .list-items-" +
                            self.currentClazz +
                            " .item .text,.elementor_json_field .list-items-" +
                            self.currentClazz +
                            " .item .textarea,.elementor_json_field .list-items-" +
                            self.currentClazz +
                            " .item .number,.elementor_json_field .list-items-" +
                            self.currentClazz +
                            " .item .checkbox",
                        function (event) {
                            event.preventDefault();
                            self.getDataValue();
                        }
                    );
                };
                (this.getDataValue = function () {
                    var items = $(
                        ".list-items-" + this.currentClazz + " .item"
                    );
                    var objs = [];
                    for (var i = 0; i < items.length; i++) {
                        var item = $(items[i]);
                        var controls = item.find(".control");
                        var tmp = {};
                        for (var j = 0; j < controls.length; j++) {
                            var control = $(controls[j]);
                            var type = control.data("type");
                            var name = control.data("name");
                            var fnc = "getDataValue" + type;
                            if (typeof this[fnc] === "function") {
                                tmp[name] = this[fnc](control);
                            }
                        }
                        objs.push(tmp);
                    }
                    $("#" + this.currentClazz).text(
                        JSON.stringify({
                            ...objs,
                        })
                    );
                }),
                    (this.getDataValuetext = function (item) {
                        return $(item).val();
                    }),
                    (this.getDataValuetextarea = function (item) {
                        return this.getDataValuetext(item);
                    }),
                    (this.init = function () {
                        this.initAddItem();
                        this.initCloseItem();
                        this.initChange();
                    });
            };
            $(function () {
                window["elementor_json_field_json_fieldcontents"] =
                    new ELEMENTOR_JSON_FIELD("json_fieldcontents");
                window["elementor_json_field_json_fieldcontents"].init();
            });
        </script>
        <script>
            // Riêng các input như image, list image
            $(".toggle").click(function (e) {
                $(this).parent().children(".content").slideToggle(300);
            });
            $(".plus-image").click(function (e) {
                var _id = $(this).attr("data-id");
                var _number = $(this).attr("data-number");
                var _ls = $(this).parent();
                var _template = $(this)
                    .parent()
                    .children("[template]")
                    .first()
                    .clone();
                _template.find("img").attr("id", _id + _number);
                _template
                    .find("input")
                    .attr(
                        "onchange",
                        "document.getElementById('" +
                            _id +
                            _number +
                            "').src = window.URL.createObjectURL(this.files[0])"
                    );
                _template.attr("for", "image-" + _id + _number);
                _template.find("input").attr("id", "image-" + _id + _number);
                _template
                    .find("img")
                    .attr("src", "https://via.placeholder.com/350x350");
                // chỗ này anh nhớ change thành url no-image trong cms ý
                _ls.append(_template);
                $(this).attr("data-id", _id + _number);
                $(this).attr("data-number", ++_number);
            });
        </script>
    </body>
</html>
