$('#datepicker').datepicker({
  dateFormat: 'yy-mm-dd',
  showButtonPanel: true,
  changeMonth: true,
  changeYear: true,
  showOtherMonths: true,
  selectOtherMonths: true,
  showButtonPanel: true,
  yearRange: '1950:2021'
});

$("#icon-upload-ava").click(function () {
  $("#input-upload-ava").trigger('click');
});