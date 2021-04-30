<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta https-equiv="Content-Type"content="text/html;charset=UTF-8">
    <title>確認画面</title>
</head>
<body>
    <?php
    $name=$_POST['name'];
    $birth=$_POST['birth'];
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];

    $name=htmlspecialchars($name);
    $birth=htmlspecialchars($birth);
    $mail=htmlspecialchars($mail);
    $pass=htmlspecialchars($pass);
    $pass2=htmlspecialchars($pass2);

    if($name=="")
    {
        print"氏名が入力されていません。<br/>\n";
    }else{
    print"氏名";
    print $name;
    print"<br/>";
}

if($birth=="")
{
      print"誕生日が入力されていません。<br/>\n";
}else{
print"誕生日";
print $birth;
print"<br/>";
}

if($mail=="")
{
      print"メールアドレスが入力されていません。<br/>\n";
}else{
print"メールアドレス";
print $mail;
print"<br/>";
}

if($pass=="")
{
      print"パスワードが入力されていません。<br/>\n";
}else{
print"パスワード";
print $pass;
print"<br/>";
}
if($pass!=$pass2)
{
    print"パスワードが間違っています。<br/>\n";
}

if($name==""||$birth==""||$mail==""||$pass==""||$pass==""||$pass!=$pass2)
{
    print"<form>";
    print'<input type="button"onclick="history.back()"value="戻る">';
    print"</from>";
}
else
{
 print $name"さんようこそ。";
 print "<a href='login/success.php'></a>";
}
?>
</body>
</html>