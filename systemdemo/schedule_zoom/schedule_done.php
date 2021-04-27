<?php 
try{
    require_once("../common/common.php");
    $post = $_POST;
    $staff_name = $post['name'];
    $staff_pass = $post['pass'];
    if($staff_name == "")
    {
        print("値がありません。");
    }

    $dsn = 'mysql:dbname=shop;host=localhost;charaset=utf8';
    $user = 'root';
    $password = '0305';
    $dbh = new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'INSERT INTO mst_staff(name,password) VALUES (?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass;
    $stmt ->execute($data);

    $dbh = null;

    print '<h2>登録</h2>';
    print $staff_name;
    print 'さんを追加しました。 <br/>';
}
catch(Exception $e)
{
print "ただいま障害により大変ご迷惑をおかけしております。";
exit();
}
?>