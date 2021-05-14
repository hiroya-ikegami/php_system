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
$message=$_SESSION['login_name']."さんようこそ";

$message=htmlspecialchars($message);
print ($message)
?>
<?php 
$ym = (isset($get));
//日付取得 
$toYmd = date( "Y-m-d" ) ;//2021-05-07:
//print "今日".$toYm."<br>";
//0123456 5
$targetweekday = date("w",strtotime($toYmd));
//print $targetweekday."<br>";
$dateslist =[];
$monday = date("Y-m-d",strtotime('last monday'));
//print "月曜日".$monday."<br>";
//月曜日だった場合は今日から一週間で、前の月曜日から一週間の日程取得、
if (date("w") == 1){
    for ($i=0; $i<=6; $i++ )
    {
    $times = "+" .$i. "days";
    $dateslist[] = date ("Y-m-d",strtotime($toYmd.$times));
    $dateslooklist[] = date("m/d",strtotime($toYmd.$times));
    }
}
else{
    for ($i=0; $i<=6; $i++ )
    {
    $times = "+" .$i. "days";
    $dateslist[] = date ("Y-m-d",strtotime($monday.$times));
    $dateslooklist[] = date("m/d",strtotime($monday.$times));
    }
}
//print_r($dateslist);
try{
    $testid = 3;
    $dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
    $user = 'root';
    $password = '0305';
    $dbh = new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 

    //WHERE schedule.sche_date BETWEEN  "2021-05-10" AND "2021-05-16" AND schedule.memberid ="3"
    $sql = 'SELECT id,name, workarea, com_schedule,per_schedule, memo FROM schedule INNER JOIN member ON schedule.memberid = member.memberid WHERE schedule.sche_date BETWEEN "'.$dateslist[0].'" AND "' .$dateslist[6].'" AND schedule.memberid ="'.$_SESSION["login_id"].'"';
    
    //print("<br>".$sql."<br>");
    $stmt = $dbh->prepare($sql);
    $stmt ->execute();
    $re = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    print_r($re);
    
    }
    catch (Exception $e){
    print "障害が発生しています";
    exit;
    }

//print ("<br>".$re[5]["com_schedule"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_yf.css">
    <title>予定編集</title>
</head>
<body>
    <div id = "divall">
        <form action="../demotop.html">
            <input type="submit" value="トップに戻る"class = "top">
        </form>
    <form action="schedule_list2.php" method="post">
    <h1 >予定編集画面　<span><?=date("Y")?></span>年<span ><?=date("m")?></span>月<span><?=date("d")?></span>日</h1>
        <table class = "zoom_editform">
        <thead>
        <tr><th></th><th>日</th><th>曜日</th><th>勤務場所</th><th>変更</th><th >社内予定</th><th class="leftpadding">個人予定</th><th class = "leftpadding">メモ</th></tr>
        </thead>
        <?php
        //1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6,7 => 7
        $daylist = array ( "MON"=>0 ,"TUE"=>1,"WED"=>2,"THU"=>3,"FRI"=>4,"SAT"=>5,"SUN"=>6);
        //$weeklist = array("MON","TUE","WED","THU","FRI","SAT","SUN");
        $cou = 0;
        //foreach($re as $x =>$svalue){
        foreach($daylist as $key=> $value){
            ?>
            <tr>
                <input type="hidden" name="zoomid" value = "<?=$re[$cou]["id"]?>">
                <td><input type="radio" name="regist" id="regist<?=$key?>"></td>
                <!--日付→曜日-->
                <td id = "date<?=$key?>"><?=$dateslooklist[$value];?></td>
                <td id = "day<?=$key?>"><?=$key?></td>
 
            <td><?=$re[$cou]['workarea']?></td>
            <td>
                <?php //その他→在宅→出社?>
            <input type="radio" name = "work<?=$key?>" value = "1" id = "arrive<?=$key?>"checked = "" ><label id = "worklabel<?$key?>" for = "arrive<?=$key?>">出社</label>
            <input type="radio" name = "work<?=$key?>" value = "2" id = "remote<?=$key?>"><label for = "remote<?=$key?>">在宅</label>
            <input type="radio" name = "work<?=$key?>" value = "3" id = "s_other<?=$key?>"><label for = "s_other<?=$key?>">その他</label>
            <input type="radio" name = "work<?=$key?>" value = "4" id = "closed<?=$key?>"><label for = "closed<?=$key?>">休日</label>
            </td>
            <td><input type="text" class = "textarea" name = "company<?=$key?>" value = "<?=$re[$cou]["com_schedule"]?>"></td>
            <td><input type="text" class = "textarea" name = "person<?=$key?>" value = "<?=$re[$cou]['per_schedule']?>"></td>
            <td><input type="text" class = "textarea" name = "memo<?=$key?>" value = "<?=$re[$cou]['memo']?>"></td>
            </tr>
            <?php
            $cou +=1; 
            //}
                };
            ?>

    </table>
        <div class = "bottombutton" onsubmit="">
        <input type="submit" value ="変更" class = "regist" id ="reg_check">
        <input type="submit" value="削除" class = "dlregist" id = "dlreg_check">
    </form>
    <!-- <input type="button" value ="先週へ" class = "regist" onclick="nextweek()"> -->
    <input type="button" value = "次週へ" class = "regist" onclick="lastweek()">
    </div>
</div>
<?php
//print_r($dateslist);
$_SESSION["dateslist_data"] = $dateslist;
$_SESSION["dateslooklist_data"] = $dateslooklist;
?>
</body>
</html>