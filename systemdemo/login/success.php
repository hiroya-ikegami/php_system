<<<<<<< HEAD
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
$message=$_SESSION['login']."さんようこそ";

$message=htmlspecialchars($message);
?>
=======
<!DOCTYPE html>
>>>>>>> d44f8fadc6b427689e34713da0087df8e81c953c
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ログイン成功ページ</title>
</head>
<body>
<<<<<<< HEAD
<h1>ログイン成功</h1>
<a href="../demotop.html">ホームページ</a>
<div class="message"><?php echo $message;?></div>
<a href="logout.php">ログアウト</a>
=======
<?php
try{
    $dsn= 'mysql:dbname=systemdemo;host=localhost';
    $user= 'root';
    $password= '';
    $dbh= new PDO($dsn,$user,$password);
    $dbh->query('SET NAMES utf8');
    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $name=htmlspecialchras($name);
    $birth=htmlspecialchars($birth);
    $mail=htmlspecialchars($mail);
    $pass=htmlspecialchars($pass);

    print $name;
    print '様<br/>';
    print 'ご登録ありがとうございます。<br/>';
    print '<form method="post"action="demotop.html">';
    print '<input type="submit"value="ホームへ">';
    print '</form>';
}
    catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
    print '<form method="post"acttion>'
}
?>
>>>>>>> d44f8fadc6b427689e34713da0087df8e81c953c
</body>
</html>