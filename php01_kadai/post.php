
<?php
session_start();
require_once('funcs.php');
loginCheck();

// セキュリティ クロスサイトスクリプティング

if (!function_exists("h")){
  function h($str){
      return htmlspecialchars($str , ENT_QUOTES);
   }};

   $message = $_SESSION['name'];
$message = htmlspecialchars($message);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>営業進捗管理(登録)</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <form action="write.php" method="post" enctype="multipart/form-data">
    <table>
        <div class="excel" >
            <a>Excel風　営業進捗管理(登録)</a>
               <a href="./kanri.php" class="icon_r2">ユーザー管理</a><br><br>
            <input type="image" name="btn_save" src="./img/icon_save.png" alt="送信" value="送信" class="icon">
            <a href="./read.php"><img src="./img/icon_111112_256.png" class="icon"></a>
            <a href="./read.php"><img src="./img/icon_119862_256.png" class="icon"></a>
            <a href="./read.php"><img src="./img/icon_001492_256.png" class="icon"></a>
            <a href="./chart.php"><img src="./img/icon_000932_256.png" class="icon"></a>
            <a href="./logout.php"><img src="./img/ログアウト・サインアウトのアイコン素材 1.png" class="icon_r"></a>
            <a class="icon_r1"><?php echo $message;?></a>
            
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
          <td class="value1" id="A1" contenteditable=true><input type="text"  name="nameA1" class="cell"></td>
          <td class="value1" id="A2" contenteditable=true><input type="email"  name="mailB1" class="cell"></td>
          <td class="value1" id="A3" contenteditable=true><input type="text"  name="company_nameC1" class="cell"></td>
          <td class="value1" id="A4" contenteditable=true><input type="date"  name="visit_dateD1" class="cell"></td>
          <td class="value1" id="A5" contenteditable=true><select type="text" name="scoreE1" class="cell">
<option>S：受注</option>
<option>A：受注確度80%</option>
<option>B：受注確度50%</option>
<option>C：受注確度30%</option>
<option>X：ロスト</option>
</select></td>
       </tr>
        <tr>
          <td class="item1">2</td>
          <td class="value1" id="A1" contenteditable=true><input type="text"  name="nameA2" class="cell"></td>
          <td class="value1" id="A2" contenteditable=true><input type="email"  name="mailB2" class="cell"></td>
          <td class="value1" id="A3" contenteditable=true><input type="text"  name="company_nameC2" class="cell"></td>
          <td class="value1" id="A4" contenteditable=true><input type="date"  name="visit_dateD2" class="cell"></td>
          <td class="value1" id="A5" contenteditable=true><select type="text" name="scoreE2" class="cell">
<option>S：受注</option>
<option>A：受注確度80%</option>
<option>B：受注確度50%</option>
<option>C：受注確度30%</option>
<option>X：ロスト</option>
</select></td>
        </tr>

        <tr>
          <td class="item1">3</td>
          <td class="value1" id="A1" contenteditable=true><input type="text"  name="nameA3" class="cell"></td>
          <td class="value1" id="A2" contenteditable=true><input type="email"  name="mailB3" class="cell"></td>
          <td class="value1" id="A3" contenteditable=true><input type="text"  name="company_nameC3" class="cell"></td>
          <td class="value1" id="A4" contenteditable=true><input type="date"  name="visit_dateD3" class="cell"></td>
          <td class="value1" id="A5" contenteditable=true><select type="text" name="scoreE3" class="cell">
<option>S：受注</option>
<option>A：受注確度80%</option>
<option>B：受注確度50%</option>
<option>C：受注確度30%</option>
<option>X：ロスト</option>
</select></td>
        </tr>

        <tr>
          <td class="item1">4</td>
          <td class="value1" id="A1" contenteditable=true><input type="text"  name="nameA4" class="cell"></td>
          <td class="value1" id="A2" contenteditable=true><input type="email"  name="mailB4" class="cell"></td>
          <td class="value1" id="A3" contenteditable=true><input type="text"  name="company_nameC4" class="cell"></td>
          <td class="value1" id="A4" contenteditable=true><input type="date"  name="visit_dateD4" class="cell"></td>
          <td class="value1" id="A5" contenteditable=true><select type="text" name="scoreE4" class="cell">
<option>S：受注</option>
<option>A：受注確度80%</option>
<option>B：受注確度50%</option>
<option>C：受注確度30%</option>
<option>X：ロスト</option>
</select></td>
        </tr>

        <tr>
          <td class="item1">5</td>
          <td class="value1" id="A1" contenteditable=true><input type="text"  name="nameA5" class="cell"></td>
          <td class="value1" id="A2" contenteditable=true><input type="email"  name="mailB5" class="cell"></td>
          <td class="value1" id="A3" contenteditable=true><input type="text"  name="company_nameC5" class="cell"></td>
          <td class="value1" id="A4" contenteditable=true><input type="date"  name="visit_dateD5" class="cell"></td>
          <td class="value1" id="A5" contenteditable=true><select type="text" name="scoreE5" class="cell">
<option>S：受注</option>
<option>A：受注確度80%</option>
<option>B：受注確度50%</option>
<option>C：受注確度30%</option>
<option>X：ロスト</option>
</select></td>
        </tr>

        </table>
        </form>
</body>
</html>