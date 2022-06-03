<?php

include('function.php');
session_start();
check_session_id();

// ユーザー名かどうか判定
$role = show_is_admin($_SESSION['is_admin']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>つぶやき</title>
</head>

<body>
  <div>ようこそ<?= "{$_SESSION['username']}({$role})" ?>さん</div>
  <form action="tweet_creat.php" method="POST">
    つぶやき: <br>
    <textarea name="tweet" id="" cols="20" rows="10" placeholder='140字以内でお願いします' maxlength="140"></textarea>
    <p id="count">あと<span id="num"></span>文字</p>
    <button>送信</button>
  </form>
  <div>
    <!-- <a href="login.php" type="hidden">Top</a> -->
    <a href="tweet_read.php">つぶやき一覧</a>
    <a href="logout.php">Log out</a>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="content.js"></script>
</body>

</html>