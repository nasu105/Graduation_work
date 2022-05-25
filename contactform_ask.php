<?php
include('function.php');
// DB接続
$pdo = connect_to_db();

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる

// SQL作成&実行(昇順に並び替え)
$sql = 'SELECT * FROM Contact_form ORDER BY created_at ASC';
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
  foreach ($result as $record){
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
        <a harf='contactform_edit.php?id={$record["id"]}'>edit</a>
      </td>
      <td>
        <a harf='contactform_delete.php?id={$record["id"]}'>delete</a>
      </td>
    </tr>";
  }
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// var_dump($str);
// exit();

/* // 降順が指定されているか判定
if (isset($_POST['sort']) && $_POST['sort'] == 'desc') {
  // 降順に並び替えるSQL文に変更
  $que = $que . ' DESC';
}

// 外部ファイルの読み込み
require('./tips.php');
run(); */
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="contactform_read.css">
  <title>管理者画面</title>
</head>
<body>
  <div>
    <a href="contactform_read.php">ユーザーリスト(一覧)</a>
  </div>
  <div>
    <a href="contactform_desc.php">作成日(昇順)</a>
  </div>
  
  <table border='1' class="admin_display">
    <tr>
      <th>会社名</th>
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
    <tobody>
      <!-- ここにデータが入る -->
      <?= $str ?>
    </tobody>
</table>
  
</body>
</html>