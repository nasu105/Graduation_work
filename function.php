<?php

function run() {
  print('testcode');
}

// 昇順に並び替えるSQL文
function que() {
  $que = "SELECT * FROM Contact_form ORDER BY created_at";
}

// DB接続
function connect_to_db()
{
  $dbn ='mysql:dbname=卒業制作;charset=utf8mb4;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';

  try {
    return $pdo = new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
  }
}
?>