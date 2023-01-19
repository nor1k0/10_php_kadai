<!-- kanri_flg=０が 論理削除状態とする-->
<?php

$id = $_GET['id'];
$kanri_flg = "0";

var_dump($id);

require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare('UPDATE gs_bm_user_table SET kanri_flg = 0 WHERE id = :id;');

$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意

$status = $stmt->execute(); //実行


//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: kanri.php');
    exit();
}