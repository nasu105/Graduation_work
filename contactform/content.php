<?php

include('function.php');
session_start();
check_session_id();

// 管理者かどうか判定
function show_is_admin($number)
{
  return (int)$number === 1 ? '管理者' : '一般';
}

$role = show_is_admin($_SESSION['is_admin']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>録音</title>
</head>

<body>
  <div>ようこそ<?= "{$_SESSION['username']}({$role})" ?>さん</div>
  <div>
    <h1>もう手書きのメモなんて必要ない</h1>
    <p>追加コンテン乞うご期待</p>
  </div>
  <div>
    <!-- <a href="login.php" type="hidden">Top</a> -->
    <a href="logout.php">Log out</a>
  </div>

</body>

</html>