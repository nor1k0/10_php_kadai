
<?php

session_start();
require_once('funcs.php');
loginCheck();

ini_set('display_errors', 0);

// セキュリティ クロスサイトスクリプティング
if (!function_exists("h")){
function h($str){
    return htmlspecialchars($str , ENT_QUOTES);
 }};


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

$meishi ='<img src="./image/' . $result['meishi'] .' " style="width: 150px;height: auto;"></a>';

$img_update = '<a href="detail.php?id=' . $result['id'] . '"><img src="./img/icon_111110_256.png"  style="width: 30px;height: auto;"></a>';
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
<th>$meishi</th>
<th>$img_update</th>
<th>$img_delete</th>
</tr>
";

}}

$message = $_SESSION['name'];
$message = htmlspecialchars($message);

?>
        <!-- <tr> 
        <th class="item1"><?= $view1 ?></th>
         <td class="item2"><?= $view2 ?></td>
         <td class="item2"><?= $view3 ?></td>
         <td class="item2"><?= $view4 ?></td>
         <td class="item2"><?= $view5 ?></td>
         <td class="item2"><?= $view6 ?></td>
</tr> -->


<html>

<head>
    <meta charset="utf-8">
    <title>営業進捗管理(登録確認)</title>
    <link rel="stylesheet" href="./style.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const linkConfirms = Array.prototype.slice.call(document.querySelectorAll('.link_confirm'));
    linkConfirms.forEach(function(linkConfirm) {
        linkConfirm.addEventListener('click', function(event) {
            const resultConfirm = confirm('データを削除します。よろしいですか？');
            if(!resultConfirm) {
                event.preventDefault();
            }
        });
    });
}, false);
    </script>
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

<!-- 表示件数の制限、データを先に読み込む、　SQL叩く回数を減らす -->
<!--　表示件数制限>受注角度ごとのSQLもたたく>ソートは表示/非表示 js display none -->


<table border="1">
<div class="excel" >
    <a class="icon_l">Excel風　営業進捗管理(一覧確認)</a>
    <a href="./kanri.php" class="icon_r2">ユーザー管理</a><br><br>
    <a href="./post.php"><img src="./img/icon_001052_256.png" class="icon"></a>
    <a href="./post.php"><img src="./img/icon_159142_256.png" class="icon"></a>
    <a href="./chart.php"><img src="./img/icon_000932_256.png" class="icon"></a>
    <a href="./logout.php"><img src="./img/ログアウト・サインアウトのアイコン素材 1.png" class="icon_r"></a>
    <a class="icon_r1"><?php echo $message;?></a>
</div>

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



<!--data.txtの際のコード 
            // ファイルを開く
        $openFile = fopen('./data/data.txt', 'r');
        echo "<table border = 1>";
        // ファイル内容を1行ずつ読み込んで出力
        // fgets($openFile)で、1行を読み込み、それを$strに代入
        // 何も読み込むものがなくなると、while文が終了する
        while ($str = fgets($openFile)) {
            $ary = explode(",", $str); //文字列を配列に変換
            echo '<tr>';
            for($i = 0; $i < sizeof($ary); $i++){
                echo "<td> {$ary[$i]} </td>";
            }
            echo '</tr>';


            // nl2br ... textファイルの改行を<br>に変換する関数
            // echo nl2br($str);
            // var_dump($ary);
        };
        fclose($openFile); -->

<!-- // 参考
// https://gray-code.com/php/make-the-board-vol5/

$current_date = null;
$data = null;
$file_handle = null;
$split_data = null;
$message = array();
$message_array = array();

if( $file_handle = fopen( './data/data.txt','r') ) {
    while( $data = fgets($file_handle) ){
        // 参考
        // https://www.vitoshacademy.com/php-reading-from-a-file-into-a-html-table/

        echo "<table border = 1>";
        $counter = 1;
        while(!feof($file_handle))
        {
            $split_data = preg_split( '/,/', $data);

            $message = array(
                'write_date' => $split_data[0],
                'name' => $split_data[1],
                'mail' => $split_data[2],
                'company_name' => $split_data[3],
                'visit_date' => $split_data[4],
                'score' => $split_data[5],
            );
    
            $line = fgets($file_handle);
            echo "<tr><td>$counter</td>";
            echo "<td>$split_data[0]</td>";
            echo "<td>$split_data[1]</td>";
            echo "<td>$split_data[2]</td>";
            echo "<td>$split_data[3]</td>";
            echo "<td>$split_data[4]</td>";
            echo "<td>$split_data[5]</td>";
            $counter++;
        };
            echo "</table>";

        }};

fclose($file_handle); -->