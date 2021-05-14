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
$dsn='mysql:dbname=task_zoom;host=localhost;charset=utf8';
$user="root";
$password="0305";
$dbh=new PDO($dsn,$user,$password);
$dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT*FROM member ';
$stmt=$dbh->prepare($sql);
$stmt->execute($data);

while(1)
{
  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  if($rec==false){
    break;
  }
    echo '<tr>';
  echo '<td>'.$rec['name'].'</td>';
  echo '<td>'.$rec['birth'].'</td>';
  echo '<td>'.$rec['mail'].'</td>';
  echo '<td>'.$rec['pass'].'</td>';
  echo '</tr>';
}
$dbh=null;
}
catch(Exception $e){
print("errorが発生しました。");
}

?>
<br/>
<a href="kanritop.html">管理者トップへ戻る</a>
</header>
</div>

</body>
</html>