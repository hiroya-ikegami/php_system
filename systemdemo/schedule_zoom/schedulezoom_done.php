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
<?php 
try{
    require_once("../common/common.php");
    $post = $_POST;
    $title = $post["title"];
    $calendar = $post["calendar"];
    $start_time = $post["start_time"];
    $end_time = $post["end_time"];
    $content =$post["content"];
    $zoom_member = $post["member"];

    $testuser = "1";
    $dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
    $user = 'root';
    $password = '0305';
    $dbh = new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //$sql = 'INSERT INTO zoom_schedule(name,password) VALUES (?,?)';
    $testsql = 'INSERT INTO zoom_schedule(title,s_date,start_time,end_time,content,participant,memberid) VALUES('.$title.",".$calendar.",".$start_time.",".$end_time.",".$content.",".$zoom_member.",".$testuser.")";
    //print $testsql;
    //print ($title.$calendar.$start_time.$end_time.$content.$member.$testuser);
    $sql = 'INSERT INTO zoom_schedule(title,s_date,start_time,end_time,content,participant,memberid) VALUES(?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $title;
    $data[] = $calendar;
    $data[] = $start_time;
    $data[] = $end_time;
    $data[] = $content;
    $data[] = $zoom_member;
    $data[] = $_SESSION["login_id"];
    $stmt ->execute($data);

    $dbh = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_zf.css">
    <title>Document</title>
</head>
<body>


<div class = "cform">
<div><h2>登録：</h2></div>
zoom予定を追加しました。 <br/>

</div>
<div class = "footbutton">
<form action="../demotop.html">
        <input type="submit" value="トップに戻る"class = "regist">
    </form>
<form action="./schedulezoom_form.html">
<input type="submit" value="続けて登録" class = "regist">
</form>
</div>

</body>
</html>

<?php }
catch(Exception $e)
{
print "ただいま障害により大変ご迷惑をおかけしております。";
exit();
}
?>