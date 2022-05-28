<?php

// DBを繋ぐ
// var_dump($_GET);
// exit();
include('function.php');
$pdo = connect_to_db();

// ID受け取り
$id = $_GET['id'];

// var_dump($_GET);
// exit();

// SQL作成&実行
$sql = 'SELECT * FROM Contact_form WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);



try {
  $status = $stmt->execute();
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  // var_dump($record);
  // exit();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// 都道府県名を数値に変える変数
$chang_japan = chang_japan47($record['administrative_divisions']);
// var_dump($chang_japan);
// exit();

// javascriptに値を送るためjson_encodeを行う
$js_chang_japan = json_encode($chang_japan);
// var_dump($js_chang_japan);
// exit();

// 都道府県判定
// if (preg_match("/$chang_japan/", $record['adminst']))


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="contactform_edit.css">
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>ユーザー編集画面</title>
</head>

<body>
  <form action="contactform_update.php" method="POST">
    <legend>ユーザー編集画面</legend>
    <a href="contactform_read.php">一覧画面</a>
    <div class="main_content">
      <div class="contact_box">
        <label for="company_name">会社名:</label><input type="text" id="company_name" name="company_name" value="<?= $record['company_name'] ?>">
        <label for="Department">所属部署:</label><input type="text" id="Department" name="Department" value="<?= $record['Department'] ?>">
        <label for=" industry">業種:</label><input type="text" id="industry" name="industry" value="<?= $record['industry'] ?>">
        <label for=" use_bim">使用中の建築ソフト:</label><input type="text" id="use_bim" name="use_bim" value="<?= $record['use_bim'] ?>">
        <div class=" h-adr">
          <span class="p-country-name" style="display:none;">Japan</span>
          <label for="postal_code">郵便番号:</label><br>〒<input type="text" class="p-postal-code" id="postal_code" name="postal_code" size="8" maxlength="8" value="<?= $record['postal_code'] ?>"><br>
          <label for="administrative_divisions">都道府県:</label><br><select id="administrative_divisions" name="administrative_divisions" class="p-region-id" >
            <option value="">--</option>
            <option value="1">北海道</option>
            <option value="2">青森県</option>
            <option value="3">岩手県</option>
            <option value="4">宮城県</option>
            <option value="5">秋田県</option>
            <option value="6">山形県</option>
            <option value="7">福島県</option>
            <option value="8">茨城県</option>
            <option value="9">栃木県</option>
            <option value="10">群馬県</option>
            <option value="11">埼玉県</option>
            <option value="12">千葉県</option>
            <option value="13">東京都</option>
            <option value="14">神奈川県</option>
            <option value="15">新潟県</option>
            <option value="16">富山県</option>
            <option value="17">石川県</option>
            <option value="18">福井県</option>
            <option value="19">山梨県</option>
            <option value="20">長野県</option>
            <option value="21">岐阜県</option>
            <option value="22">静岡県</option>
            <option value="23">愛知県</option>
            <option value="24">三重県</option>
            <option value="25">滋賀県</option>
            <option value="26">京都府</option>
            <option value="27">大阪府</option>
            <option value="28">兵庫県</option>
            <option value="29">奈良県</option>
            <option value="30">和歌山県</option>
            <option value="31">鳥取県</option>
            <option value="32">島根県</option>
            <option value="33">岡山県</option>
            <option value="34">広島県</option>
            <option value="35">山口県</option>
            <option value="36">徳島県</option>
            <option value="37">香川県</option>
            <option value="38">愛媛県</option>
            <option value="39">高知県</option>
            <option value="40">福岡県</option>
            <option value="41">佐賀県</option>
            <option value="42">長崎県</option>
            <option value="43">熊本県</option>
            <option value="44">大分県</option>
            <option value="45">宮崎県</option>
            <option value="46">鹿児島県</option>
            <option value="47">沖縄県</option>
          </select><br>
          <label for="address">住所:<br></label><input type="text" id="address" name="address" class="p-locality p-street-address p-extended-address" value="<?= $record['address'] ?>" />
        </div>
        <label for="name">お名前:</label><input type="text" id="name" name="name" value="<?= $record['name'] ?>">
        <label for="e_mail">Email:</label><input type="email" id="e_mail" name="e_mail" value="<?= $record['e_mail'] ?>">
        <label for="TEL">TEL(半角英数字):</label><input type="text" id="TEL" name="TEL" value="<?= $record['TEL'] ?>">
        <label for="FAX">FAX(半角英数字):</label><input type="text" id="FAX" name="FAX" value="<?= $record['FAX'] ?>">
        <label for="comment">ご要望欄</label><textarea name="comment" id="comment" cols="30" rows="10"><?= $record['comment'] ?></textarea>
        <div>
          <input type="hidden" name="id" value="<?= $record['id'] ?>">
        </div>
        <div>
          <button>編集する</button>
        </div>
      </div>
  </form>
  <script>
    /*  外部スクリプトへ値を渡すA */
    var japan_select = JSON.parse('<?php echo $js_chang_japan; ?>');
  </script>
  <!-- 外部のjavascriptを読み込んでいく -->
  <script src="contactform_edit.js"></script>

</body>

</html>