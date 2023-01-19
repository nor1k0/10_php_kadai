<?php

session_start();
require_once('funcs.php');
loginCheck();

//1. POSTデータ取得

$nameA1 = $_POST['nameA1'];
$nameA2 = $_POST['nameA2'];
$nameA3 = $_POST['nameA3'];
$nameA4 = $_POST['nameA4'];
$nameA5 = $_POST['nameA5'];
// $img = '';


$mailB1 = $_POST['mailB1'];
$mailB2 = $_POST['mailB2'];
$mailB3 = $_POST['mailB3'];
$mailB4 = $_POST['mailB4'];
$mailB5 = $_POST['mailB5'];

$company_nameC1 = $_POST['company_nameC1'];
$company_nameC2 = $_POST['company_nameC2'];
$company_nameC3 = $_POST['company_nameC3'];
$company_nameC4 = $_POST['company_nameC4'];
$company_nameC5 = $_POST['company_nameC5'];

$visit_dateD1 = $_POST['visit_dateD1'];
$visit_dateD2 = $_POST['visit_dateD2'];
$visit_dateD3 = $_POST['visit_dateD3'];
$visit_dateD4 = $_POST['visit_dateD4'];
$visit_dateD5 = $_POST['visit_dateD5'];

$scoreE1 = $_POST['scoreE1'];
$scoreE2 = $_POST['scoreE2'];
$scoreE3 = $_POST['scoreE3'];
$scoreE4 = $_POST['scoreE4'];
$scoreE5 = $_POST['scoreE5'];

ini_set('date.timezone', 'Asia/Tokyo');
$time = date('Y-m-d');

// 簡単なバリデーション処理追加。
// もし、どちらかが空白だったらredirect関数でindexに戻す。その際、URLパラメーターでerrorを渡す。
if (trim($mailB1) === '' ) {
  redirect('post.php?error');
};

