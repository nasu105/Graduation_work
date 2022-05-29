<?php

// var_dump($_GET);
// exit();
include('function.php');
session_start();
chek_session_id();

$id = $_GET['id'];

// DBに繋ぐ
$pdo = connect_to_db();

// SQL作成及び実行
$sql = 'DELETE FROM Contact_form WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try{
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error"  => "{$e->getMessage()}"]);
}

header("Location:contactform_read.php");
exit();


?>