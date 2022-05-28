<?php
// var_dump($_POST['administrative_divisions']);
// exit();
// var_dump($_POST);
// exit();
include('function.php');

// 必死入力項目取れているかのチェック
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
$TEL = $_POST['TEL'];
$FAX = $_POST['FAX'];
$comment = $_POST['comment'];
$id = $_POST['id'];

// DB接続
$pdo = connect_to_db();

/* -------------------------SQL作成及び実行----------------------------- */
$sql = 'UPDATE Contact_form SET company_name=:company_name, Department=:Department, industry=:industry, use_bim=:use_bim, postal_code=:postal_code, administrative_divisions=:administrative_divisions, address =:address, name = :name, e_mail = :e_mail, TEL = :TEL, FAX = :FAX, comment = :comment WHERE id = :id';

$stmt = $pdo->prepare($sql);

// 数字を都道府県名に変える
$japan = japan47($_POST['administrative_divisions']);

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
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:contactform_read.php");
exit();

?>