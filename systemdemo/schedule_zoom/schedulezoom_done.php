<?php 
try{
    require_once("../common/common.php");
    $post = $_POST;
    $title = $post["title"];
    $calendar = $post["calendar"];
    $start_time = $post["start_time"];
    $end_time = $post["end_time"];
    $content =$post["content"];
    $member = $post["member"];

    $testuser = "123";
    $dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
    $user = 'root';
    $password = '0305';
    $dbh = new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //$sql = 'INSERT INTO zoom_schedule(name,password) VALUES (?,?)';
    $testsql = 'INSERT INTO zoom_schedule(title,s_date,start_time,end_time,content,participant,regist_p) VALUES('.$title.",".$calendar.",".$start_time.",".$end_time.",".$content.",".$member.",".$testuser.")";
    print $testsql;
    //print ($title.$calendar.$start_time.$end_time.$content.$member.$testuser);
    $sql = 'INSERT INTO zoom_schedule(title,s_date,start_time,end_time,content,participant,regist_p) VALUES(?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $title;
    $data[] = $calendar;
    $data[] = $start_time;
    $data[] = $end_time;
    $data[] = $content;
    $data[] = $member;
    $data[] = $testuser;
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
<form action="demotop.html">
        <input type="submit" value="トップに戻る"class = "top">
    </form>
</body>
</html>

<?php }
catch(Exception $e)
{
print "ただいま障害により大変ご迷惑をおかけしております。";
exit();
}
?>