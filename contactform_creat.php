<?php
include('function.php');
// var_dump($_POST);
// exit();

if (
  !isset($_POST['company_name']) || $_POST['company_name'] == '' ||
  !isset($_POST['Department']) || $_POST['Department'] == '' ||
  !isset($_POST['industry']) || $_POST['industry'] == '' ||
  !isset($_POST['use_bim']) || $_POST['use_bim'] == '' ||
  !isset($_POST['postal_code']) || $_POST['postal_code'] == '' ||
  !isset($_POST['administrative_divisions']) || $_POST['administrative_divisions'] == '' ||
  !isset($_POST['address']) || $_POST['address'] == '' ||
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['e_mail']) || $_POST['e_mail'] == '' ||
  !isset($_POST['TEL']) || $_POST['TEL'] == '' ||
  !isset($_POST['FAX']) || $_POST['FAX'] == '' 
) {
  exit('paramErrow');
};

$company_name = $_POST['company_name'];
$Department = $_POST['Department'];
$industry = $_POST['industry'];
$use_bim = $_POST['use_bim'];
$postal_code = $_POST['postal_code'];
$administrative_divisions = $_POST['administrative_divisions'];
$address = $_POST['address'];
$name = $_POST['name'];
$e_mail = $_POST['e_mail'];
$TEL = $_POST ['TEL'];
$FAX = $_POST['FAX'];
$comment = $_POST['comment'];

// 各種項目設定
$dbn ='mysql:dbname=卒業制作;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる

// SQL作成&実行
$sql = 'INSERT INTO Contact_form (id, company_name, Department, industry, use_bim, postal_code, administrative_divisions, address, name, e_mail, TEL, FAX, comment, created_at) VALUES (NULL,:company_name, :Department, :industry, :use_bim, :postal_code, :administrative_divisions, :address, :name, :e_mail, :TEL, :FAX, :comment, now());';

$stmt = $pdo->prepare($sql);

// 都道府県valueを変換
$japan = japan47($_POST['administrative_divisions']);
// var_dump($japan);
// exit();

// バインド変数を設定
$stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);
$stmt->bindValue(':Department', $Department, PDO::PARAM_STR);
$stmt->bindValue(':industry', $industry, PDO::PARAM_STR);
$stmt->bindValue(':use_bim', $use_bim, PDO::PARAM_STR);
$stmt->bindValue(':postal_code', $postal_code, PDO::PARAM_STR);
$stmt->bindValue(':administrative_divisions', $japan, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':e_mail', $e_mail, PDO::PARAM_STR);
$stmt->bindValue(':TEL', $TEL, PDO::PARAM_STR);
$stmt->bindValue(':FAX', $FAX, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理

header('Location:contactform_input.php');
exit();

?>