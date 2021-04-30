<?php
session_start();

if(!isset($_SESSION["login"])){
    print'ログインされていません。<br/>';
    print'<a href="../demosystem/login/login_check.php">ログイン画面へ</a>';
    print'登録がまだの方<br/>';
    print'<a href="../demosystem/index_html">登録画面へ</a>';
    exit();
}
$_SESSION=array();

if(isset($_COOKIE[session_name()])==true){
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
<h1>ログアウトページ</h1>
<div class="message">ログアウトしました。</div>
<a href="login_index.php">ロングインページ</a>
</body>
</html>