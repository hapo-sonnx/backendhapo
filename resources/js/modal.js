$(function () {
  if ($(".inputRegister").hasClass("check-register")) {
    $("#myModal").modal("show");
    $("#login").removeClass("active");
    $("#nav-login").removeClass("active");
    $("#register").addClass("active");
    $("#nav-register").addClass("active");
  }

  if ($(".inputLogin").hasClass("check-login")) {
    $("#myModal").modal("show");
    $("#register").removeClass("active");
    $("#nav-register").removeClass("active");
    $("#login").addClass("active");
    $("#nav-login").addClass("active");
  }
});
