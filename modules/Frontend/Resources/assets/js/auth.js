$(document).ready(function () {
    var passwordToggle = {
        className: ".show-ico",
        inputPassword: ".frm-pwd",
        init: function () {
            this.toggleEvent();
        },
        toggle: function () {
            $(this.className).toggleClass("active");
            let parentDom = $(this.className).parent();
            parentDom
                .find(this.inputPassword)
                .attr("type", function (idx, attr) {
                    return attr === "text" ? "password" : "text";
                });
        },
        toggleEvent: function () {
            $(this.className).click((e) => {
                e.preventDefault();
                this.toggle();
            });
        },
    };
    passwordToggle.init();
});
