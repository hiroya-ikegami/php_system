
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ログイン成功ページ</title>
</head>
<body>
<a href="../demotop.html">ホームページ</a>
<div class="message"></div>
<a href="logout.php">ログアウト</a>
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

    $name=htmlspecialchars($name);
    $birth=htmlspecialchars($birth);
    $mail=htmlspecialchars($mail);
    $pass=htmlspecialchars($pass);

    print $name;
    print '様<br/>';
    print 'ご登録ありがとうございます。<br/>';
    print '<form method="post"action="demotop.html">';
    print '<input type="submit"value="ホームへ">';
    print '</form>';
    $sql='INSERT INTO User(name,birth,mail,pass)VALUES("'.$name.'","'.$birth.'","'.$mail.'","'.$pass.'")';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();

    $dbh=null;
}
    catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
    print '<form method="post"acttion>';
    print '<form method="post"acttion></form>';
}
?>
</body>
</html>