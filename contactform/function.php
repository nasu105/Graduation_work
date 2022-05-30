<?php

function run()
{
  print('testcode');
}

// 昇順に並び替えるSQL文
function que()
{
  $que = "SELECT * FROM Contact_form ORDER BY created_at";
}

// DB接続
function connect_to_db()
{
  $dbn = 'mysql:dbname=卒業制作;charset=utf8mb4;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';

  try {
    return $pdo = new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
  }
}

// ログインの有無を確認する関数
function check_session_id() {
  if (!isset($_SESSION['session_id']) || $_SESSION['session_id'] != session_id()) {
    header('Location:login.php');
  } else {
    session_regenerate_id(true);
    $_SESSION['session_id'] = session_id();
  }
}

/* // 管理者か判明
function show_is_admin($number)
{
  return (int)$number === 1 ? '管理者' : '一般';
}
// $role = show_is_admin($_SESSION['is_admin']); // $roleで管理者or一般で分けれる */


// 都道府県変換
function japan47($administrative_divisions)
{
  if ($administrative_divisions == 1) {
    $value = '北海道';
  } else if ($administrative_divisions == 2) {
    $value = '青森県';
  } else if ($administrative_divisions == 3) {
    $value = '岩手県';
  } else if ($administrative_divisions == 4) {
    $value = '宮城県';
  } else if ($administrative_divisions == 5) {
    $value = '秋田県';
  } else if ($administrative_divisions == 6) {
    $value = '山形県';
  } else if ($administrative_divisions == 7) {
    $value = '福島県';
  } else if ($administrative_divisions == 8) {
    $value = '茨城県';
  } else if ($administrative_divisions == 9) {
    $value = '栃木県';
  } else if ($administrative_divisions == 10) {
    $value = '群馬県';
  } else if ($administrative_divisions == 11) {
    $value = '埼玉県';
  } else if ($administrative_divisions == 12) {
    $value = '千葉県';
  } else if ($administrative_divisions == 13) {
    $value = '東京都';
  } else if ($administrative_divisions == 14) {
    $value = '神奈川県';
  } else if ($administrative_divisions == 15) {
    $value = '新潟県';
  } else if ($administrative_divisions == 16) {
    $value = '富山県';
  } else if ($administrative_divisions == 17) {
    $value = '石川県';
  } else if ($administrative_divisions == 18) {
    $value = '福井県';
  } else if ($administrative_divisions == 19) {
    $value = '山梨県';
  } else if ($administrative_divisions == 20) {
    $value = '長野県';
  } else if ($administrative_divisions == 21) {
    $value = '岐阜県';
  } else if ($administrative_divisions == 22) {
    $value = '静岡県';
  } else if ($administrative_divisions == 23) {
    $value = '愛知県';
  } else if ($administrative_divisions == 24) {
    $value = '三重県';
  } else if ($administrative_divisions == 25) {
    $value = '滋賀県';
  } else if ($administrative_divisions == 26) {
    $value = '京都府';
  } else if ($administrative_divisions == 27) {
    $value = '大阪府';
  } else if ($administrative_divisions == 28) {
    $value = '兵庫県';
  } else if ($administrative_divisions == 29) {
    $value = '奈良県';
  } else if ($administrative_divisions == 30) {
    $value = '和歌山県';
  } else if ($administrative_divisions == 31) {
    $value = '鳥取県';
  } else if ($administrative_divisions == 32) {
    $value = '島根県';
  } else if ($administrative_divisions == 33) {
    $value = '岡山県';
  } else if ($administrative_divisions == 34) {
    $value = '広島県';
  } else if ($administrative_divisions == 35) {
    $value = '山口県';
  } else if ($administrative_divisions == 36) {
    $value = '徳島県';
  } else if ($administrative_divisions == 37) {
    $value = '香川県';
  } else if ($administrative_divisions == 38) {
    $value = '愛媛県';
  } else if ($administrative_divisions == 39) {
    $value = '高知県';
  } else if ($administrative_divisions == 40) {
    $value = '福岡県';
  } else if ($administrative_divisions == 41) {
    $value = '佐賀県';
  } else if ($administrative_divisions == 42) {
    $value = '長崎県';
  } else if ($administrative_divisions == 43) {
    $value = '熊本県';
  } else if ($administrative_divisions == 44) {
    $value = '大分県';
  } else if ($administrative_divisions == 45) {
    $value = '宮崎県';
  } else if ($administrative_divisions == 46) {
    $value = '鹿児島県';
  } else if ($administrative_divisions == 47) {
    $value = '沖縄県';
  }
  return $value;
}

