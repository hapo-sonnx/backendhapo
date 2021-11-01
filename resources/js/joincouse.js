$(function () {
  $('#btnProfileHeader').on('click', function (e) {
    if ($('#btnRegisLogin').length > 0) {
      e.preventDefault();
      $("#myModal").modal("show");
      $("#login").addClass("active");
      $("#nav-login").addClass("active");
    }
  });

  $('#btnJoinCourse').on('click', function (e) {
    if ($('#btnRegisLogin').length > 0) {
      e.preventDefault();
      $("#myModal").modal("show");
      $("#login").addClass("active");
      $("#nav-login").addClass("active");
    }
  });
});
