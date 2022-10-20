var HOME = (function () {
    var _menu = function () {
        var _menu = $(".manager-table li .arrow");
        var _child = $(".manager-table li ul");
        _menu.click(function (event) {
            event.preventDefault();
            var _parent = $(this).parent().children("ul");
            _parent.slideToggle(300);
            _child.not(_parent).slideUp(300);
        });
    };
    var _menuMobile = function () {
        var btnMenu = $(".btn-menu");
        var menu = $(".manager-table");
        btnMenu.click(function (event) {
            menu.slideToggle(300);
        });
    };
    return {
        _: function () {
            _menu();
            _menuMobile();
        },
    };
})();
window.addEventListener("DOMContentLoaded", function () {
    HOME._();
});
