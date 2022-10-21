// của riêng select
var selects = $(".e-select");
if (selects.length > 0) {
    selects.each(function (i, e) {
        var _id = $(e).attr("id");
        var placeholderText = $(e).attr("data-text");
        var placeholderText =
            placeholderText != null ?
                placeholderText :
                $(e).attr("data-default");
        var _option = {
            searchable: true,
            placeholder: placeholderText,
        };
        if (typeof NiceSelect !== undefined) {
            NiceSelect.bind(document.getElementById(_id), _option);
        }
    });
}

var ELEMENTOR_JSON_FIELD = function (clazz) {
    this.currentClazz = clazz != "" ? clazz : "contents";
    var self1 = this;
    this.uniqueID = function () {
        return 'elementor_json_field_' + Math.random().toString(36).substr(2, 9);
    };
    this.initAddItem = function () {
        var self = this;
        $('.elementor_json_field .add-' + self.currentClazz).click(async function (event) {
            event.preventDefault();
            var html = $(this).closest('.elementor_json_field').find('.hidden-item').html();
            var fdivs = $(html).find('.elementor_json_field_control_content > div');
            for (var i = 0; i < fdivs.length; i++) {
                var uniqueID = self.uniqueID();
                var div = $(fdivs[i]);
                var oldId = div.attr('class');
                var dataType = div.attr('data-type');
                html = html.replace(new RegExp(oldId, 'g'), uniqueID);
            }
            $('.elementor_json_field .list-items-' + self.currentClazz).append(html);
        });
    }
    this.initCloseItem = function () {
        var self = this;
        $(document).on('click', '.elementor_json_field .list-items-' + self.currentClazz + ' span.close', function (event) {
            event.preventDefault();
            $(this).parents('.item').remove();
            self.getDataValue();
        });
    }
    this.initChange = function () {
        var self = this;
        $(document).on('change', '.elementor_json_field .list-items-' + self.currentClazz + ' .item .gallery,.elementor_json_field .list-items-' + self.currentClazz + ' .item .text,.elementor_json_field .list-items-' + self.currentClazz + ' .item .textarea,.elementor_json_field .list-items-' + self.currentClazz + ' .item .number,.elementor_json_field .list-items-' + self.currentClazz + ' .item .checkbox', function (event) {
            event.preventDefault();
            self.getDataValue();
        });
    }
    this.getDataValue = function () {
        var items = $('.list-items-' + this.currentClazz + ' .item');
        var objs = [];
        for (var i = 0; i < items.length; i++) {
            var item = $(items[i]);
            var controls = item.find('.control');
            var tmp = {};
            for (var j = 0; j < controls.length; j++) {
                var control = $(controls[j]);
                var type = control.data('type');
                var name = control.data('name');
                var fnc = 'getDataValue' + type;
                if (typeof this[fnc] === "function") {
                    tmp[name] = this[fnc](control);
                }
            }
            objs.push(tmp);
        }
        $('#' + this.currentClazz).text(JSON.stringify({
            ...objs
        }));
    },
        this.getDataValuetext = function (item) {
            return $(item).val();
        },
        this.getDataValuetextarea = function (item) {
            return this.getDataValuetext(item);
        },
        this.init = function () {
            this.initAddItem();
            this.initCloseItem();
            this.initChange();
        }
}
$(function () {
    window['elementor_json_field_json_fieldcontents'] = new ELEMENTOR_JSON_FIELD('json_fieldcontents');
    window['elementor_json_field_json_fieldcontents'].init();
});

$(".toggle").click(function (e) {
    $(this).parent().children(".content").slideToggle(300);
});
$(".plus-image").click(function (e) {
    var _id = $(this).attr("data-id");
    var _number = $(this).attr("data-number");
    var _ls = $(this).parent();
    var _template = $(this).parent().children("[template]").first().clone();
    _template.find("img").attr("id", _id + _number);
    _template.find("input").attr("onchange", "document.getElementById('" + _id + _number + "').src = window.URL.createObjectURL(this.files[0])");
    _template.attr("for", "image-" + _id + _number);
    _template.find("input").attr("id", "image-" + _id + _number);
    _template.find("img").attr("src", "https://via.placeholder.com/385x172");
    _ls.append(_template);
    $(this).attr("data-id", _id + _number);
    $(this).attr("data-number", ++_number);
});