//2. DB接続します
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=php_kadai;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意　1行目
$stmt = $pdo->prepare("INSERT INTO
                      gs_bm_table(id, date, name, mail, company_name, visit_date, score , meishi)
                      VALUES(NULL, sysdate(), :nameA1, :mailB1, :company_nameC1, :visit_dateD1, :scoreE1, :img)");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
// bindはセキュリティ処理
$stmt->bindValue(':nameA1', $nameA1, PDO::PARAM_STR);
$stmt->bindValue(':mailB1', $mailB1, PDO::PARAM_STR);
$stmt->bindValue(':company_nameC1', $company_nameC1, PDO::PARAM_STR);
$stmt->bindValue(':visit_dateD1', $visit_dateD1, PDO::PARAM_STR);
$stmt->bindValue(':scoreE1', $scoreE1, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  //５．index.phpへリダイレクト
   header('Location: read.php');
}

// 1. SQL文を用意　2行目
$stmt = $pdo->prepare("INSERT INTO
gs_bm_table(id, date, name, mail, company_name, visit_date, score)
VALUES(NULL, sysdate(), :nameA2, :mailB2, :company_nameC2, :visit_dateD2, :scoreE2)");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
// bindはセキュリティ処理
$stmt->bindValue(':nameA2', $nameA2, PDO::PARAM_STR);
$stmt->bindValue(':mailB2', $mailB2, PDO::PARAM_STR);
$stmt->bindValue(':company_nameC2', $company_nameC2, PDO::PARAM_STR);
$stmt->bindValue(':visit_dateD2', $visit_dateD2, PDO::PARAM_STR);
$stmt->bindValue(':scoreE2', $scoreE2, PDO::PARAM_STR);
//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  //５．index.phpへリダイレクト
  // header('Location: read.php');
}

// 1. SQL文を用意　3行目
$stmt = $pdo->prepare("INSERT INTO
gs_bm_table(id, date, name, mail, company_name, visit_date, score)
VALUES(NULL, sysdate(), :nameA3, :mailB3, :company_nameC3, :visit_dateD3, :scoreE3)");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
// bindはセキュリティ処理
$stmt->bindValue(':nameA3', $nameA3, PDO::PARAM_STR);
$stmt->bindValue(':mailB3', $mailB3, PDO::PARAM_STR);
$stmt->bindValue(':company_nameC3', $company_nameC3, PDO::PARAM_STR);
$stmt->bindValue(':visit_dateD3', $visit_dateD3, PDO::PARAM_STR);
$stmt->bindValue(':scoreE3', $scoreE3, PDO::PARAM_STR);
//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: read.php');
}

// 1. SQL文を用意　4行目
$stmt = $pdo->prepare("INSERT INTO
gs_bm_table(id, date, name, mail, company_name, visit_date, score)
VALUES(NULL, sysdate(), :nameA4, :mailB4, :company_nameC4, :visit_dateD4, :scoreE4)");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
// bindはセキュリティ処理
$stmt->bindValue(':nameA4', $nameA4, PDO::PARAM_STR);
$stmt->bindValue(':mailB4', $mailB4, PDO::PARAM_STR);
$stmt->bindValue(':company_nameC4', $company_nameC4, PDO::PARAM_STR);
$stmt->bindValue(':visit_dateD4', $visit_dateD4, PDO::PARAM_STR);
$stmt->bindValue(':scoreE4', $scoreE4, PDO::PARAM_STR);
//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: read.php');
}

// 1. SQL文を用意　5行目
$stmt = $pdo->prepare("INSERT INTO
gs_bm_table(id, date, name, mail, company_name, visit_date, score)
VALUES(NULL, sysdate(), :nameA5, :mailB5, :company_nameC5, :visit_dateD5, :scoreE5)");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
// bindはセキュリティ処理
$stmt->bindValue(':nameA5', $nameA5, PDO::PARAM_STR);
$stmt->bindValue(':mailB5', $mailB5, PDO::PARAM_STR);
$stmt->bindValue(':company_nameC5', $company_nameC5, PDO::PARAM_STR);
$stmt->bindValue(':visit_dateD5', $visit_dateD5, PDO::PARAM_STR);
$stmt->bindValue(':scoreE5', $scoreE5, PDO::PARAM_STR);
//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: read.php');
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>営業進捗管理(登録確認)</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<table>
<div class="excel" >
<p>Excel風　営業進捗管理(登録確認)　-->　以下の内容を登録しました。</p>
<a href="./post.php"><img src="./img/icon_159142_256.png" class="icon"></a>
<a href="./read.php"><img src="./img/icon_108192_256.png" class="icon"></a>

        </div>
<tr class="header">
          <th class="item1"> </th>
          <th class="item2">担当者名</th>
          <th class="item2">メールアドレス</th>
          <th class="item2">会社名</th>
          <th class="item2">訪問日</th>
          <th class="item2">商談確度</th>
        </tr>
        <tr>
          <td class="item1">1</td>
          <td class="value1" id="A1" contenteditable=true><?= ($nameA1) ?></td>
          <td class="value1" id="A2" contenteditable=true><?= ($mailB1) ?></td>
          <td class="value1" id="A3" contenteditable=true><?= ($company_nameC1) ?></td>
          <td class="value1" id="A4" contenteditable=true><?= ($visit_dateD1) ?></td>
          <td class="value1" id="A5" contenteditable=true><?= ($scoreE1) ?></td>
        </tr>

        <tr>
          <td class="item1">2</td>
          <td class="value1" id="A1" contenteditable=true><?= ($nameA2) ?></td>
          <td class="value1" id="A2" contenteditable=true><?= ($mailB2) ?></td>
          <td class="value1" id="A3" contenteditable=true><?= ($company_nameC2) ?></td>
          <td class="value1" id="A4" contenteditable=true><?= ($visit_dateD2) ?></td>
          <td class="value1" id="A5" contenteditable=true><?= ($scoreE2) ?></td>
        </tr>

        <tr>
          <td class="item1">3</td>
          <td class="value1" id="A1" contenteditable=true><?= ($nameA3) ?></td>
          <td class="value1" id="A2" contenteditable=true><?= ($mailB3) ?></td>
          <td class="value1" id="A3" contenteditable=true><?= ($company_nameC3) ?></td>
          <td class="value1" id="A4" contenteditable=true><?= ($visit_dateD3) ?></td>
          <td class="value1" id="A5" contenteditable=true><?= ($scoreE3) ?></td>
        </tr>

        <tr>
          <td class="item1">4</td>
          <td class="value1" id="A1" contenteditable=true><?= ($nameA4) ?></td>
          <td class="value1" id="A2" contenteditable=true><?= ($mailB4) ?></td>
          <td class="value1" id="A3" contenteditable=true><?= ($company_nameC4) ?></td>
          <td class="value1" id="A4" contenteditable=true><?= ($visit_dateD4) ?></td>
          <td class="value1" id="A5" contenteditable=true><?= ($scoreE4) ?></td>
        </tr>

        <tr>
          <td class="item1">5</td>
          <td class="value1" id="A1" contenteditable=true><?= ($nameA5) ?></td>
          <td class="value1" id="A2" contenteditable=true><?= ($mailB5) ?></td>
          <td class="value1" id="A3" contenteditable=true><?= ($company_nameC5) ?></td>
          <td class="value1" id="A4" contenteditable=true><?= ($visit_dateD5) ?></td>
          <td class="value1" id="A5" contenteditable=true><?= ($scoreE5) ?></td>
        </tr>
        
        </table>
        </form>
</body>

</html>