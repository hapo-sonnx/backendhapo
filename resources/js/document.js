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

  function baseAjaxSetup(url, type, data, dataType) {
    $.ajaxSetup({
      url : url,
      type :type,
      data: data,
      dataType : dataType,
      headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
          }
    });
  }

  $(".btn-preview").click (function () {
    var ajaxSetup = baseAjaxSetup(
      '/learn',
      'POST',
      { documentID: $(this).data("id")},
      'json',

    );
    $.ajax({
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