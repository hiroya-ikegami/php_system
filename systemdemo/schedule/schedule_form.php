<?php
session_start();
session_regenerate_id(true);

if(!isset($_SESSION["login"])){
    print'ログインされていません。<br/>';
    print'<a href="../login/login.html">ログイン画面へ</a>';
    print'登録がまだの方<br/>';
    print'<a href="../demosystem/index_html">登録画面へ</a>';
    exit();
}
$message=$_SESSION['login']."さんようこそ";

$message=htmlspecialchars($message);
print ($message)
?>
<?php 
$ym = (isset($get));
//日付取得 
$toYm = date( "Y-m-d" ) ;//2021-05-07:
//print "今日".$toYm."<br>";
//0123456 5
$targetweekday = date("w",strtotime($toYm));
//print $targetweekday."<br>";
$dateslist =[];
$monday = date("Y-m-d",strtotime('last monday'));
//print "月曜日".$monday."<br>";
//月曜日だった場合は今日から一週間で、前の月曜日から一週間の日程取得、
if (date("w") == 1){
    for ($i=0; $i<=6; $i++ )
    {
    $times = "+" .$i. "days";
    $dateslist[] = date ("y-m-d",strtotime($toYm.$times));
    $dateslooklist[] = date("m/d",strtotime($toYm.$times));
    }
}
else{
    for ($i=0; $i<=6; $i++ )
    {
    $times = "+" .$i. "days";
    $dateslist[] = date ("y-m-d",strtotime($monday.$times));
    $dateslooklist[] = date("m/d",strtotime($monday.$times));
    }
}

//print_r($dateslist);
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
        <form action="../demotop.html">
            <input type="submit" value="トップに戻る"class = "top">
        </form>
    <form action="schedule_list2.php" method="post">
    <h1 >予定入力画面　<span><?=date("Y")?></span>年<span ><?=date("m")?></span>月<span><?=date("d")?></span>日</h1>    <table>
        <input type="submit" value ="確認" class = "regist" id ="reg_check">
        <thead>
        <tr><th>日</th><th>曜日</th><th>勤務場所</th><th >社内予定</th><th class="leftpadding">個人予定</th><th class = "leftpadding">メモ</th></tr>
        </thead>
        <?php
        //1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6,7 => 7
        $daylist = array ( "MON"=>0 ,"TUE"=>1,"WED"=>2,"THU"=>3,"FRI"=>4,"SAT"=>5,"SUN"=>6);
        $weeklist = array("MON","TUE","WED","THU","FRI","SAT","SUN");
        //foreach($weeklist as $value){
        foreach($daylist as $key=> $value){?>
            <tr><!--日付→曜日-->
                <td id = "date<?=$key?>"><?=$dateslooklist[$value];?></td>
                <td id = "day<?=$key?>"><?=$key?></td>
            <span >    
            <td>
            <input type="radio" name = "work<?=$key?>" value = "1" id = "arrive<?=$key?>"checked = "checked" ><label for = "arrive<?=$key?>">出社</label>
            <input type="radio" name = "work<?=$key?>" value = "2" id = "remote<?=$key?>"><label for = "remote<?=$key?>">在宅</label>
            <input type="radio" name = "work<?=$key?>" value = "3" id = "s_other<?=$key?>"><label for = "s_other<?=$key?>">その他</label>
            <input type="radio" name = "work<?=$key?>" value = "4" id = "closed<?=$key?>"><label for = "closed<?=$key?>">休日</label>
            </td>
            <td ><input type="text" class = "textarea" name = "company<?=$key?>"></td>
            <!-- 
            <td><input type="text" class = "textarea"　name = "p_schedule<?=$key?>"></td>
            <td><input type="text" class = "textarea"　name = "test<?=$key?>"></td>
            -->
            <td><input type="text" class = "textarea" name = "person<?=$key?>"></td>
            <td><input type="text" class = "textarea" name = "memo<?=$key?>"></td>
            </tr><p hidden id = "date<?=$key?>"></p><input type="hidden" id = "datepost<?=$key?>" value="?">
            
            <?php };
            ?>

    </table>

        <div class = "bottombutton" onsubmit="">
 
    </form>
    <!-- <input type="button" value ="先週へ" class = "regist" onclick="nextweek()"> -->
    <input type="button" value = "次週へ" class = "regist" onclick="lastweek()">
    </div>
</div>
<?php
$_SESSION["dateslist_data"] = $dateslist;
$_SESSION["dateslooklist_data"] = $dateslooklist;
?>
<script src="../schedule.js"></script>
</body>
</html>