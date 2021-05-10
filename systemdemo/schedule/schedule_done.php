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

$message=htmlspecialchars($message);
print ($message)
?>
<?php 
    if(isset($_SESSION["work_data"])){
        $work = $_SESSION["work_data"];
        $company = $_SESSION["company_data"];
        $person  = $_SESSION["person_data"];
        $memo = $_SESSION["memo_data"];
        $daylist = $_SESSION["daylist_data"];
        print_r($daylist);
        print "<br>";
        print_r($work);
        print "<br>";
        print_r($company);
        print "<br>";
        print_r($person);
        print "<br>";
        print_r($memo);
        print "<br>";
    }


//try{

    $dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
    $user = 'root';
    $password = '0305';
    $dbh = new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
    $testdays = date("Y-m-d");
    $workarea = array("","出社","在宅","その他","休日");
    $testuser = 12;
    for ($i=0;$i<7;$i++){
        $testp= "'INSERT INTO `schedule` ( `sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES($testdays,$work[$i],$company[$i],$person[$i], $memo[$i],$testuser)'";
        print ($testp);
        print $workarea[$work[$i]];
        print "<br>";

        $sql = 'INSERT INTO `schedule` (`sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES(?,?,?,?,?,?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $daylist[$i];
        $data[] = $workarea[$work[$i]];
        $data[] = $company[$i];
        $data[] = $person[$i];
        $data[] = $memo[$i];
        $data[] = $_SESSION['login'];

        $stmt ->execute($data);

        //INSERT INTO `schedule` (`sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES (NULL, current_timestamp(), '2021-05-10', '在宅', '帰社会', '夕方会議', '開発', '12');
        
        unset($data);
        
    }
    /*
    $sql = 'INSERT INTO `schedule` ( `sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES(?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass;
    $stmt ->execute($data);
*/
    $dbh = null;

    print '<h2>登録</h2>';
    print '予定を追加しました。 <br/>';
    
//}
/*
catch(Exception $e)
{
    
print "ただいま障害により大変ご迷惑をおかけしております。";
exit();
}*/
?>
<html>
<form action="../demotop.html">
            <input type="submit" value="トップに戻る"class = "top">
        </form>

</html>
