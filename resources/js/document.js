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

  $(".btn-preview").on("click", function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });

    var documentID = $(this).data("id");
    $.ajax({
      url: "/learning",
      method: "POST",
      data: {
        documentID: documentID
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
        console.log(result.number);
        var width = result.percentage;
        $("#progress").css({ "width": width + "%" });
        $('#show-percentage').text(width + "%")
      }
    });
  });
});