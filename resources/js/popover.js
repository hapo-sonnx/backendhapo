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
