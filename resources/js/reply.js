$(function () {
  $('.btn-reply').on('click', function () {
    if ($('#btnRegisLogin').length > 0) {
      $("#myModal").modal("show");
      $("#login").addClass("active");
      $("#nav-login").addClass("active");
    }

    var form = $(this).data('id');

    $('.form-reply-comment').each(function () {
      if ($(this).hasClass(form) && $('#btnRegisLogin').length == 0 || $(this).data('id') == form) {
        if ($(this).css("display") == "none") {
          $(this).css({ "display": "block" })
        } else {
          $(this).css({ "display": "none" })
        }
      } else {
        $(this).css({ "display": "none" })
      }
    });

    $('.review-id-reply').each(function () {
      if ($(this).val() != form) {
        $(this).removeClass("get-review-id");
      }

      if ($(this).val() == form) {
        $(this).addClass("get-review-id");
      }
    });

    $('.input-reply-comment').each(function () {
      if ($(this).data('id') != form) {
        $(this).val("");
      }
    });
  });

  $('.form-reply-comment').submit(function (e) {
    e.preventDefault();

    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });

    var reply;
    var reviewId;
    $('.input-reply-comment').each(function () {
      if ($(this).val()) {
        reply = $(this).val();
        reviewId = $(this).data('id');
      }
    });

    var userId = $('.user-id-reply').first().val();

    if (reply != null && reviewId != null && userId != null) {
      $.ajax({
        url: "/replyreview",
        method: "POST",
        data: {
          reply: reply,
          reviewId: reviewId,
          userId: userId
        },
        dataType: "json",
        success: function (result) {
          var html = `<li>
            <p class="name-user-cmt text-centers">`+ result.user + ` <span>` + result.reply.created_at + `</span></p>
            <p class="row pl-0 reply-comment-body">`+ result.reply.content + `</p>
            </li>`;
          console.log(result);

          $('.reply-comment-container').each(function () {
            if ($(this).attr("data-id") == result.reply.feeback_id) {
              $(this).append(html);
            }
          });

          $('.input-reply-comment').each(function () {
            $(this).val('');
          });
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(JSON.stringify(jqXHR));
          console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
      })
    }
  });
})
