$(function () {
    $("#reviewForm").on('submit', function (e) {
        e.preventDefault();
        const formData = $("#reviewForm").serializeArray();
        const endpoint = $("#reviewForm").attr('action');
        formData.forEach(data => {
            dataObj[data['name']] = data['value'];
        });
        dataObj['rate'] = $('input[name="rate"]:checked').val();
        console.log(dataObj);
        $ajax({
            type: "POST",
            url: endpoint,
            data: dataObj,
            success: function (res) {
                let html = `<li>
                  <p>`+ userName + ` <span>` + getRate(dataObj['rate']) + `</span></p>
                  
                  <p>`+ dataObj['content'] + `</p>
                </li>`;

                $('#commentArea').append(html);

                $('#content').val('');
                $('input[name="rate"]:checked').prop('checked', false);
            }
        })
    });
});