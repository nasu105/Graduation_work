<?php

session_start();
// var_dump($_GET);
// exit();
include('function.php');
check_session_id();

$id = $_GET['id'];

// DBを繋げる
$pdo = connect_to_db();
// sql文の作成
$sql = 'SELECT * FROM tweet_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($record);
// exit();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>つぶやき(編集画面)</title>
</head>

<body>
  <div>ようこそ<?= "{$_SESSION['username']}" ?>さん</div>
  <form action="tweet_update.php" method="POST">
    つぶやき: <br>
    <textarea name="tweet" id="" cols="20" rows="10" placeholder='140字以内でお願いします' maxlength="140"><?= $record['tweet'] ?></textarea>
    <p id="count">あと<span id="num"></span>文字</p>
    <button>修正</button>
    <input type="hidden" name="id" value="<?= $record["id"] ?>">
  </form>
  <a href="tweet_read.php">つぶやき一覧</a>
  <a href="logout.php">Logout</a>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="content.js"></script>
</body>

</html>