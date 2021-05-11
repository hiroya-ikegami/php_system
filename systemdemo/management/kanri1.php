<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitonal//EN">
<html>
<head>
<mate charset="UTF-8">
<title>demo</title>
	<link rel="stylesheet" href="../css/demokanristyle.css">

</head>
<body bgcolor="#fbdac8">
<?php
$name = $_POST['name'];
$birth = $_POST['birth'];
$mail = $_POST['mail'];
$pass = $_POST['pass']; 

$name=htmlspecialchars($name);
$birth=htmlspecialchars($birth);
$mail=htmlspecialchars($mail);
$pass=htmlspecialchars($pass);
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

<th>		</th><th>		</th><th>		</th><th>   </th>

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