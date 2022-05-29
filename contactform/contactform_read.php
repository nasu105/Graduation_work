<?php

include('function.php');
session_start();
chek_session_id();

// 各種項目設定
$dbn = 'mysql:dbname=卒業制作;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる

// SQL作成&実行
$sql = 'SELECT * FROM Contact_form';
$stmt = $pdo->prepare($sql);
// SQL作成降順
$sql_ask = 'SELECT * FROM Contact_form ORDER BY created_at ASC';
// SQL作成昇順
$sql_ask = 'SELECT * FROM Contact_form ORDER BY created_at DESC';


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
    </tr>";
  }
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// var_dump($str);
// exit();
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
</head>


<body>
  <div>
    <a href="../admin_display.php">Top</a>
    <a href="logout.php">Logout</a>
  </div>
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