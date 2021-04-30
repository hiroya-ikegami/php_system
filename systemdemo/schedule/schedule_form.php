<?php 
$ym = (isset($get))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_yf.css">
    <title>予定入力</title>
</head>
<body>
    <div id = "divall">
        <form action="demotop.html">
            <input type="submit" value="トップに戻る"class = "top">
        </form>
    <form action="schedule_list.php" method="post">
    <h1 >予定入力画面　<span id = "sche_year">？</span>年<span id ="sche_month">？</span>月<span id ="sche_date"></span>日</h1>    <table>
        <thead>
        <tr><th>日</th><th>曜日</th><th>勤務場所</th><th >社内予定</th><th class="leftpadding">個人予定</th><th class = "leftpadding">メモ</th></tr>
        </thead>
        <?php
        //1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6,7 => 7
        $daylist = array ( "MON"=>1 ,"TUE"=>2,"WED"=>3,"THU"=>4,"FRI"=>5,"SAT"=>6,"SUN"=>7);
        $weeklist = array("MON","TUE","WED","THU","FRI","SAT","SUN");
        foreach($weeklist as $value){?>
            <?=$value?>
            <tr>
                <td id = "date<?=$value?>">date</td>
                <td id = "day<?=$value?>"><?=$value?></td>
            <span >    
            <td>
            <input type="radio" name = "work<?=$value?>" value = "1" id = "arrive<?=$value?>"checked = "checked" ><label for = "arrive<?=$value?>">出社</label>
            <input type="radio" name = "work<?=$value?>" value = "2" id = "remote<?=$value?>"><label for = "remote<?=$value?>">在宅</label>
            <input type="radio" name = "work<?=$value?>" value = "3" id = "s_other<?=$value?>"><label for = "s_other<?=$value?>">その他</label>
            <input type="radio" name = "work<?=$value?>" value = "4" id = "closed<?=$value?>"><label for = "closed<?=$value?>">休日</label>
            </td>
            <td ><input type="text" class = "textarea" name = "company<?=$value?>"></td>
            <!-- 
            <td><input type="text" class = "textarea"　name = "p_schedule<?=$value?>"></td>
            <td><input type="text" class = "textarea"　name = "test<?=$value?>"></td>
            -->
            <td><input type="text" class = "textarea" name = "person<?=$value?>"></td>
            <td><input type="text" class = "textarea" name = "memo<?=$value?>"></td>
            </tr><p hidden id = "date<?=$value?>"></p><input type="hidden" id = "datepost<?=$value?>" value="?">
            
            <?php };?>

    </table>

        <div class = "bottombutton" onsubmit="">
        <input type="submit" value ="確認" class = "regist" id ="reg_check">
    </form>
    <input type="button" value ="来週へ" class = "regist" onclick="nextweek()">
    <input type="button" value = "次週へ" class = "regist" onclick="lastweek()">
    </div>
</div>
<script src="schedule.js"></script>
</body>
</html>