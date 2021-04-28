<?php

#単語チェック処理の関数用
require_once('../common/common.php');
$post = sanitaize($_POST);


$work = array();
$person = array();
$memo = array();

$work = array($post['workMON'] , $post['workTUE'],$post['workWED'],$post['workTHU'],$post['workFRI'],$post['workSAT'],$post['workSUN']);
$workarea = array("出社","在宅","その他","休日");
$person = array($post['personMON'] , $post['personTUE'],$post['personWED'],$post['personTHU'],$post['personFRI'],$post['personSAT'],$post['personSUN']);
$memo = array($post['memoMON'] , $post['memoTUE'],$post['memoWED'],$post['memoTHU'],$post['memoFRI'],$post['memoSAT'],$post['memoSUN']);
$company = array($post['companyMON'] , $post['companyTUE'],$post['companyWED'],$post['companyTHU'],$post['companyFRI'],$post['companySAT'],$post['companySUN']);
//var_dump($work);
print_r($work);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_yf.css">
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
        <?php
        $daylist = array ( "MON"=>1 ,"TUE"=>2,"WED"=>3,"THU"=>4,"FRI"=>5,"SAT"=>6,"SUN"=>7);
        $weeklist = array("MON","TUE","WED","THU","FRI","SAT","SUN");
        $cou = 0;
        foreach($weeklist as $value){ ?>
            <?php 
            //print $cou;
            $registarea = $work[$cou];
            print $registarea;
            ?>
            <tr>
                <td id = "date<?=$value?>">week</td>
                <td><?=$value?></td>
            <td><?=$workarea[$registarea-1] ?></td>
            <td><?=$company[$cou]?></td>
            <td><?=$person[$cou]?></td>
            <td><?=$memo[$cou]?></td>
            </tr>
            <?php $cou +=1; }?>

    </table>

    <div class = "bottombutton">
        <input type="submit" value ="先週" class = "regist">
        <form action="demotop.html">
            <input type="submit" value ="登録" class = "regist" id ="reg_check">
        </form>
        <button type="button" onclick="history.back()">戻る</button>
        <!--
            <button type="button" onclick="history.back()">戻る</button> 
        -->
        <input type="submit" value ="次週" class = "regist"　>
    </div>
    
</div>
</body>
</html>