
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ログイン成功ページ</title>
</head>
<body>
<?php
//try{
    $dsn= 'mysql:dbname=system;host=localhost';
    $user= 'root';
    $password= '';
    $dbh= new PDO($dsn);
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
    $sql='INSERT INTO member(name,birth,mail,pass)VALUES("'.$name.'","'.$birth.'","'.$mail.'","'.$pass.'")';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();

    $dbh=null;
//}
  //  catch(Exception $e)
//{
	print 'ただいま障害により大変ご迷惑をお掛けしております。<br/>';
    print '登録画面に戻る。</br>';
    print '<form method="post"acttion="demo_index.html">';
    print '<input type="submit"value="登録画面へ">';
    print '</form>';

//}
?>
</body>
</html>