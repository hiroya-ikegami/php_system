<?php
session_start();
session_regenerate_id(true);

if(!isset($_SESSION["login"])){
    print'ログインされていません。<br/>';
    print'<a href="../demosystem/login/login_check.php">ログイン画面へ</a>';
    print'登録がまだの方<br/>';
    print'<a href="../demosystem/index_html">登録画面へ</a>';
    exit();
}
$message=$_SESSION['login_name']."さんようこそ";

$message=htmlspecialchars($message);
print ($message)
?>

<form action="#" method="post">
    <input type="date" name = "request_date">
    <input type="submit" id = "referencesubmit">
</form>

<?php
//var_dump($_POST);
if(isset($_POST['request_date'])){
    print($_POST["request_date"]."の予定を表示");
    $todate = $_POST["request_date"];
}
/*
if (isset($_POST['date'])){
    print ($_POST["date"]."の予定を表示");
    $todate = $_POST["date"];
    //reference($todate);
}
*/
else{
    print("今日の予定を表示");
    $todate = date("Y-m-d");
}

//print $todate;
//function reference($todate){
try{
$dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
$user = 'root';
$password = '0305';
$dbh = new PDO($dsn,$user,$password);
$dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//SELECT user, workarea, per_schedule, memo FROM schedule WHERE sche_date = "2021-05-10"
//$sql = 'SELECT title, s_date, start_time,end_time,content,participant,memberid FROM zoom_schedule INNER JOIN member ON zoom_schedule.memberid = member.memberid WHERE schedule.sche_date = "'.$todate.'"';
$sql = 'SELECT s_date,title,  start_time,end_time,content,participant,member.name FROM zoom_schedule  INNER JOIN member ON zoom_schedule.memberid = member.memberid WHERE zoom_schedule.s_date = ? ';
//print("<br>".$sql."<br>");
$stmt = $dbh->prepare($sql);
$data[] = $todate;
$stmt ->execute($data);
$re = $stmt->fetchAll(PDO::FETCH_ASSOC); 
//print_r($re);

}
catch (Exception $e){
//$sql = SELECT title, s_date, start_time,end_time,content,participant,member.name FROM zoom_schedule  INNER JOIN member ON zoom_schedule.memberid = member.memberid WHERE zoom_schedule.s_date = "2021-05-12";
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
    <h2>zoom予定編集画面 <?=date("Y")?>年<?=date("m")?>月<?=date("d")?>日</h2>
    <table>
        <thead>
        <tr><th>日程</th><th>タイトル</th><th>開始時間</th><th>終了時間</th><th>内容</th><th>参加者</th><th>登録者</th></tr>
        </thead>
        <?php 
        foreach ($re as $key => $value){
        ?>
        <tr>
            <td><?=$value["s_date"]?></td>
            <td> <?=$value["title"] ?></td>
            <td><?=$value["start_time"]?></td>
            <td><?=$value["end_time"]?></td>
            <td><?=$value["content"] ?></td>
            <td><?=$value["participant"]?></td>
            <td> <?=$value["name"] ?></td>
        </tr>
        <?php }

        ?>

    </table>
    </div>
</body>
</html>