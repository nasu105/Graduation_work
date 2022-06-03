<?php

session_start();
include('function.php');
check_session_id();

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// DBを繋ぐ
$pdo = connect_to_db();

// sql文作成
$sql = "SELECT * FROM tweet_table LEFT OUTER JOIN (SELECT tweet_id, COUNT(id) AS like_count FROM like_table GROUP BY tweet_id) AS result_table ON tweet_table.id = result_table.tweet_id;";
// $sub_sql ="(SELECT tweet_id, COUNT(id) AS like_count FROM like_table GROUP BY tweet_id) AS result_table";
// $sql = 'SELECT * FROM tweet_table LEFT OUTER JOIN users_table ON like_table.user_id = users_table.id LEFT OUTER JOIN ' . $sub_sql . ' ON tweet_table.id = result_table.tweet_id';
// $sql = 'SELECT * FROM tweet_table LEFT OUTER JOIN users_table ON like_table.user_id = users_table.id LEFT OUTER JOIN ' . $sub_sql . ' ON tweet_table.id = result_table.tweet_id';

// SELECT * FROM tweet_table LEFT OUTER JOIN users_table ON like_table.user_id = users_table.id LEFT OUTER JOIN (SELECT tweet_id, COUNT(id) AS like_count FROM like_table GROUP BY tweet_id) AS result_table ON tweet_table.id = result_table.tweet_id

// $sub_sql = '(SELECT todo_id, COUNT(id) AS like_count FROM like_table GROUP BY todo_id) AS result_table';
// $sql = 'SELECT * FROM todo_table LEFT OUTER JOIN users_table ON todo_table.user_id = users_table.id LEFT OUTER JOIN ' . $sub_sql . ' ON todo_table.id = result_table.todo_id';

// $sql = "SELECT * FROM tweet_table ORDER BY updated_at ASC";
$stmt = $pdo->prepare($sql);

// var_dump($sql);
// exit();

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// exit();
$output = "";
foreach ($result as $record) {
  $output .= "
    <fieldset>
      <th>{$username}</th><br>
      <th>{$record["updated_at"]}</th><br>
      <th>{$record["tweet"]}</th><br>
      <td><a href='tweet_like_create.php?user_id={$_SESSION["user_id"]}&tweet_id={$record["id"]}'>愛♡{$record['like_count']}</a></td>
      <td><a href='tweet_edit.php?id={$record["id"]}'>編集</a></td>
      <td><a href='todo_delete.php?id={$record["id"]}'>削除</a></td>
    </fieldset>
  ";
  // <td>{$record["like_count"]}</td>
  //  <td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>like</a></td>
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>つぶやき一覧</title>
</head>

<body>
  <a href="content.php">つぶやく</a>
  <a href="logout.php">Logout</a>
  <p><?= $output ?></p>
</body>

</html>