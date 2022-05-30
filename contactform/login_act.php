<?php

// var_dump($_POST);
// exit();

session_start();
include('function.php');

$username = $_POST['username'];
$password = $_POST['password'];

// DBを繋ぐ
$pdo = connect_to_db();

// usrname,password.is_deletedの3項目全てを満たすデータを抽出する
$sql = 'SELECT * FROM users_table WHERE username = :username AND password = :password AND is_deleted = 0';

$stmt = $pdo->prepare($sql);
// バインド変数を設定
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// ユーザーの有無で条件分岐を行う
$val = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($val);
// exit();

if (!$val) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href='login.php'>ログイン</a>";
  //管理者IDで入った時
} else if ($val && $val['is_admin'] == 1) {
  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $val['is_admin'];
  $_SESSION['username'] = $val['username'];
  header('Location:../admin_display.php');
  // ユーザIDで入った時
} else  if ($val && $val['is_admin'] == 0){
  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $val['is_admin'];
  $_SESSION['username'] = $val['username'];
  header('Location:content.php');
}

?>