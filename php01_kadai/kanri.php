<?php

ini_set('display_errors', 1);

session_start();
require_once('funcs.php');
require_once('common/head_parts.php');
loginCheck();


if (!function_exists("h")){
    function h($str){
        return htmlspecialchars($str , ENT_QUOTES);
     }};

     $message = $_SESSION['name'];
     $message = htmlspecialchars($message);

//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_user_table WHERE kanri_flg = 1;");
$status = $stmt->execute();

 //３．データ表示
  
 if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{ while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    $name = $result['name'];
    $lid = $result['lid'];
    $img_delete ='<a href="delete_user.php?id=' . $result['id']. '" target="_blank" class="link_confirm"><img src="./img/icon_119860_256.png" style="width: 30px;height: auto;"></a>'; 

    $view.="
    <tr>
    <th>$name</th> 
    <th>$lid</th>
    <th>$img_delete</th>
    </tr>
    ";
    
    }}
    

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?= head_parts('ユーザー管理') ?>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href=style.css />
    <title>ユーザー管理</title>
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
<div class="excel" >
<a class="icon_l">Excel風　営業進捗管理(ユーザー管理)</a>
    <a class="icon_r2" href="./kanri.php">ユーザー管理</a><br><br>
    <a href="./post.php"><img src="./img/icon_001052_256.png" class="icon"></a>
    <a href="./post.php"><img src="./img/icon_159142_256.png" class="icon"></a>
    <a href="./chart.php"><img src="./img/icon_000932_256.png" class="icon"></a>
    <a href="./logout.php"><img src="./img/ログアウト・サインアウトのアイコン素材 1.png" class="icon_r"></a>
    <a class="icon_r1"><?php echo $message;?></a>
</div>

<?php if (isset($_GET['error'])): ?>
    <p class="validation">ID/パスワードを入力してください。</p>
<?php endif ?>

    <form name="form2" action="write_user.php" method="post" class="userplus">
    ユーザー名:<input type="text" name="name" />
    ID:<input type="text" name="lid" />
    パスワード:<input type="password" name="lpw" />
        <input type="submit" value="登録" />
    </form>

    <form method="POST" action="delete_user.php">
    <table border="1">
    <tr class="header">
    <th class="item2">ユーザ名</th>
          <th class="item2">ID</th>
          <th class="item2" >アカウント削除</th>
</tr>
    <div><?= $view ?></div>
    </table>
    </form>

</body>

</html>