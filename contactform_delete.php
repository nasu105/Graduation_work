<?php

// var_dump($_GET);
// exit();

$id = $_GET['id'];

// DBに繋ぐ
include('function.php');
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