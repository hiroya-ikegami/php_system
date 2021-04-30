
<?php
try{
     $toYm = date( "Y-m" ) ;//2021-04-30:
     $todate = date("d");
     $end_date =  date ("Y-m-d",strtotime("+6 day"));//:2021-05-06
     $today = date("D");

     $end_month = (new DateTimeImmutable)->modify('last day of')->format('Y-m');//2021-04-30
     $dates = [];
     //$times = "+" .$i. "days";
     //$times_date =  
     //print $times_date;
    for ($i=0; $i<=6; $i++ )
    {
        $times = "+" .$i. "days";
        //$daysdate = "+" .$i. ""
        ${"dates".$i} = date ("Y-m-d",strtotime($times));
        ${"daysdate".$i} = date ("m/d",strtotime($times));
        print ${"dates".$i}."　　";
        print ${"daysdate".$i}."　　";
        //print (date ("Y-m-d",strtotime($times)));//
        //$dates += date ("Y-m-d",strtotime($times));
        //print (date ("Y-m-d",strtotime($times)));//:2021-05-06;
        //print $dates."→";
    }
    //print_r("hairetu".$dates);
    print "<br>";
     
     print ($todate."::".$end_date."==");
    

    $testuser = "123";
    $dsn = 'mysql:dbname=task_zoom;host=localhost;charaset=utf8';
    $user = 'root';
    $password = '0305';
    $dbh = new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         //SELECT * FROM fruit WHERE name IN("みかん","りんご");
         //'SELECT title  FROM zoom_schedule WHERE s_date IN ?,;
    $sqlpri = 'SELECT s_date,title,start_time,end_time  FROM zoom_schedule WHERE s_date IN ("'.$dates0.'","'.$dates1.'","'.$dates2.'","'.$dates3.'","'.$dates4.'","'.$dates5.'","'.$dates6.'")';
    print $sqlpri;
    $sql = 'SELECT s_date,title,start_time,end_time  FROM zoom_schedule WHERE s_date IN (?,?,?,??,?,?)';
    $stmt =$dbh->prepare($sqlpri);
    $stmt->execute();

    $dbh = null; 
}
catch(Exception $e)
{

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_zl.css">
    <title>zoomlist</title>
</head>
<body>
    <div id = "divall">
        <form action="demotop.html">
            <input type="submit" value="トップに戻る"class = "top">
        </form>
    <h1>ZOOM予定表</h1>
    <?php 
     //$todate = date( "Y-m-d" ) ; // 2015/12/12
     
    ?>
    <table>
        <thead>
        <tr><th id = "tabletime"></th><th class = "week"><?=$daysdate0?><br/>MON/月</th><th class = "week"><?=$daysdate1?><br/>TUE/火</th><th class = "week"><?=$daysdate2?><br/>WED/水</th><th class = "week"><?=$daysdate3?><br/>THU/木</th><th class = "week"><?=$daysdate4?><br/>FRI/金</th><th class = "week"><?=$daysdate5?><br/>SAT/土</th><th class = "week"><?=$daysdate6?><br/>SUN/日</th></tr>
        </thead>
        <?php
        //1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6,7 => 7
       
        $timelist = array("nine","ten","eleven","twelve","thirteen","fourteen","fifteen","sixteen","seventeen","eightteen");
        $timelist2 = array("nine"=>"9:00","ten"=>"10:00","eleven"=>"11:00","twelve"=>"12:00","thirteen"=>"13:00","fourteen"=>"14:00","fifteen"=>"15:00","sixteen"=>"16:00","seventeen"=>"17:00","eightteen"=>"18:00");
        $weeklist = array("MON","TUE","WED","THU","FRI","SAT","SUN");
        $s_time = 9;
        $cou = 0;
        foreach($timelist2 as $key =>$value){
            while(true)
            {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result == false)
                {
                    break;
                }
                //print ("日時:".$result['s_date']."  タイトル:".$result['title']."　開始時間: ".$result['start_time']."<br>");//17:14
                print_r ($result);

            }        
            ?>
            <tr>
                <td id = "time<?=$key?>"><?php print ($s_time.":00") ?>
                <?php

                ?>
                </td><!--日にち-->
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>"></td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>"></td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>"></td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>"></td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>"></td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>"></td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>"></td>
            </tr>
        <?php
            $s_time+=1;
            $cou = 0;
            
            }?>
    </table>
    <div class = "bottombutton">
        <input type="submit" value ="←前の週" class = "regist">
        <input type="submit" value ="zoom予約" class = "regist">
        <input type="submit" value ="次の週→" class = "regist">
    </div>
    
</div>
</body>
</html>
