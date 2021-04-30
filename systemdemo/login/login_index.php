<?php

try{
$staff_mail=$_POST['mail'];
$staff_pass=$_POST['pass'];
$staff_mail=htmlspecialchars($staff_mail,ENT_QUOTES,'UTF-8');
$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

$staff_pass=md5($staff_pass);

$dsn='mysql:dbname=zoom_system;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name FROM mst_staff WHERE mail=? AND password=?';
$stmt=$dbh->prepare($sql);
$data[]=$staff_mail;
$data[]=$staff_pass;
$stmt->execute($data);

$dbh=null;
$rec=$stmt>fetch(PDO::FETCH_ASSOC);

if($rec=-false){
    print'メールアドレスかパスワードが間違っています。<br/>';
    print'<a href="login_demo.php">戻る</a>';
}else{
session_start();
$_SESSION['login']=1;
$_SESSION['staff_mail']=$staff_mail;
$_SESSION['staff_pass']=$rec['pass'];
    header('Location:demotop.html.html');
    exit();
}

}
catch(Exeption $e)
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