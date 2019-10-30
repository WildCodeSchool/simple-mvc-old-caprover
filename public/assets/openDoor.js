function openDoor(field) {
    var y = $(field).find(".door");
    var x = y.attr("class");
    if (y.hasClass("doorOpened")) {
        y.removeClass("doorOpened");
        window.setTimeout("location=('http://www.supportduweb.com');",5000);
    }
    else {
        $(".door").removeClass("doorOpened");
        y.addClass("doorOpened");
        setTimeout(() => {
            window.location.href = "https://pixabay.com/fr/images/search/horor/"
        }, 2000)
    }
}