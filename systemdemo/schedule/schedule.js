var today = new Date();
var dmonth =  today.getMonth()+1;
var title_month = document.getElementById("sche_title");
title_month.innerHTML = "予定入力　" + dmonth +"月";
//document.getElementById('month').textContent = dmonth;
var dtoday = today.getDay();
var dtodate = today.getDate()
console.log(dtoday)
//あとで関数にする一週間分日付を表示するためのやつ
//step 先週や次週で+7-7ができる仕様にする？
var step = 0;

if (dtoday == 1){
    for (let step; step<7; step++){
        var todaylist = [dtodate+step];

        console.log(dtodate+step);
        
    }

    //console.log(todaylist);
}
var todaylist = [];
if (dtoday == 2){
    for (let step=-1; step<7; step++){
        todaylist.push(dtodate+step);

        console.log(dtodate+step);
    }
    //console.log(todaylist);
    dateMON.innerHTML = todaylist[0];
    dateTUE.innerHTML = todaylist[1];
    dateWED.innerHTML = todaylist[2];
    dateTHU.innerHTML = todaylist[3];
    dateFRI.innerHTML = todaylist[4];
    dateSAT.innerHTML = todaylist[5];
    dateSUN.innerHTML = todaylist[6];
}

if (dtoday == 3){
    for (let step=-2; step<7; step++){
        var todaylist = [dtodate+step];
        console.log(dtodate+step);
    }
    //console.log(todaylist);
}
if (dtoday == 4){
    for (let step=-3; step<7; step++){
        var todaylist = [dtodate+step];
        console.log(dtodate+step);
    }
    //console.log(todaylist);
}

if (dtoday == 5){
    for (let step=-4; step<7; step++){
        var todaylist = [dtodate+step];
        console.log(dtodate+step);
    }
    //console.log(todaylist);
}

if (dtoday == 6){
    for (let step=-5; step<7; step++){
        var todaylist = [dtodate+step];
        console.log(dtodate+step);
    }
    //console.log(todaylist);
}

if (dtoday == 7){
    for (let step=-6; step<7; step++){
        var todaylist = [dtodate+step];
        console.log(dtodate+step);
    }
    //console.log(todaylist);
}

