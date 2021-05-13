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
$message=$_SESSION['login_name']."さんようこそ";

$message=htmlspecialchars($message);
print ($message)
?>
<?php 
    if(isset($_SESSION["work_data"])){
        $work = $_SESSION["work_data"];
        $company = $_SESSION["company_data"];
        $person  = $_SESSION["person_data"];
        $memo = $_SESSION["memo_data"];
        $dateslist = $_SESSION["dateslist_data"];
        /*
        print_r($dateslist);
        print "<br>";
        print_r($work);
        print "<br>";
        print_r($company);
        print "<br>";
        print_r($person);
        print "<br>";
        print_r($memo);
        print "<br>";
        */
    }
//try{

    $dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
    $user = 'root';
    $password = '0305';
    $dbh = new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $flag1 = 0;
    $flag2 = 0;
    $testdays = date("Y-m-d");
    $workarea = array("","出社","在宅","その他","休日");
    $testuser = $_SESSION["login_id"];
    
    for ($i=0;$i<7;$i++){
        //
        //$selectsql = 'SELECT name FROM schedule WHERE memberid = "'.$_SESSION["login_id"].'" AND sche_date = "'.$dateslist[$i].'"';
        $selectsql = 'SELECT workarea FROM schedule WHERE memberid = ? AND sche_date = ?';
        $stmt = $dbh->prepare($selectsql);
        $data[]=$_SESSION["login_id"];
        $data[]=$dateslist[$i];
        $stmt->execute($data);
        //既に予定があるか確認
        $select = $stmt->fetch(PDO::FETCH_ASSOC);
        //print ("<br> selctsql ");
        //var_dump($select);
        unset($data);
        /*
        if(isset($post["delete"])){
            $desql = "DELETE FROM zoom_schedule WHERE code = ?";
            $stmt = $dbh->prepare($desql);
            //print $post["regist"];
            $data[] = $post["regist"];
            $stmt ->execute($data);
    
            $dbh = null;
    
            print ("削除しました。");
            */
            
        if($_POST["regist"] == true){
            $dlsql = 'DELETE FROM schedule WHERE id = ?';
            $stmt = $dbh->prepare($dlsql);
            $data[] = $_POST["zoomid"];
        }

        if ($select == false){
            //中身がなければ登録
            //print $workarea[$work[$i]];
            //print "<br>";
            $sql = 'INSERT INTO `schedule` (`sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `memberid`) VALUES(?,?,?,?,?,?)';
            $stmt = $dbh->prepare($sql);
            $data[] = $dateslist[$i];
            $data[] = $workarea[$work[$i]];
            $data[] = $company[$i];
            $data[] = $person[$i];
            $data[] = $memo[$i];
            $data[] = $_SESSION["login_id"];
            //$data[] = $_SESSION['login'];
            //送信
            $stmt ->execute($data);
            //INSERT INTO `schedule` (`sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES (NULL, current_timestamp(), '2021-05-10', '在宅', '帰社会', '夕方会議', '開発', '12');
            $flag1 = 1;
            unset($data);
        }
        else{
            $stmt = NULL;
            
            //あれば更新
            $upsql = 'UPDATE schedule SET workarea=? , com_schedule=? , per_schedule=? , memo=?  WHERE memberid = ? AND sche_date = ? ';
            $stmt = $dbh->prepare($upsql);
            $data[] = $workarea[$work[$i]];
            $data[] = $company[$i];
            $data[] = $person[$i];
            $data[] = $memo[$i];
            $data[] = $_SESSION["login_id"];
            $data[] = $dateslist[$i];
            //var_dump($data);
            $stmt ->execute($data);
            //var_dump($stmt);
            unset($data);
            $flag2 = 1;
        }
    }
    /*
    $sql = 'INSERT INTO `schedule` ( `sche_date`, `workarea`, `com_schedule`, `per_schedule`, `memo`, `user`) VALUES(?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass;
    $stmt ->execute($data);
    */
    $dbh = null;
    if ($flag1 == 1 & $flag2 == 1){
        print '<h2>登録・更新</h2>';
        print '予定を登録・更新しました。 <br/>';
    }
    else if ($flag1 == 1){
        print '<h2>登録</h2>';
        print '予定を登録しました。 <br/>';
    }
    else{
        print '<h2>更新</h2>';
        print '予定を更新しました。 <br/>';
    }
    
    
    

/*

}

catch(Exception $e)
{
    
print "ただいま障害により大変ご迷惑をおかけしております。";
exit();
}
*/
?>
<html>
<form action="../demotop.html">
            <input type="submit" value="トップに戻る"class = "top">
        </form>

</html>
