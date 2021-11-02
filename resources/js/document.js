const { countBy } = require("lodash");

$(function () {
  var $i = 0;
  $(".btn-preview").each(function (index) {
    $tag = $($(".btn-preview")[index])
      .text()
      .trim().length;
    if ($tag == 0) {
      $(this).text("Preview");
    }
  });
  
  $(".btn-preview").click (function () {
    $.ajax({
      url: "/learning",
      method: "POST",
      data: {
        documentID: $(this).data("id")
      },
      dataType: "json",
      success: function (result) {
        result.number.forEach(number => {
          $(".btn-preview").each(function (index) {
            var data_id = $(this).attr("data-id");
            if (number.document_id == data_id) {
              $(this).text("Learned");
            }
          });
        });
        $("#progress").css({ "width": result.percentage + "%" });
        $('#showPercentage').text(result.percentage + "%")
      }
    });
  });
});