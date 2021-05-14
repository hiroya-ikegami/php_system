<?php
require_once("../common/common.php");
$post = sanitaize($_POST);

$title = $post["title"];
//カレンダー
$calendar = $post["calendar"];
$start_time = $post["start_time"];
$end_time = $post["end_time"];
$content =$post["content"];
$member = $post["member"];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_zf.css">
    <title>Document</title>
</head>
<body>
    <div class ="h1id" ><h1>zoom予約確認</h1><br></div>
    <!--
    <header><div><h1>zoom予定入力フォーム</h1></div></header>
    -->
    <div class = "cform">
        <div inner>
        <form action="schedulezoom_done.php" method ="post">
            <span>タイトル:</span><span><?=$title?></span><br>
            <br>
            <span>日付:</span><span><?=$calendar?></span><br>
            <br>
            <span>時間:</span><span><?=$start_time?></span>~<span><?=$end_time?></span><br>
            <br>
            <span>説明</span><br>
            <span><?=$content?></span><br>
            <br>
            <span>参加者</span><br>
            <span><?=$member?></span><br>
            <br>
            <input type="hidden" name = "title" value ="<?=$title?>">
            <input type="hidden" name = "calendar" value ="<?=$calendar?>">
            <input type="hidden" name = "start_time" value ="<?=$start_time?>">
            <input type="hidden" name = "end_time" value ="<?=$end_time?>">
            <input type="hidden" name = "content" value ="<?=$content?>">
            <input type="hidden" name = "member" value ="<?=$member?>">
            <input type="submit" value ="登録" class = "regist">
        </form>
        </div>
    </div>
    <form action="schedule_form.html">
        <input type="submit" value="トップに戻る"class = "top">
        <?php
        ?>
    </form>
</body>
</html>