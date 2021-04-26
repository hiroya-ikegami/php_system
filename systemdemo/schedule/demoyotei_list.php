<?php

#単語チェック処理の関数用
require_once('./common/common.php');
$post = sanitaize($_POST);


$work1 = $post['work1'];

$memo1 = $post['memo1'];

if(isset($post['schedule1'])){
    print $post['schedule1'];
}
else{
    print $p_schedule1 = "個人予定未定";
}
print $work1; 
//print $p_schedule ;
print $memo1;


$workarea = array(
    1 => "出社", 2 => "在宅" ,3 => "その他", 4 => "有休・代休等"
);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_yf.css">
    <title>demo</title>
</head>
<body>
    <div id = "divall_list">
        <form action="demotop.html">
        <input type="submit" value="トップに戻る"class = "top">
    
    <h1>予定確認画面　?月</h1>
    <table>
        <thead>
        <tr><th>日</th><th>曜日</th><th>勤務場所</th><th >社内予定</th><th class="leftpadding">個人予定</th><th class = "leftpadding">メモ</th></tr>
        </thead>
    
        <tr><td>1</td>
        <td>THU</td>
        <td ><span class = "del">
            <?php print $workarea[$work1] ;?>
            </span>
        </td>
        <td ><?php //社内予定は別に取得 ?></td>
        <td><?php print $p_schedule1;?></td>
        <td><?php print $memo1 ;?></td></tr>
    </table>

    <div class = "bottombutton">
        <input type="submit" value ="3月へ" class = "regist">
        <form action="demotop.html">
            <input type="submit" value ="登録" class = "regist" id ="reg_check">
        </form>
        <button type="button" onclick="history.back()">戻る</button>
        <!--
            <button type="button" onclick="history.back()">戻る</button> 
        -->
        <input type="submit" value ="5月へ" class = "regist"　>
    </div>
    
</div>
</body>
</html>