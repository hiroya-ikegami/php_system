var mm;
var dd;
function setCalender(dd){
    var step = 0;
    console.log(dd);
    if(!mm&&!dd){
        mm = new Date().getMonth()+1;
        dd = new Date().getDate();

    }
//var dd = new Date();
    //Tue Apr 27 2021 14:33:32 GMT+0900 (日本標準時)
    console.log(dd);
    var dmonth = new Date().getMonth()+1;
    var title_month = document.getElementById("sche_title");
    title_month.innerHTML = "予定入力　" + dmonth +"月";
    //document.getElementById('month').textContent = dmonth;
    var dtoday = new Date().getDay();
    console.log(dd);

//あとで関数にする一週間分日付を表示するためのやつ
//step 次週で+7-7ができる仕様にする？
    var todaylist = [];
    

    if (dtoday == 1){
        for (let step; step<7; step++){
            var todaylist = [dd+step];
            console.log(dd+step);
        }
    }
   
    if (dtoday == 2){
        for (let step=-1; step<7; step++){
            todaylist.push(dd+step);
            console.log(dd+step);
        }
        //console.log(todaylist);

    }
    
    if (dtoday == 3){
        for (let step=-2; step<7; step++){
            var todaylist = [dd+step];
            console.log(dd+step);
        }
    }
    if (dtoday == 4){
        for (let step=-3; step<7; step++){
            var todaylist = [dd+step];
            console.log(dd+step);
        }
    }
    
    if (dtoday == 5){
        for (let step=-4; step<7; step++){
            var todaylist = [dd+step];
            console.log(dd+step);
        }
    }
    
    if (dtoday == 6){
        for (let step=-5; step<7; step++){
            var todaylist = [dd+step];
            console.log(dd+step);
        }
    }
    
    if (dtoday == 7){
        for (let step=-6; step<7; step++){
            var todaylist = [dd+step];
            console.log(dd+step);
        }
    }
    dateMON.innerHTML = todaylist[0];
    dateTUE.innerHTML = todaylist[1];
    dateWED.innerHTML = todaylist[2];
    dateTHU.innerHTML = todaylist[3];
    dateFRI.innerHTML = todaylist[4];
    dateSAT.innerHTML = todaylist[5];
    dateSUN.innerHTML = todaylist[6];
}
window.onload =  setCalender();
function lastweek(){
    if(step == 0){
     window.alert('過去の日程は入力できません');
    }
    else{
        checked= window.confirm('現在入力された予定はリセットされます。よろしいですか？');
    }
    if (checked  == true){

        setCalender(dd-7);
        return true;
    }
        
    
    
}
//console.log(dd)
function nextweek(){
    checked= window.confirm('現在入力された予定はリセットされます。よろしいですか？');
    if (checked  == true){
        var lastdate = document.getElementById("daySUN");
        setCalender(yy,mm,lastdate+1);
        return true;
    }
        
}
