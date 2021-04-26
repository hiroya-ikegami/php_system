<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta https-equiv="Content-Type"content="text/html;charset=UTF-8">
    <title>これでいいですか？</title>
</head>
<body>
    <?php
    $shimei=$_POST['shimei'];
    $birth=$_POST['birth'];
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];

    $shimei=htmlspecialchars($shimei);
    $birth=htmlspecialchars($birth);
    $mail=htmlspecialchars($mail);
    $pass=htmlspecialchars($pass);

    if($shimei=="")
    {
        print"氏名が入力されていません。<br/>\n";
    }else{
    print"氏名";
    print $shimei;
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

if($shimei==""||$birth==""||$mail==""||$pass=="")
{
    print"<form>";
    print'<input type="button"onclick="history.back()"value="戻る">';
    print"</from>";
}else{
    print'<form method="post"action="thanks.php">';
    print '<input name="shimei"type="hidden"value="'.$shimei.'">';
	print '<input name="birth"type="hidden"value="'.$birth.'">';
	print '<input name="mail"type="hidden"value="'.$mail.'">';
	print '<input name="pass"type="hidden"value="'.$pass.'">';
	print '<input type="button"onclick="history.back()"value="戻る">';
	print '<input type="submit"value="OK">';
	print '</form>';
}
?>
</body>
</html>