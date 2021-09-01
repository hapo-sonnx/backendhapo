$(function () {
    if ($(".input-register").hasClass("check-register")) {
        $("#myModal").modal("show");
        $("#login").removeClass("active");
        $("#nav-login").removeClass("active");
        $("#register").addClass("active");
        $("#nav-register").addClass("active");
    }

    if ($(".input-login").hasClass("check-login")) {
        $("#myModal").modal("show");
        $("#register").removeClass("active");
        $("#nav-register").removeClass("active");
        $("#login").addClass("active");
        $("#nav-login").addClass("active");
    }
});
