<?php 
//try{


$testuser = "1";
$dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
$user = 'root';
$password = '0305';
$dbh = new PDO($dsn,$user,$password);
$dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//$upsql = 'UPDATE schedule SET workarea=? , com_schedule=? , per_schedule=? , memo=?  WHERE memberid = ? AND sche_date = ? ';
//$sql = 'INSERT INTO zoom_schedule(title,s_date,start_time,end_time,content,participant,memberid) VALUES(?,?,?,?,?,?,?)';
require_once("../common/common.php");
    $post = $_POST;
    $code = $post["regist"];
    //print $code;
    if (isset($post["update"])){
        //print_r($post);
        //print $post["title".$code];
        $upsql = "UPDATE zoom_schedule SET title = ?, start_time = ?, end_time = ?, content = ?,participant = ? WHERE code = ? ";
        $stmt = $dbh->prepare($upsql);
        $data[] = $post["title".$code];
        $data[] = $post["start_time".$code];
        $data[] = $post["end_time".$code];
        $data[] = $post["content".$code];
        $data[] = $post["participant".$code];
        $data[] = $code;
        $stmt ->execute($data);

        $dbh = null;
        print ("更新しました。");
    }
    if(isset($post["delete"])){
        $desql = "DELETE FROM zoom_schedule WHERE code = ?";
        $stmt = $dbh->prepare($desql);
        //print $post["regist"];
        $data[] = $post["regist"];
        $stmt ->execute($data);

        $dbh = null;

        print ("削除しました。");
        
    }

//}
/*
catch (Exception $r){

}*/
?>