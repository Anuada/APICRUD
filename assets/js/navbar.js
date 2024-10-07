$(document).ready( () => {
    var navbar = $(".navbar");

    $(window).scroll( () => {
        var scrollPosition = $(window).scrollTop();

        if (scrollPosition > 0) {
            navbar.removeClass("bg-hidden");
            navbar.addClass("bg-white");
        } else {
            navbar.addClass("bg-hidden");
            navbar.removeClass("bg-white");
        }
    });
});