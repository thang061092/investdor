var HOME = (function () {
    var _menuMobile = function () {
        var win = $(window);
        var html = $("html");
        var nav = $(".box-menu");
        var menu = nav.children("ul");
        var showMenu = $(".btn-menu,.btn-close");
        var overlay = $(".overlay");
        menu.find("li").each(function (index, el) {
            if ($(this).find("ul li").length > 0) {
                $(this).prepend('<i class="fa fa-angle-down smooth"></i>');
            }
        });
        menu.find("i").click(function (event) {
            var offParent = $(this).offsetParent();
            var index = $(this).offsetParent().children("ul");
            var _this = $(this);
            if (index.is(":hidden")) {
                offParent.parent().find("ul").not(index).slideUp(250);
                offParent
                    .parent()
                    .find("ul")
                    .not(index)
                    .siblings("i")
                    .removeClass("active");
                index.slideToggle(250);
                _this.addClass("active");
                event.stopPropagation();
            } else {
                _this.removeClass("active");
                index.slideUp(250);
            }
            event.stopPropagation();
        });
        showMenu.click(function (event) {
            if (!nav.hasClass("active")) {
                showMenu.addClass("open");
                overlay.addClass("active");
                nav.addClass("active");
            } else {
                showMenu.removeClass("open");
                nav.removeClass("active");
                overlay.removeClass("active");
            }
            event.stopPropagation();
        });
    };
    var _initSelect = function () {
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
                if (typeof NiceSelect !== "undefined") {
                    NiceSelect.bind(document.getElementById(_id), _option);
                }
            });
        }
    };
    var _toggleContent = function () {
        var btn = $(".btn_toggle:not(.item-step)");
        if ($(window).width() < 991) {
            var btn = $(".btn_toggle");
        }
        if (btn.length > 0) {
            var contents = $(".toggle-content .content");
            btn.click(function (event) {
                var _this = $(this);
                var _content = $(this).parent().find(".content");
                contents.not(_content).slideUp(300);
                btn.not(_this).removeClass("show");
                _content.slideToggle(300);
                _this.toggleClass("show");
                event.stopPropagation();
            });
        }
    };
    var _fixedMenu = function () {
        optionMenu = {
            hideOnScrollDown: false,
            delayShowOnScrollTop: 0,
        };
        hideOnScrollDown = optionMenu.hideOnScrollDown || false;
        delayShowOnScrollTop = optionMenu.delayShowOnScrollTop || 0;
        var header = $(".header");
        if (header.length > 0) {
            var headerHeight = header.outerHeight();
            header.addClass("fixed");
            var lastScrollTop = 0;
            window.addEventListener("scroll", function () {
                var st =
                    window.pageYOffset || document.documentElement.scrollTop;
                if (st > headerHeight) {
                    header.addClass("scroll");
                } else {
                    header.removeClass("scroll");
                }
            });
        }
    };
    var _initWow = function () {
        var width_ = window.innerWidth;
        if (width_ > 991) {
            var wow = new WOW();
            wow.init();
        }
    };
    var _filter = function () {
        var filterBtn = $(".show-filter,.reset-filter");
        if (filterBtn.length > 0) {
            var filterBox = $(".box-filter");
            filterBtn.click(function (event) {
                event.preventDefault();
                filterBox.slideToggle(300);
            });
        }
    };
    var _copyClipboard = function () {
        var btnCopy = $(".copy");
        if (btnCopy.length > 0) {
            btnCopy.click(function () {
                var _content = $(this).parent().find("input").val();
                if (!navigator.clipboard) {
                    $(this).addClass("failed");
                }
                navigator.clipboard
                    .writeText(_content)
                    .then(() => {
                        $(this).addClass("copied");
                    })
                    .catch((error) => {
                        $(this).addClass("failed");
                    });
            });
        }
    };
    var _showLanguageMenu = function () {
        var langBox = $(".langs .lang-item");
        if (langBox.length > 0) {
            langBox.click(function (event) {
                event.preventDefault();
                var _lsLang = $(this).parent().find(".items");
                _lsLang.slideToggle();
            });
        }
    };
    return {
        _: function () {
            _menuMobile();
            _initSelect();
            _toggleContent();
            _fixedMenu();
            _filter();
            _initWow();
            _copyClipboard();
            _showLanguageMenu();
        },
    };
})();
window.addEventListener("DOMContentLoaded", function () {
    HOME._();
});