// 都道府県名をvalueに変換
function chang_japan47($administrative_divisions) {
  if($administrative_divisions == '北海道') {
    $value = '1';
  } else if ($administrative_divisions == '青森県') {
    $value = '2';
  } else if ($administrative_divisions == '岩手県') {
    $value = '3';
  } else if ($administrative_divisions == '宮城県') {
    $value = '4';
  } else if ($administrative_divisions == '秋田県') {
    $value = '5';
  } else if ($administrative_divisions == '山形県') {
    $value = '6';
  } else if ($administrative_divisions == '福島県') {
    $value = '7';
  } else if ($administrative_divisions == '茨城県') {
    $value = '8';
  } else if ($administrative_divisions == '栃木県') {
    $value = '9';
  } else if ($administrative_divisions == '群馬県') {
    $value = '10';
  } else if ($administrative_divisions == '埼玉県') {
    $value = '11';
  } else if ($administrative_divisions == '千葉県') {
    $value = '12';
  } else if ($administrative_divisions == '東京都') {
    $value = '13';
  } else if ($administrative_divisions == '神奈川県') {
    $value = '14';
  } else if ($administrative_divisions == '新潟県') {
    $value = '15';
  } else if ($administrative_divisions == '富山県') {
    $value = '16';
  } else if ($administrative_divisions == '石川県') {
    $value = '17';
  } else if ($administrative_divisions == '福井県') {
    $value = '18';
  } else if ($administrative_divisions == '山梨県') {
    $value = '19';
  } else if ($administrative_divisions == '長野県') {
    $value = '20';
  } else if ($administrative_divisions == '岐阜県') {
    $value = '21';
  } else if ($administrative_divisions == '静岡県') {
    $value = '22';
  } else if ($administrative_divisions == '愛知県') {
    $value = '23';
  } else if ($administrative_divisions == '三重県') {
    $value = '24';
  } else if ($administrative_divisions == '滋賀県') {
    $value = '25';
  } else if ($administrative_divisions == '京都府') {
    $value = '26';
  } else if ($administrative_divisions == '大阪府') {
    $value = '27';
  } else if ($administrative_divisions == '兵庫県') {
    $value = '28';
  } else if ($administrative_divisions == '奈良県') {
    $value = '29';
  } else if ($administrative_divisions == '和歌山県') {
    $value = '30';
  } else if ($administrative_divisions == '鳥取県') {
    $value = '31';
  } else if ($administrative_divisions == '島根県') {
    $value = '32';
  } else if ($administrative_divisions == '岡山県') {
    $value = '33';
  } else if ($administrative_divisions == '広島県') {
    $value = '34';
  } else if ($administrative_divisions == '山口県') {
    $value = '35';
  } else if ($administrative_divisions == '徳島県') {
    $value = '36';
  } else if ($administrative_divisions == '香川県') {
    $value = '37';
  } else if ($administrative_divisions == '愛媛県') {
    $value = '38';
  } else if ($administrative_divisions == '高知県') {
    $value = '39';
  } else if ($administrative_divisions == '福岡県') {
    $value = '40';
  } else if ($administrative_divisions == '佐賀県') {
    $value = '41';
  } else if ($administrative_divisions == '長崎県') {
    $value = '42';
  } else if ($administrative_divisions == '熊本県') {
    $value = '43';
  } else if ($administrative_divisions == '大分県') {
    $value = '44';
  } else if ($administrative_divisions == '宮城県') {
    $value = '45';
  } else if ($administrative_divisions == '鹿児島県') {
    $value = '46';
  } else if ($administrative_divisions == '沖縄県') {
    $value = '47';
  }
  return $value;
}