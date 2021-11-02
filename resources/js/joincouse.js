$(function () {
  $('#btnProfileHeader').on('click', function () {
      $("#myModal").tab("show");
      $("#login").addClass("active");
      $("#nav-login").addClass("active");
  });

  $('#btnJoinCourse').on('click', function () {
      $("#myModal").modal("show");
      $("#login").addClass("active");
      $("#nav-login").addClass("active");
  });
});
