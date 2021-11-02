$(function () {
  $("#btnResetFilter").on('click', function () {
    $("#filterSearch").val("");
    $(".inputFilter").val("");
    $(".btnLatest").prop("checked", false);
    $(".btnOldest").prop("checked", false);
  });
});
