$(function () {
    $("#btn-reset-filter").on('click', function () {
        $("#filter-search").val("");
        $(".input-filter").val("");
        $(".btn-latest").prop("checked", false);
        $(".btn-oldest").prop("checked", false);
    });
});
