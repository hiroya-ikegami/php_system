<?php
session_start();
session_regenerate_id(true);

if(!isset($_SESSION["login"])){
    print'ログインされていません。<br/>';
    print'<a href="../demosystem/login/login_check.php">ログイン画面へ</a>';
    print'登録がまだの方<br/>';
    print'<a href="../demosystem/index_html">登録画面へ</a>';
    exit();
}
$message=$_SESSION['login']."さんようこそ";
$message=htmlspecailchars($message);
?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ログイン成功ページ</title>
</head>
<body>
<h1>ログイン成功</h1>
<a href="demotop.html">ホームページ</a>
<div class="message"><?php echo $message;?></div>
<a href="logout.php">ログアウト</a>
</body>
</html>