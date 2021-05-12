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
$dbhost="localhost";
$dbuser="root";
$dbpass="0305";
$dbnamae="task_zoom"

mysql_connect('loalhost','root','0305','task_zoom');
if($db->connect_error){
	echo $dbh->connect_error;
	exit();
}
$sql='SELECT*FROM member';
while($data=mysql_fetch_array($result)){
  //echo'<p>'.$data['id'].':'.$data['name'].':'.$data['birth'].':'.$data['mail'].':'.$data['pass']."</p>\n";
  echo '<tr>';
  echo '<td>'.$data['name'].'</td>';
  echo '<td>'.$data['birth'].'</td>';
  echo '<td>'.$data['mail'].'</td>';
  echo '<td>'.$data['pass'].'</td>';
  echo '</tr>';
}
$db=mysql_close($db);
if(!$db){
	exit('データベースとの接続を閉じられませんでした。');
}
/*$sql_com=mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname,$sql_con);

$create_sql="CREATE TABLE IF NOT EXISTS'TABLE'("
"ID INT NULL AUTO_INCREMENT COMMENT 'ID',".
"NAME VARCHAR(100) NULL     COMMENT 'NAME',".
"TEXT TEXT NULL             COMMENT 'TEXT',".
"DATE DATE NULL             COMMENT 'DATE',".
"PRIMARY KEY(ID)".
")";
mysql_query($create_sql,$sql_com); //テーブル作成

$ret_array=array();//適当な配列に入れる
$select_sql="select*form'task_zoom'"

if($res_select=mysql_query($select_sql,$sql_con)){
	while($line_res_select=mysql_fetch_assoc($res_select)){
		$ret_array[]=array(
			'id'=>$line_res_select['ID'],
			'name'=>$line_res_select['NAME'],
			'text'=>$line_res_select['TEXT'],
			'date'=>$line_res_select['DATE'],
		);
	}
}
mysql_close($sql_con);
*/
?>

<div id="page">
<header id="pageTop">

<p class="top">管理者画面①</p>

</header>
</div>

<div id="pageBody">
<header id="pageBodyMain">

<table >
<tr>

<th1> </th1>

<th><?php print "$"; ?></th><th>		</th><th>		</th><th>   </th>

</tr>

<tr>
<th1> </th1>

<td><a href="deletekakunin.html"></td><td></td><td></td><td></a></td>

</tr>

<tr>
<th1> </th1>

<td>	NAME2	</td><td>BirthDay</td><td>		Mail	</td><td>PassWoed</td>

</tr>

<tr>
<th1> </th1>

<td>	NAME3	</td><td>BirthDay</td><td>		Mail	</td><td>PassWoed</td>

</tr>

<tr>
<th1> </th1>

<td>	NAME4	</td><td>BirthDay</td><td>		Mail		</td><td>PassWoed</td>

</tr>
</table>
</br>
<p class="l"><a href="kanritop.html">戻る</a></p>
</header>
</div>

</body>
</html>