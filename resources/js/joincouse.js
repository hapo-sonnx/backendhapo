$(function () {
  $('#btn-profile-header').on('click', function (e) {
    if ($('#btn-regis-login').length > 0) {
      e.preventDefault();
      $("#myModal").modal("show");
      $("#login").addClass("active");
      $("#nav-login").addClass("active");
    }
  });

  $('#btn-join-course').on('click', function (e) {
    if ($('#btn-regis-login').length > 0) {
      e.preventDefault();
      $("#myModal").modal("show");
      $("#login").addClass("active");
      $("#nav-login").addClass("active");
    }
  });
});