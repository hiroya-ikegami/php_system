<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta https-equiv="Content-Type"content="text/html;charset=UTF-8">
    <title>これでいいですか？</title>
</head>
<h1><font color="white": size="12px">登録確認確認</font></h1>
<p align center>
<body bgcolor="lightblue">
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
    print"氏名が入力されていません。<br/>";
    }else{
    print"氏名";
    print $name;
    print"<br/>";
}

if($birth=="")
{
    print"誕生日が入力されていません。<br/>";
}else{
print"誕生日";
print $birth;
print"<br/>";
}

if($mail=="")
{
    print"メールアドレスが入力されていません。<br/>";
}else{
print"メールアドレス";
print $mail;
print"<br/>";
}

if($pass=="")
{
    print"パスワードが入力されていません。<br/>";
}else{
print"パスワード";
print $pass;
print"<br/>";
}

if($pass!=$pass2){
    print"パスワードが一致しません。<br/>";
}

if($name==""||$birth==""||$mail==""||$pass==""||$pass!=$pass2)
{
    print"<form>";
    print'<input type="button"onclick="history.back()"value="戻る">';
    print"</from>";
}else{
    print'<form method="post"action="success.php">';
    print '<input name="name"type="hidden"value="'.$name.'">';
	print '<input name="birth"type="hidden"value="'.$birth.'">';
	print '<input name="mail"type="hidden"value="'.$mail.'">';
	print '<input name="pass"type="hidden"value="'.$pass.'">';
    print '<input name="pass2"type="hidden"value="'.$pass2.'">';
	print '<input type="button"onclick="history.back()"value="戻る">';
	print '<input type="submit"value="OK">';
	print '</form>';
}
?>
</p>
</body>
</html>