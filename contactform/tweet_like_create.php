<?php

// var_dump($_GET);
// exit();
session_start();
include('function.php');
check_session_id();

$user_id = $_GET['user_id'];
$tweet_id = $_GET['tweet_id'];

// DB接続
$pdo = connect_to_db();

// sql作成及び実行
$sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND tweet_id=:tweet_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':tweet_id', $tweet_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$like_count = $stmt->fetchColumn();
// var_dump($like_count);
// exit();

if ($like_count > 0) {
  // likeを取り消し
  $sql = 'DELETE FROM like_table WHERE user_id=:user_id AND tweet_id=:tweet_id';
} else {
  // likeを追加
  $sql = 'INSERT INTO like_table (id, user_id, tweet_id, created_at) VALUES (NULL, :user_id, :tweet_id, now())';
}



$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':tweet_id', $tweet_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:tweet_read.php");
exit();

?>