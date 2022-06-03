$(function() {
  $('textarea').on('keydown keyup keypress change', function () {
    let count = $(this).val().length;
    let limit = 140 - count;
    if (limit <= 140) {
      $('#num').text(limit);
      $('#button').prop('disabled', false).removeClass('disabled');
      if (limit <= 0) {
        $('#num').text('0');
        $('#button').prop('disabled', true).addClass('disabled');
      }
    }
  });
});

