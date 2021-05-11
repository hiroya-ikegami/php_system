
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>登録完了画面</title>
</head>
<body>
<?php
try{
    $name = $_POST['shimei'];
    $birth = $_POST['birth'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass']; 

    $name=htmlspecialchars($name);
    $birth=htmlspecialchars($birth);
    $mail=htmlspecialchars($mail);
    $pass=htmlspecialchars($pass);

    $dsn= 'mysql:dbname=task_zoom;host=localhost';
    $user= 'root';
    $password= '0305';
    $dbh= new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //$dbh->query('SET NAMES utf8');
    $subsql='INSERT INTO member(name,birth,mail,pass)VALUES("'.$name.'","'.$birth.'","'.$mail.'","'.$pass.'")';
    $sql='INSERT INTO member(name,birth,mail,pass)VALUES(?,?,?,?)';//"'.$name.'","'.$birth.'","'.$mail.'","'.$pass.'"
    $stmt=$dbh->prepare($sql);
    $data[] = $name;
    $data[] = $birth;
    $data[] = $mail;
    $data[] = $pass;
    $stmt ->execute($data);

    $dbh=null;

    print $name;
    print '様<br/>';
    print 'ご登録ありがとうございます。<br/>';
<<<<<<< HEAD:systemdemo/login/success.php
    print "<a href='../management/kanritop.html'>管理トップ画面へ</a>";
=======
    print '<form method="post"action="demotop.html">';
    print '<input type="submit"value="トップ画面へ">';
    print '</form>';
>>>>>>> ba364968e7f052d84d5acd21f33d4549ad531eca:systemdemo/success.php

}
  catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。<br/>';
    print '<form method="post"acttion="demo_index.html">';
    print'<input type="button"onclick="history.back()"value="登録画面へ">';
    print '</form>';
}
?>
</body>
</html>