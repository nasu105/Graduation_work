<?php

// var_dump($_GET);
// exit();

include('function.php');
session_start();
check_session_id();

$id = $_GET['id'];
// var_dump($id);
// exit();

// DBを繋ぐ
$pdo = connect_to_db();

//sql作成及び実行
$sql = 'UPDATE Contact_form SET support = 1 WHERE id = :id';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

// sql実行
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:contactform_read.php');
exit();

?>