console.log('自分の欲望だけ満たして最低だ');

// 
$(document).ready(function() {
  $('#admin_display').tablesorter({
    headers: {
      6: { sorter: false },
      8: { sorter: false },
      9: { sorter: false },
      10: { sorter: false },
      11: { sorter: false },
      13: { sorter: false },
      14: { sorter: false },
    }
  });
});

// $(function () { // if document is ready 
//   alert('jQuery is ready.')
// });

/* // サポート押すと色が変わる
$('.admin_display').on('click', 'td', function (e) {
  if (e.target.localName == 'input') {
    // 親への伝播ストップ
    e.stopProgagation();
  } else if (e.farget.localName == 'lebel') {
    // 自身へのイベントストップ
    e.preventDefault();
  }

  const clsName = 'clsZebra';

  const tmpTr = $(this).parents('tr');

  if (e.target.localName == 'td' || e.target.localName == 'label') {
    const tmpChk = $(tmpTr).find('input[type=checkbox]:checked').length;
    $(tmpTr).find('input[type=checkbox]').prop('checked', !tmpChk);
  }

  if (!tmpTr.hasClass(clsName)) {
    $(tmpTr).addClass(clsName);
  } else {
    $(tmpTr).removeClass(clsName);
  }
}); */