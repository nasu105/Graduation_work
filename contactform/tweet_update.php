<?php

// var_dump($_POST);
// exit();
session_start();
include('function.php');
check_session_id();

if (
  !isset($_POST['tweet']) || $_POST['tweet'] == ''
) {
  exit('parmError');
}

$tweet = $_POST['tweet'];
$id = $_POST['id'];

// DB接続
$pdo = connect_to_db();

// sql作成及び実行
$sql = 'UPDATE tweet_table SET tweet=:tweet, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':tweet', $tweet, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:tweet_read.php");
exit();

?>