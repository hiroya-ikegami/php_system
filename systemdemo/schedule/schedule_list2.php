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
<?php 
$page_flag = 0;

if(!empty($_POST['btn_submit'])){
    $page_flag = 1;
    print ("submit!!!");
}
?>
<?php
#単語チェック処理の関数用
require_once('../common/common.php');
$post = sanitaize($_POST);

$work = array();
$person = array();
$memo = array();
$workarea = array("出社","在宅","その他","休日");

$work = array($post['workMON'] , $post['workTUE'],$post['workWED'],$post['workTHU'],$post['workFRI'],$post['workSAT'],$post['workSUN']);
$person = array($post['personMON'] , $post['personTUE'],$post['personWED'],$post['personTHU'],$post['personFRI'],$post['personSAT'],$post['personSUN']);
$memo = array($post['memoMON'] , $post['memoTUE'],$post['memoWED'],$post['memoTHU'],$post['memoFRI'],$post['memoSAT'],$post['memoSUN']);
$company = array($post['companyMON'] , $post['companyTUE'],$post['companyWED'],$post['companyTHU'],$post['companyFRI'],$post['companySAT'],$post['companySUN']);
$_SESSION["work_data"] = $work;
$_SESSION["person_data"] = $person;
$_SESSION["memo_data"] = $memo;
$_SESSION["company_data"] = $company;
$dateslist = $_SESSION["dateslist_data"];
$dateslooklist = $_SESSION["dateslooklist_data"];
var_dump($work);
print_r($work);

?>
<?php 
$ym = (isset($get));
//日付取得 
$toYm = date( "Y-m-d" ) ;//2021-05-07:
//print "今日".$toYm."<br>";
//0123456 5
$targetweekday = date("w",strtotime($toYm));
//print $targetweekday."<br>";
$dateslist =[];
$monday = date("Y-m-d",strtotime('last monday'));
//print "月曜日".$monday."<br>";
//月曜日から一週間の日程取得
//print_r($dateslist);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_yf.css">
    <title>入力確認</title>
</head>
<body>
    <div id = "divall">
        <form action="../demotop.html">
            <input type="submit" value="トップに戻る"class = "top">
        </form>
    <form action="./schedule_done.php" method="post">
    <h1 >予定確認画面　<span><?=date("Y")?></span>年<span ><?=date("m")?></span>月<span><?=date("d")?></span>日</h1>    <table>
        <thead>
        <tr><th>日</th><th>曜日</th><th>勤務場所</th><th >社内予定</th><th class="leftpadding">個人予定</th><th class = "leftpadding">メモ</th></tr>
        </thead>
        <?php
        //1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6,7 => 7
        $daylist = array ( "MON"=>0 ,"TUE"=>1,"WED"=>2,"THU"=>3,"FRI"=>4,"SAT"=>5,"SUN"=>6);
        //$weeklist = array("MON","TUE","WED","THU","FRI","SAT","SUN");
        //foreach($weeklist as $value){
        //$daylist = array ( "MON"=>1 ,"TUE"=>2,"WED"=>3,"THU"=>4,"FRI"=>5,"SAT"=>6,"SUN"=>7);
            $cou = 0;
            foreach($daylist as $key =>$value){ ?>
                <?php 
                //print $cou;
                $registarea = $work[$cou];
                print $registarea;
                ?>
                <tr>
                    <td id = "date<?=$key?>"><?=$dateslooklist[$value]?></td>
                    <td><?=$key?></td>
                
                <td><?=$workarea[$registarea-1] ?></td>
                <td><?=$company[$cou]?></td>
                <td><?=$person[$cou]?></td>
                <td><?=$memo[$cou]?></td>
                </tr>
                <?php $cou +=1; }?>
    </table>

        <div class = "bottombutton" onsubmit="">
        <input type="submit" name = "btn_submit" value ="登録" class = "regist" id ="reg_check">
    </form>
    </div>
</div>
<script src="../schedule.js"></script>
</body>
</html>