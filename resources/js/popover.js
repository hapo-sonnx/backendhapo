$(function () {
  $('[data-toggle="popover"]').popover()
})

$(document).ready(function () {
  $(".close-button").click(function () {
    $(".text-mess").hide();
  });
  $(".img-mess").click(function () {
    $(".text-mess").show();
  });
});


function showheader() {
  $("#hideheader").css({ "display": "block" })       
  $("#showheader").css({ "display": "none" })  
  $("#navbarSupportedContent").css({ "display": "block" })  
}

function hideheader() {
  $("#hideheader").css({ "display": "none" })
  $("#showheader").css({ "display": "block" })  
  $("#navbarSupportedContent").css({ "display": "none" })
}


$(document).ready(function () {
  $('.btn-x').click(function () {
    if ($('.collapse').hasClass("show")){
      $(".collapse").removeClass("show");
      $(".navbar-toggler-icon").css({ "display": "inline-block" })      
      $(".img-close-header").css({ "display": "none" })
    }
  });
});

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
