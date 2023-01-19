
<?php
ini_set('display_errors', 0);

// セキュリティ クロスサイトスクリプティング
function h($str){
    return htmlspecialchars($str , ENT_QUOTES);
 };

//1.  DB接続します
//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=php_kadai;charset=utf8;host=localhost', 'root', '');
  } catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
  }
  
  //２．データ取得SQL作成
  
  
  // where のなかにselectboxの選択を定義したものを入れ言え
  
  $stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE mail LIKE '%@%';");
  $status = $stmt->execute();
  
  
  //３．データ表示
  
  if ($status==false) {
      //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
  
  }else{
    // elseの中はSQLが成功した場合
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php


    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

    
$date= $result['date'];
$name = $result['name'];
$mail = $result['mail'];
$company_name = $result['company_name'];
$visit_date = $result['visit_date'];
$score = $result['score'];
$img_update = '<a href="detail.php?id=' . $result['id'] . '"><img src="./img/icon_111110_256.png" style="width: 30px;height: auto;"></a>';
// $img_delete = '<a href="delete.php?id=' . $result['id'] . '"><img src="./img/icon_119860_256.png" style="width: 30px;height: auto;"></a>';
$img_delete ='<a href="delete.php?id=' . $result['id']. '" target="_blank" class="link_confirm"><img src="./img/icon_119860_256.png" style="width: 30px;height: auto;"></a>';

$view.="
<tr>
<th>$date</th>
<th>$name</th> 
<th>$mail</th>
<th>$company_name</th>
<th>$visit_date</th>
<th>$score</th>
</tr>
";

}}
?>


<html>

<head>
    <meta charset="utf-8">
    <title>営業進捗管理(ログイン)</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<div class="scroll_all">
</form>
<form name="form1" action="login_act.php" method="post">
<p id="scroll1">ログイン(追加・編集・削除)</p>
        ID:<input type="text" name="lid" /><br>
        PW:<input type="password" name="lpw" /><br>
        <input type="submit" value="LOGIN" />
 </form>
</div>

<table border="1">
<div class="excel" >
    <p>Excel風　営業進捗管理(ログイン)</p>
    
<tr class="header">
          <th class="item2">記入日</th>
          <th class="item2">担当者名</th>
          <th class="item2">メールアドレス</th>
          <th class="item2">会社名</th>
          <th class="item2">訪問日</th>
          <th class="item2">商談確度</th>
</tr>

<div><?= $view ?></div>


</table>
</body>

</html>
