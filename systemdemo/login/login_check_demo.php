
<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ログイン画面</title>
</head>
<body>

<?php
$mail=$_POST['mail'];
$password=$_POST['password'];

$mail=htmlspecialchars($mail);
$password=htmlspecialchars($password);
$flag = 0;
if($mail=='')
{
   print'メールアドレスが入力されていません。<br/>';
   $flag = 1;
}

if($password=='')
{
   print'パスワードが入力されていません。<br/>';
   $flag = 1;
}


if($mail==''||$password=='')
{
  print'<form>';
  print'<input type="button"onclick="history.back()"value="戻る">';
  print'</form>';
  $flag = 1;
}

if($flag == 0)
{
 print "ログインしました。";
 print "<a href='../demotop.php>トップへ</a>";
}
?>
</body>
</html>