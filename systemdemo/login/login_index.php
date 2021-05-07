<?php

try{
$staff_mail=$_POST['mail'];
$staff_pass=$_POST['password'];
$staff_mail=htmlspecialchars($staff_mail,ENT_QUOTES,'UTF-8');
$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

$staff_pass=md5($staff_pass);

/*
$testuser = "123";
    $dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
    $user = 'root';
    $password = '0305';
    $dbh = new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //$sql = 'INSERT INTO zoom_schedule(name,password) VALUES (?,?)';
    $testsql = 'INSERT INTO zoom_schedule(title,s_date,start_time,end_time,content,participant,regist_p) VALUES('.$title.",".$calendar.",".$start_time.",".$end_time.",".$content.",".$member.",".$testuser.")";
    print $testsql;
    //print ($title.$calendar.$start
*/
$dsn='mysql:dbname=task_zoom;host=localhost;charaset=utf8';
$user='root';
$password='0305';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name  FROM user WHERE mail=? AND pass=?';
$stmt=$dbh->prepare($sql);
$data[]=$staff_mail;
$data[]=$staff_pass;
$stmt->execute($data);
$prsql = 'SELECT name  FROM user WHERE mail='."$staff_mail".' AND pass='."$staff_pass" ;
print($prsql);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
print_r($rec);
$dbh=null;
if($rec=-false){
    print'メールアドレスかパスワードが間違っています。<br/>';
    print'<a href="login.php">戻る</a>';
}else{
session_start();
$_SESSION['login']=1;
$_SESSION['staff_mail']=$staff_mail;
$_SESSION['staff_pass']=$rec['pass'];
print('ok');
    header('Location:../demotop.html');
    exit();
}

}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}
/*$message=htmlspecialchars($message);
if($flag == 0)
{
 print "ログインしました。";
 print "<a href='demotop.html'>トップへ</a>";
}*/
?>