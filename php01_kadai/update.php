<?php

session_start();
require_once('funcs.php');
loginCheck();

//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//2. $id = $_POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
//1. POSTデータ取得
$name   = $_POST['nameA1'];
$mail  = $_POST['mailB1'];
$company_name    = $_POST['company_nameC1'];
$visit_date = $_POST['visit_dateD1'];
$score = $_POST['scoreE1'];
$id = $_POST['id'];
$img = '';

var_dump($_FILES);

// imgがある場合(macは書き込み権限を修正)
if (isset($_FILES['img']['name'])) {
    $file_name = $_SESSION['post']['file_name']= $_FILES['img']['name'];
    // 一時保存されているファイル内容を取得して、セッションに格納
    $image_data = $_SESSION['post']['image_data'] = file_get_contents($_FILES['img']['tmp_name']);

    // 一時保存されているファイルの種類を確認して、セッションにその種類に当てはまる特定のintを格納
    $image_type = $_SESSION['post']['image_type'] = exif_imagetype($_FILES['img']['tmp_name']);
} else {
    $image_data = $_SESSION['post']['image_data'] = '';
    $image_type = $_SESSION['post']['image_type'] = '';
};
  
//   var_dump($file_name);

 if (isset($_SESSION['post']['image_data']))  {
    // ファイル名に今日の日付をくっつける。
    $img = date('YmdHis') . '_' . $_SESSION['post']['file_name'];
    file_put_contents('./image/' . $img, $_SESSION['post']['image_data']);
  };
  
  var_dump($img);

//2. DB接続します
//*** function化する！  *****************
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_bm_table SET date = sysdate() , name = :name, mail = :mail, company_name = :company_name, visit_date = :visit_date, score = :score, meishi = :img  WHERE id = :id;');

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);
$stmt->bindValue(':visit_date', $visit_date, PDO::PARAM_STR);
$stmt->bindValue(':score', $score, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$stmt->bindValue(':img', $img, PDO::PARAM_STR);

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: read.php');
    exit();
}