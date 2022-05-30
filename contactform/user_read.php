<?php
include('function.php');
session_start();
check_session_id();

// DB接続
$pdo = connect_to_db();

// SQL作成実行
$sql = 'SELECT * FROM users_table ORDER BY created_at';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $role = show_is_admin($record['is_admin']);
  $output .= "
    <tr>
      <td>{$record["username"]}</td>
      <td>{$record["password"]}</td>
      <td>{$role}</td>
      <td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>
      <td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>
    </tr>
  ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザーリスト</title>
</head>

<body>
  <fieldset>
    <legend>ユーザーリスト(編集画面)</legend>
    <a href="../admin_display.php">Top</a>
    <a href="logout.php">Logout</a>
    <table>
      <thead>
        <tr>
          <th>name</th>
          <th>password</th>
        </tr>
      </thead>
      <tbody>
        <?= $output?>
      </tbody>
    </table>
  </fieldset>

</body>

</html>