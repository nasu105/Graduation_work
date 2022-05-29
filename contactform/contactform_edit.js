console.log(japan_select);

$('#administrative_divisions option').filter(function(index) {
  return $(this).val() === japan_select;
}).prop('selected', true);

// if ($('administrative_divisions').val() == '') {
//   $("#administrative_divisions option[value='40']").prop('selected', true);
// }
