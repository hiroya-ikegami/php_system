<?php
session_start();
session_regenerate_id(true);

if(!isset($_SESSION["login"])){
    print'ログインされていません。<br/>';
    print'<a href="../login/login.html">ログイン画面へ</a>';
    //print'登録がまだの方<br/>';
    //print'<a href="">登録画面へ</a>';
    exit();
}
$message=$_SESSION['login_name']."さんようこそ";

$message=htmlspecialchars($message);
print ($message)
?>
<!--
<div　class = "dateform">
<form action="#" method="post">
    <input type="date" name = "request_date">
    <input type="submit" id = "referencesubmit">
</form>
</div>
-->
<?php
//var_dump($_POST);
if(isset($_POST['request_date'])){
    print($_POST["request_date"]."の予定を表示中:");
    $todate = $_POST["request_date"];
    print $todate;
}
/*
if (isset($_POST['date'])){
    print ($_POST["date"]."の予定を表示");
    $todate = $_POST["date"];
    //reference($todate);
}
*/
else{
    print("今日の予定を表示中:");
    $todate = date("Y-m-d");
    print $todate;
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
$sql = 'SELECT code ,s_date,title, start_time,end_time,content,participant,member.name FROM zoom_schedule  INNER JOIN member ON zoom_schedule.memberid = member.memberid WHERE zoom_schedule.s_date = ? ';
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
<form action="../demotop.php">
            <input type="submit" value="トップに戻る" class = "top">
        </form>
    <div id = "divall">
    <h2>zoom予定編集画面 </h2>
    <div class ="dateform">
        <h3>自分が登録した予定のみ編集・削除できます。</h3>
        <form action="#" method="post">
        <input type="date" name = "request_date">
        <input type="submit" id = "referencesubmit">
        </form>
    </div>
    <form action="zoom_branch.php"method = "post" name = "editform">
    <table>
        <thead>
        <tr><th></th><th>日程</th><th>タイトル</th><th>開始時間</th><th>終了時間</th><th>内容</th><th>参加者</th><th>登録者</th></tr>
        </thead>
        <?php 
        $cou = 0;
        foreach ($re as $key => $value){
            if ($value["name"] == $_SESSION["login_name"]){
            //print_r($value);
        ?>
        <tr>
        <td><?php
            print '<input type="radio" name="regist" value="'.$value["code"].'"';
             ?>
            <input type="hidden" name="code" value = "<?=$value["code"]?>"> 
            </td>
            <td><input type="date" name="date<?=$value["code"]?>" id="" value = "<?=$value["s_date"]?>"></td>
            <td> <input type="text" name="title<?=$value["code"]?>" id=""value = "<?=$value["title"] ?>"></td>
            <td><input type="time" name="start_time<?=$value["code"]?>"value = "<?=$value["start_time"]?>"> </td>
            <td><input type="time" name = "end_time<?=$value["code"]?>" value ="<?=$value["end_time"]?>" ></td>
            <td><input type="text" name="content<?=$value["code"]?>" value = "<?=$value["content"] ?>"></td>
            <td><input type="text" name="participant<?=$value["code"]?>" value = " <?=$value["participant"] ?>"></td>
            <td> <?=$value["name"] ?></td>
        </tr>
        <?php }
        }
        ?>
    </table>
    <input type="hidden" name="code" value = "<?=$value["code"]?>">
    <input type="submit" value="変更" name = "update" id = "update" class = "topbutton"onclick="return upcheckText()" >
    <input type="submit" value="削除" name = "delete" id = "delte" class = "topbutton" onclick="return dlcheckText()" >
    </div>
    </form>
    </div>
    <script src="../js/zoomedit.js"></script>
</body>
</html>