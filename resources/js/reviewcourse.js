$(function () {
  $("#reviewForm").on('submit', function (e) {
    e.preventDefault();
    const formData = $("#reviewForm").serializeArray();
    const endpoint = $("#reviewForm").attr('action');
    const dataObj = {};
    formData.forEach(data => {
      dataObj[data['name']] = data['value'];
    });
    dataObj['rate'] = $('input[name="rate"]:checked').val();

    $.ajax({
      type: "POST",
      url: endpoint,
      data: dataObj,
      success: function (res) {
        let html = `<li>
              <p class="name-user-cmt text-centers">`+ userName + ` <span>` + getRate(dataObj['rate']) + `</span></p>
              <p class="row pl-0 reply-comment-body">`+ dataObj['content'] + `</p>
            </li>`;
        $('#commentArea').append(html);

        $('#content').val('');
        $('input[name="rate"]:checked').prop('checked', false);
      }
    })
  });
});

function getRate(number) {
  let html = '';
  if (number < 5) {
    for (let i = 0; i < number; i++) {
      html += '<i class="fa fa-star checked"></i>';
    }
    for (let i = 0; i < 5 - number; i++) {
      html += '<i class="fa fa-star-o"></i>';
    }
  } else if (number == "") {
    for (let i = 0; i < 5; i++) {
      html += '<i class="fa fa-star-o"></i>';
    }
  } else {
    for (let i = 0; i < 5; i++) {
      html += '<i class="fa fa-star"></i>';
    }
  }


  return html;
}
