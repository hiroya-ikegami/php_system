<?php
session_start();
session_regenerate_id(true);

if(!isset($_SESSION["login"])){
  
    
    print'登録がまだの方<br/>';
    print'<a href="login/index_html">登録画面へ</a>';
    exit();
}
$message=$_SESSION['login_name']."さんようこそ";

$message=htmlspecialchars($message);
print ($message)
?>
<?php

if(isset($_POST['request_date'])){
    print($_POST["request_date"]."の予定を表示");
    $todate = $_POST["request_date"];
}

else{
    //print("今日の予定を表示");
    $todate = date("Y-m-d");
}
//$todate = date("Y-m-d");
//print $todate;
try{
$dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
$user = 'root';
$password = '0305';
$dbh = new PDO($dsn,$user,$password);
$dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//INSERT INTO `schedule` ( `sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES(21-05-10,1,会議,, ,12)'出社
//SELECT user, workarea, per_schedule, memo FROM schedule WHERE sche_date = "2021-05-10"
$sql = 'SELECT name, workarea, per_schedule, memo FROM schedule INNER JOIN member ON schedule.memberid = member.memberid WHERE schedule.sche_date = "'.$todate.'"';
//$sql = 'SELECT user, workarea, per_schedule, memo FROM schedule WHERE sche_date = "'.$todate.'"';

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
    <link rel="stylesheet" href="../css/style_ml.css">
    <title>社員予定</title>
</head>
<body>
    <div id = "divall">
    <h2>社員予定一覧 <?=date("Y")?>年<?=date("m")?>月<?=date("d")?>日 </h2>
    <div class ="dateform">  
        <h3><?=$todate?>の予定を表示中</h3>
        <form action="#" method="post" class = "req_dateform">
            <input type="date" name = "request_date">
            <input type="submit" id = "referencesubmit">
        </form>
    </div>
    <table>
        <thead>
        <tr><th>社員名</th><th>勤務場所</th><th>個人予定</th><th>メモ</th></tr>
        </thead>
        <?php 
        foreach ($re as $key => $value){
            //print_r($value);
        ?>
        <tr>
            <td><?=$value["name"] ?></td>
            <td> <?=$value["workarea"] ?></td>
            <td><?=$value["per_schedule"]?></td>
            <td><?=$value["memo"]?></td>
        </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>