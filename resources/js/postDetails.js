$(".btn-overflow").click(function (e) {
    e.stopPropagation();
    var btn = $(".btn-overflow"),
        text = $(".status-body-text");
    if (btn.hasClass("less")) {
        btn.removeClass("less");
        btn.addClass("more");
        btn.text("Afficher moins");
        $("html, body").animate(
            {
                scrollTop: h + 500,
            },
            1000
        );
        text.animate({
            height: h,
        });
    } else {
        btn.addClass("less");
        btn.removeClass("more");
        btn.text("Afficher plus...");
        text.animate({
            height: "150px",
        });
        $("html, body").animate(
            {
                scrollTop: h + 300,
            },
            1000
        );
    }
});