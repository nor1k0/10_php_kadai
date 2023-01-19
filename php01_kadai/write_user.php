<?php

session_start();
require_once('funcs.php');
loginCheck();

//1. POSTデータ取得

$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flag = "1";
$life_flag = "0";

// もし、どちらかが空白だったらredirect関数でindexに戻す。その際、URLパラメーターでerrorを渡す。
if (trim($lid) === '' || trim($lpw) === '') {
  redirect('kanri.php?error');
};

$hashed_pw = password_hash($lpw, PASSWORD_DEFAULT);

//2.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成

// 1. SQL文を用意　1行目
$stmt = $pdo->prepare("INSERT INTO
                      gs_bm_user_table(id, name, lid, lpw, kanri_flg, life_flg)
                      VALUES(NULL, :name, :lid, :lpw, :kanri_flag, :life_flag)");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
// bindはセキュリティ処理
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $hashed_pw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flag', $kanri_flag, PDO::PARAM_INT);
$stmt->bindValue(':life_flag', $life_flag, PDO::PARAM_INT);
//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: kanri.php');
}

?>

<!-- 登録/削除時に読みページを挟まないシングルページは改善の余地あり-->