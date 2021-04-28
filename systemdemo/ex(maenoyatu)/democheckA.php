<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta https-equiv="Content-Type"content="text/html;charset=UTF-8">
    <title>確認画面</title>
</head>
<body>
    <?php
    $shimei=$_POST['shimei'];
    $birth=$_POST['birth'];
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];

    $shimei=htmlspecialchars($shimei);
    $birth=htmlspecialchars($birth);
    $mail=htmlspecialchars($mail);
    $pass=htmlspecialchars($pass);
    $pass2=htmlspecialchars($pass2);
    $flag=0;

    if($shimei=="")
    {
        print"氏名が入力されていません。<br/>\n";
        $flag=1;
    }else{
    print"氏名";
    print $shimei;
    print"<br/>";
}

if($birth=="")
{
      print"誕生日が入力されていません。<br/>\n";
      $flag=1;
}else{
print"誕生日";
print $birth;
print"<br/>";
}

if($mail=="")
{
      print"メールアドレスが入力されていません。<br/>\n";
        $flag=1;
}else{
print"メールアドレス";
print $mail;
print"<br/>";
}

if($pass=="")
{
      print"パスワードが入力されていません。<br/>\n";
      $flag=1;
}else{
print"パスワード";
print $pass;
print"<br/>";
}
if($pass!=$pass2)
{
    print"パスワードが間違っています。<br/>\n";
    $flag=1;
}

if($shimei==""||$birth==""||$mail==""||$pass=="")
{
    print"<form>";
    print'<input type="button"onclick="history.back()"value="戻る">';
    print"</from>";
    $flag=1;
}
if($flag == 0)
{
 print "ようこそ。";
 print "<a href='demotop.html'>トップへ</a>";
}
?>
</body>
</html>