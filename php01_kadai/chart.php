
<?php
session_start();
require_once('funcs.php');
loginCheck();

ini_set('display_errors', 1);

//1.  DB接続します
//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();
  
  //２．データ取得SQL作成
  
  
  // where のなかにselectboxの選択を定義したものを入れ言え
  
//   S：受注
  $stmtS = $pdo->prepare("SELECT COUNT(score) FROM gs_bm_table WHERE score = 'S：受注'");
  $stmtS->execute();
  $countS = $stmtS->fetchColumn();
//   参考：https://wbscustom.com/archives/306

 //   A：受注確度80%
 $stmtA = $pdo->prepare("SELECT COUNT(score) FROM gs_bm_table WHERE score = 'A：受注確度80%'");
 $stmtA->execute();
 $countA = $stmtA->fetchColumn();

 //   B：受注確度50%
 $stmtB = $pdo->prepare("SELECT COUNT(score) FROM gs_bm_table WHERE score = 'B：受注確度50%'");
 $stmtB->execute();
 $countB = $stmtB->fetchColumn();

 //   C：受注確度30%
 $stmtC = $pdo->prepare("SELECT COUNT(score) FROM gs_bm_table WHERE score = 'C：受注確度30%'");
 $stmtC->execute();
 $countC = $stmtC->fetchColumn();

 //   X：ロスト
 $stmtX = $pdo->prepare("SELECT COUNT(score) FROM gs_bm_table WHERE score = 'X：ロスト'");
 $stmtX->execute();
 $countX = $stmtX->fetchColumn();

// 月ごとに抽出したい
//  $stmtM = $pdo->prepare(" SELECT DATE_FORMAT(date, '%Y-%m') as 'month', COUNT(date) as count FROM gs_bm_table GROUP BY DATE_FORMAT(date, '%Y%m');");
//  $stmtM->execute();
//  $stmtM->mysql_fetch_object();
//  var_dump($stmtM);

$message = $_SESSION['name'];
$message = htmlspecialchars($message);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>営業進捗管理(グラフ)</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- 参考： https://www.tohoho-web.com/ex/chartjs.html-->
</head>
<body>

<div class="excel" >
    <a>Excel風　営業進捗管理(グラフ)</a>
    <a href="./kanri.php" class="icon_r2">ユーザー管理</a><br><br>
    <a href="./write.php"><img src="./img/icon_159142_256.png" class="icon"></a>
    <a href="./post.php"><img src="./img/icon_001052_256.png" class="icon"></a>
    <a href="./read.php"><img src="./img/icon_111112_256.png" class="icon"></a>
            <a href="./read.php"><img src="./img/icon_119862_256.png" class="icon"></a>
    <a href="./read.php"><img src="./img/icon_001492_256.png" class="icon"></a>
    <a href="./logout.php"><img src="./img/ログアウト・サインアウトのアイコン素材 1.png" class="icon_r"></a>
    <a class="icon_r1"><?php echo $message;?></a>
</div>

<div style="width:400px">
<p class="chart_title">受注確度</p>
<canvas id="chart" style="width:100px">
  Canvas not supported...
</canvas>    
</div>

<script type="module">

var ctx = document.getElementById('chart');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['S', 'A', 'B', 'C', 'X'],
    datasets: [{
      data: [<?= $countS ?>, <?= $countA ?>, <?= $countB ?>, <?= $countC ?>, <?= $countX ?>],
      backgroundColor: ['#ff6347', '#ffc0cb', '#3cb371','#b0c4de','#4682b4'],
      weight: 10,
    }],
  },
});

</script>
</body>
</html>
