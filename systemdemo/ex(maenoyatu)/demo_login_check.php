<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>カレンダー制作</title>
</head>
<body>

<?php
$mail=$_POST["mail"];
$password=$_POST["Password"];

$mail=htmlspecialchars($mail);
$password=htmlspecialchars($password);

if($mail=='')
{
   print'メールアドレスが入力されていません。<br/>';
}
else
{
  print 'トップ画面';
}

if($password=='')
{
   print'パスワードが入力されていません。<br/>';
}
else
{
  print'';
}

if($mail==''||$passwordl=='')
{
  print'<form>';
  print'<input type="button"onclick="history.back()"value="戻る">';
  print'</form>';
}
else
{
   print'<form method="post" action="thanks.php">';
   print'<input type="hidden"name="nickname"value="'.$mail.'">';
   print'<input type="hidden"name="email"value="'.$password.'">';

   print'<input type="button" onclick="history.back()"value="戻る">';
   print'<input type="submit"value="OK">';
   print'</form>';
}
?>


</body>
</html>