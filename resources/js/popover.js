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
  document.getElementById("hideheader").style.display = "block";
  document.getElementById("hideheader").style.width = "5px";
  document.getElementById("showheader").style.display = "none";
  document.getElementById("navbarSupportedContent").style.display = "block";
}

function hideheader() {
  document.getElementById("hideheader").style.display = "none";
  document.getElementById("showheader").style.display = "block";
  document.getElementById("navbarSupportedContent").style.display = "none";
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
