<?php

// var_dump($_POST);
// exit();
session_id();
include('function.php');

// もし空白のまま送信したら
if (
  !isset($_POST['tweet']) || $_POST['tweet'] == ''
) {
  exit('parmError');
}

$tweet = $_POST['tweet'];

// DB接続
$pdo = connect_to_db();

// sql作成及び実行
$sql = 'INSERT INTO tweet_table (id, tweet, created_at, updated_at) VALUES (NULL, :tweet, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':tweet', $tweet, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:content.php");
exit();

?>