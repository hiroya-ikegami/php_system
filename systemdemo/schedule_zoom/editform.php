<?php
session_start();
session_regenerate_id(true);

if(!isset($_SESSION["login"])){
    print'ログインされていません。<br/>';
    print'<a href="../login/login.html">ログイン画面へ</a>';
    print'登録がまだの方<br/>';
    print'<a href="../demosystem/index_html">登録画面へ</a>';
    exit();
}
$message=$_SESSION['login']."さんようこそ";
$message=htmlspecialchars($message);
print ($message)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zoom</title>
</head>
<body>
    <h2>表示したい日付を選択してください <br>選択した日付を含む一週間分の日付が表示されます。</h2>
    <form action="./edit_zoomschedule.php" method = "post" >
        <input type="date" name="date" id="dateform" value = "<?=date("Y-m-d")?>">
        <input type="submit" value="参照">
    </form>
    
</body>
</html>