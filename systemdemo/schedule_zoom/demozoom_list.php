
<?php
try{
     $toYm = date( "Y-m" ) ;//2021-04-30:
     $todate = date("d");

     $end_datefull =  date ("Y-m-d",strtotime("+6 day"));//:2021-05-06
     //$end_date = substr($end_datefull,-2);
     $end_date = date ("d",strtotime("+6 day"));//
     $today = date("D");

     $end_month = (new DateTimeImmutable)->modify('last day of')->format('Y-m');//2021-04-30
     $dates = [];
     $dateslist =[];
     //$times = "+" .$i. "days";
     //$times_date =  
     //print $times_date;

    
    for ($i=0; $i<=6; $i++ )
    {
        $times = "+" .$i. "days";
        ${"dates".$i} = date ("Y-m-d",strtotime($times));
        ${"daysdate".$i} = date ("m/d",strtotime($times));
        $dateslist[] = date ("m/d",strtotime($times));
        //print ${"dates".$i}."　　";
        print ${"daysdate".$i}."　　";
        
    }
    print_r($dateslist);
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
        //$timelist = array("nine","ten","eleven","twelve","thirteen","fourteen","fifteen","sixteen","seventeen","eightteen");
        $timelist2 = array("nine"=>"9:00","ten"=>"10:00","eleven"=>"11:00","twelve"=>"12:00","thirteen"=>"13:00","fourteen"=>"14:00","fifteen"=>"15:00","sixteen"=>"16:00","seventeen"=>"17:00","eightteen"=>"18:00");
        $weeklist = array("MON","TUE","WED","THU","FRI","SAT","SUN");
        $weeklist2 =[];
        
        $s_time = 9;
        $cou = -1;
        $re = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        //print($re);
        var_dump($re);
        function calender_event($re,$s_time,$dateslist,$cou){
            foreach($re as  $value){
                if(intval(substr($value["start_time"],0,2))==$s_time){
                    //print "true";
                    if (substr($value["s_date"],-5,5 )==str_replace("/","-",$dateslist[$cou])){
                    //print "true";
                    //print ($cou);
                    print $value["title"];
                    print "<br>";
                    }
                    else {
                        //print "予定無";
                        //print ($cou);
                    }
                }
            }
        }
        foreach($timelist2 as $key =>$value){     
            ?>
            <tr>
                <td id = "time<?=$key?>"><?php print ($s_time.":00") ?>
                <?php
                //Array ( [0] => 05/06 [1] => 05/07 [2] => 05/08 [3] => 05/09 [4] => 05/10 [5] => 05/11 [6] => 05/12 )
                //Array ( [s_date] => 2021-05-06 [title] => 朝礼 [start_time] => 09:07 [end_time] => 09:30 )

                ?>
                </td><!--日にち 一週間分の9:00から予定表示-->
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>">
                    <?php calender_event($re,$s_time,$dateslist,$cou);?>
                </td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>">
                    <?php calender_event($re,$s_time,$dateslist,$cou);?>
                </td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>">
                    <?php calender_event($re,$s_time,$dateslist,$cou);?>
                </td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>">
                    <?php calender_event($re,$s_time,$dateslist,$cou);?>
                </td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>">
                    <?php calender_event($re,$s_time,$dateslist,$cou);?>
                </td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>">
                    <?php calender_event($re,$s_time,$dateslist,$cou);?>
                </td>
                <td id = "<?=$key?>_<?=$weeklist[$cou]; $cou +=1;?>">
                    <?php calender_event($re,$s_time,$dateslist,$cou);?>
                </td>
            </tr>
        <?php
            $s_time+=1;
            $cou = -1;
            
            }?>
    </table>
    <div class = "bottombutton">
        <input type="submit" value ="←前の週" class = "regist">
        <form action="./schedulezoom_form.html">
        <input type="submit" value ="zoom予約" class = "regist">
        </form>
        <input type="submit" value ="次の週→" class = "regist">
    </div>
    
</div>
</body>
</html>
