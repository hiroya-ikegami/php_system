<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: index.php");
    exit();
}
$_SESSION=array();

if(int_get("session.use_cookies")){
    setcookie(session_name(),'',time()-42000,'/');
}

session_destroy();
?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ログアウトぺージ</title>
<link href="logout"rel="sylsheet"type="text/css">
</head>
<body>
<h1>logoutpage</h1>
<div class="message">logoutsita</div>
<a href="login_index.php">loginpage</a>
</body>
</html>