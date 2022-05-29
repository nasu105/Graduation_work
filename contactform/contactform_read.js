console.log('自分の欲望だけ満たして最低だ');

$(document).ready(function() {
  $('#admin_display').tablesorter({
    headers: {
      6: { sorter: false },
      8: { sorter: false },
      9: { sorter: false },
      10: { sorter: false },
      11: { sorter: false },
      13: { sorter: false },
      14: { sorter: false }
    }
  });
});

// $(function () { // if document is ready 
//   alert('jQuery is ready.')
// });