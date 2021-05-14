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
//日付取得 
//print($_POST["request_date"]."の予定を表示");
//カレンダーから指定した日付がある場合その週へない場合は今日を含む一週間の予定を表示。
if(isset($_POST['request_date'])){
    $toYmd = $_POST["request_date"];
}

else{
    $toYmd = date("Y-m-d");
}

//$toYmd = date( "Y-m-d" ) ;
$dateslist =[];
$monday = date("Y-m-d",strtotime('last monday',strtotime($toYmd)));
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
    $dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
    $user = 'root';
    $password = '0305';
    $dbh = new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT name, workarea, per_schedule, memo FROM schedule INNER JOIN member ON schedule.memberid = member.memberid WHERE schedule.sche_date = "'.$toYmd.'" AND schedule.memberid ="'.$_SESSION["login"].'"';
    
    //print("<br>".$sql."<br>");
    $stmt = $dbh->prepare($sql);
    $stmt ->execute();
    $re = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    //print_r($re);
    
    }
    catch (Exception $e){
    
    }
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
        <div class = "bottombutton">
            <form action="../demotop.php">
                <input type="submit" value="トップに戻る"class = "top">
            </form>
            <form action="./schedule_check_edit.php">
                <input type="submit" value="登録した予定の編集" class = "edit">
            </form>
        </div>
    <h1 >予定入力画面　<span><?=date("Y")?></span>年<span ><?=date("m")?></span>月<span><?=date("d")?></span>日</h1> 
    <h3><?=$toYmd?>の予定を表示中</h3>
        <form action="#" method="post" class = "req_dateform">
            <input type="date" name = "request_date">
            <input type="submit" id = "referencesubmit">
        </form>
        <form action="schedule_list2.php" method="post">
        <input type="button" value = "次週へ" class = "regist" onclick="lastweek()">
        <table>
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
            <td><input type="text" class = "textarea" name = "person<?=$key?>"></td>
            <td><input type="text" class = "textarea" name = "memo<?=$key?>"></td>
            </tr><p hidden id = "date<?=$key?>"></p><input type="hidden" id = "datepost<?=$key?>" value="?">
            
            <?php 
                };
            ?>

    </table>

        <div class = "bottombutton" onsubmit="">
 
    </form>
    <!-- <input type="button" value ="先週へ" class = "regist" onclick="nextweek()"> -->
    <input type="submit" value ="確認" class = "regist" id ="reg_check">
    
    </div>
</div>
<?php
//print_r($dateslist);
$_SESSION["dateslist_data"] = $dateslist;
$_SESSION["dateslooklist_data"] = $dateslooklist;
?>
<script src="../schedule.js"></script>
</body>
</html>