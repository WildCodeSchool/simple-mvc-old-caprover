function opendoorHome(field) {
    var y = $(field).find(".thumb-home");
    var x = y.attr("class");
    if (y.hasClass("thumbOpened")) {
        y.removeClass("thumbOpened");
    }
    else {
        $(".thumb").removeClass("thumbOpened");
        y.addClass("thumbOpened");
        setTimeout(() => {
            console.log('aaa')
            window.location.pathname = "/room/index"
        }, 3500)
    }
}