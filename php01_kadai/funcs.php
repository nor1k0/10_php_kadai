<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。

function db_conn()
{
    try {
        $db_name = 'php_kadai';
        $db_id   = 'root';
        $db_pw   = ''; // MAMPは'root'
        $db_host = 'localhost';
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        // return $pdo;を忘れないように。 
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}

// ログインチェク処理 loginCheck()
function loginCheck()
{
if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
    // ログインがおかしい、偽物
    exit('LOGIN ERROR');
} else {
    // ログインok
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
}}
