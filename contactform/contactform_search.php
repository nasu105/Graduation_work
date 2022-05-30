<?php

// var_dump($_POST);
// exit();
include('function.php');
session_start();
check_session_id();

// DBを繋ぐ
$pdo = connect_to_db();

$sql = "SELECT * FROM Contact_form WHERE company_name = '" . $_POST["searching"] . "' OR
use_bim = '" . $_POST["searching"] . "' OR
Department = '" . $_POST["searching"] . "' OR
industry = '" . $_POST["searching"] . "' OR
administrative_divisions = '" . $_POST["searching"] . "' OR
name = '" . $_POST["searching"] . "'";
$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo '<pre>';
  // var_dump($result);
  // echo '</pre>';
  // exit();
  $str = '';
  foreach ($result as $record) {
  $str .= "
  <form class='admin_table' id='admin_table'>
    <tr>
      <td>{$record['company_name']}</td>
      <td>{$record['Department']}</td>
      <td>{$record['industry']}</td>
      <td>{$record['use_bim']}</td>
      <td>{$record['postal_code']}</td>
      <td>{$record['administrative_divisions']}</td>
      <td>{$record['address']}</td>
      <td>{$record['name']}</td>
      <td>{$record['e_mail']}</td>
      <td>{$record['TEL']}</td>
      <td>{$record['FAX']}</td>
      <td>{$record['comment']}</td>
      <td>{$record['created_at']}</td>
      <td>
        <a href='contactform_edit.php?id={$record["id"]}' id='edit'>edit</a>
      </td>
      <td>
        <a href='contactform_delete.php?id={$record["id"]}'>delete</a>
      </td>
      <td>
        <a href='contactform_support_update.php?id={$record["id"]}'>completion</a>
      </td>
    </tr>
  </form>";
  }
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="contactform_read.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>
  <title>管理者画面</title>
  <script src="contactform_read.js"></script>
  <style>
    .clsZebra td {
      background-color: #ffffdd;
    }
  </style>
</head>


<body>
  <div>
    <a href="contactform_read.php">back</a>
    <a href="contactform_read_supported.php">Supported list</a>
    <a href="logout.php">Logout</a>
    <a href="../admin_display.php">Top</a>
    <p>問い合わせリスト(サポート未対応)</p>
  </div>
  <form action="contactform_search.php" method="POST">
    <input type="text" name='searching'>
    <button>検索</button>
  </form>
  <div>
    <table border='1' class="admin_display" id="admin_display">
      <thead>
        <tr>
          <th id="conpany">会社名</th>
          <th>所属部署</th>
          <th>業種</th>
          <th>使用中の建築ソフト</th>
          <th>郵便番号</th>
          <th>都道府県</th>
          <th>住所</th>
          <th>名前</th>
          <th>Email</th>
          <th>TEL</th>
          <th>FAX</th>
          <th>ご要望</th>
          <th>送信日時</th>
          <th>編集</th>
          <th>削除</th>
          <th>サポート</th>
        </tr>
      </thead>
      <tobody>
        <!-- ここにデータが入る -->
        <?= $str ?>
      </tobody>
    </table>
  </div>
</body>

</html>