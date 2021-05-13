<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitonal//EN">
<html>
<head>
<mate charset="UTF-8">
<title>demo</title>
	<link rel="stylesheet" href="../css/demokanristyle.css">

</head>
<body bgcolor="#fbdac8">
<table>
<tr bgcolor="#AAAAAA">
<th>名前</th>
<th>誕生日</th>
<th>メール</th>
<th>パスワード</th>
</tr>
<?php
try{
$data=[];
$datai=[];
$dsn='mysql:dbname=task_zoom;host=localhost;charset=utf8';
$user="root";
$password="0305";
$dbh=new PDO($dsn,$user,$password);
$dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT memberid,name,birth,mail,pass FROM member WHERE memberid IN(?,?,?,?,?)';
$stmt=$dbh->prepare($sql);

$data[]=$datai['memberid'];
$data[]=$datai['name'];
$data[]=$datai['birth'];
$data[]=$datai['mail'];
$data[]=$data['pass'];
while($data['memberid']>100){
  //echo'<p>'.$data['id'].':'.$data['name'].':'.$data['birth'].':'.$data['mail'].':'.$data['pass']."</p>\n";
  echo '<tr>';
  echo '<td>'.$datai['name'].'</td>';
  echo '<td>'.$datai['birth'].'</td>';
  echo '<td>'.$datai['mail'].'</td>';
  echo '<td>'.$datai['pass'].'</td>';
  echo '</tr>';
}
$stmt->execute($data);
$dbh=null;
}
catch(Exception $e){
print("errorが発生しました。");
}
?>

</header>
</div>

</body>
</html>