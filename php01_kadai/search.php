
<?php
session_start();
require_once('funcs.php');
loginCheck();

ini_set('display_errors', 0);
$score = $_POST['score'];

//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

  //２．データ取得SQL作成
  
  
  // where のなかにselectboxの選択を定義したものを入れ言え
  
  $stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE  score = :score');
  $stmt->bindValue(':score', $score, PDO::PARAM_STR);
  $status = $stmt->execute();

  if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $date= $result['date'];
$name = $result['name'];
$mail = $result['mail'];
$company_name = $result['company_name'];
$visit_date = $result['visit_date'];
$score = $result['score'];
$meishi ='<img src="./image/' . $result['meishi'] .' " style="width: 150px;height: auto;"></a>';
$img_update = '<a href="detail.php?id=' . $result['id'] . '"><img src="./img/icon_111110_256.png" style="width: 30px;height: auto;"></a>';
$img_delete = '<a href="delete.php?id=' . $result['id'] . '"><img src="./img/icon_119860_256.png" style="width: 30px;height: auto;"></a>';

$view.="
<tr>
<th>$date</th>
<th>$name</th> 
<th>$mail</th>
<th>$company_name</th>
<th>$visit_date</th>
<th>$score</th>
<th>$meishi</th>
<th>$img_update</th>
<th>$img_delete</th>
</tr>
";

}}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>営業進捗管理(登録確認)</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<div class="scroll_all">
            <p id="scroll1">受注確度</p>
            <form action="search.php" method="POST">
            <select type="text" name="score">
<option>S：受注</option>
<option>A：受注確度80%</option>
<option>B：受注確度50%</option>
<option>C：受注確度30%</option>
<option>X：ロスト</option>
</select>
<button type="submit" value="検索">検索</button>
</form>
</div>

<table border="1">
<div class="excel" >
    <p>Excel風　営業進捗管理(一覧確認)</p>
    <a href="./post.php"><img src="./img/icon_001052_256.png" class="icon"></a>
    <a href="./write.php"><img src="./img/icon_159142_256.png" class="icon"></a>
    <a href="./chart.php"><img src="./img/icon_000932_256.png" class="icon"></a>


<tr class="header">
          <th class="item2">記入日</th>
          <th class="item2">担当者名</th>
          <th class="item2">メールアドレス</th>
          <th class="item2">会社名</th>
          <th class="item2">訪問日</th>
          <th class="item2">商談確度</th>
          <th class="item2">名刺</th>
          <th class="item2">編集<br>(名刺追加)</th>
          <th class="item2">削除</th>
</tr>

<div><?= $view ?></div>

</table>
</body>

</html>