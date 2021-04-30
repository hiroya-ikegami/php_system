

// ページを開いたときの処理
window.onload = function() {
    setCalendar();
  };
function setCalendar(yy,mm,dd){
    var step = 0;
    if(!mm&&!dd&&!yy){
        yy = new Date().getFullYear();
        mm = new Date().getMonth()+1;
        dd = new Date().getDate();
        //console.log(dd);
    }
//var dd = new Date();
    //Tue Apr 27 2021 14:33:32 GMT+0900 (日本標準時)

    sche_year.innerHTML =  yy;
    sche_month.innerHTML =  mm;
    sche_date.innerHTML = dd;
    //document.getElementById('month').textContent = dmonth;
    var dtoday = new Date().getDay();
    //var dd = new Date().getDate();
    //console.log(dd);

//あとで関数にする一週間分日付を表示するためのやつ
//step 次週で+7-7ができる仕様にする？
    var todaylist = [];
    var month_list = [];
    var month_end = new Date(yy, mm + 1, 0).getDate();

    console.log("月末"+month_end)
    if (dtoday == 1){
        for (let step; step<7; step++){
            var todaylist = [dd+step];
            console.log(dd+step);
        }
    }
   
    if (dtoday == 2){
        for(let step=-1; step<7; step++){
            todaylist.push(new Date().getDate()+step);
            console.log(new Date().getDate()+step);
        }
        //console.log(todaylist);

    }
    
    if (dtoday == 3){
        for (let step=-2; step<5; step++){
            ifdate = new Date().getDate()+step;
            if(ifdate > month_end){
                todaylist.push(ifdate-month_end);
                month_list.push(mm+1);
            }
            else {
                todaylist.push(new Date().getDate()+step);
                console.log(new Date().getDate()+step);
                month_list.push(mm);
            }
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
    console.log(todaylist);
    dateMON.innerHTML = todaylist[0];
    dateTUE.innerHTML = todaylist[1];
    dateWED.innerHTML = todaylist[2];
    dateTHU.innerHTML = todaylist[3];
    dateFRI.innerHTML = todaylist[4];
    dateSAT.innerHTML = todaylist[5];
    dateSUN.innerHTML = todaylist[6];
    //document.getElementById( "target" ).value = "SYNCER" ;
    document.getElementById("datepostMON").value = todaylist[0];
    document.getElementById("datepostTUE").value = todaylist[1];
    document.getElementById("datepostWED").value = todaylist[2];
    document.getElementById("datepostTHU").value = todaylist[3];
    document.getElementById("datepostFRI").value = todaylist[4];
    document.getElementById("datepostSAT").value = todaylist[5];
    document.getElementById("datepostSUN").value = todaylist[6];

}


//window.onload =  setCalender();
function lastweek(){
    if(step == 0){
     window.alert('過去の日程は入力できません');
    }
    else{
        checked= window.confirm('現在入力された予定はリセットされます。よろしいですか？');
    }
    if (checked  == true){

        setCalendar(dd-7);
        return true;
    }
        
    
    
}
//console.log(dd)
function nextweek(){
    checked= window.confirm('現在入力された予定はリセットされます。よろしいですか？');
    
    if (checked  == true){
        var lastdate = document.getElementById("daySUN".innerHTML);
        var yy = document.getElementById("sche?yaer".innerHTML);
        var mm = document.getElementById("sche_month".innerHTML);
        if(lastdate.length<2){
            setCalendar(yy,mm+1,lastdate+7);    
        }
        else{
            setCalendar(yy,mm,lastdate+7);
        }
        return true;
        
    }
        
}
