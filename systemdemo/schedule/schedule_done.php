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
    require_once("../common/common.php");
    $post = $_POST;
    print_r( $post);
    $work = $post['swork']; 
    print ($work);
    $work = json_decode($work,true);
    print($work);
try{
    

    $company = $post['scompany'];
    $person = $post['sperson'];
    $memo = $post['smemo'];

    $dsn = 'mysql:dbname=shop;host=localhost;charaset=utf8';
    $user = 'root';
    $password = '0305';
    $dbh = new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //INSERT INTO `schedule` (`id`, `date`, `sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES (NULL, current_timestamp(), '20210428', '在宅', '帰社会', '夕方会議', '開発', '12');
    ////INSERT INTO `schedule` ( `sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES ( '20210428', '在宅', '帰社会', '夕方会議', '開発', '12');
    //$sql = 'INSERT INTO mst_staff(name,password) VALUES (?,?)';
    $testdays = 20210428;
    $testuser = 12;
    for ($i=0;$i<3;$i++){
        $sql = 'INSERT INTO `schedule` ( `sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES(?,?,?,?,?,?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $testdays;
        $data[] = $work[$i];
        $data[] = $company[$i];
        $data[] = $person[$i];
        $data[] = $memo[$i];
        $data[] = $testuser;
        $testp= "'INSERT INTO `schedule` ( `sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES($$testdays+$i,$work[$i],$company[$i],$person[$i], $memo[$i],$testuser)'";
        print ($testp);
        $stmt ->execute($data);

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
}
catch(Exception $e)
{
    
print "ただいま障害により大変ご迷惑をおかけしております。";
exit();
}
?>