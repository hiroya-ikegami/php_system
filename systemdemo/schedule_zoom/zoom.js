function check(){
    var flag =0;

    if(document.zoomform.title.value == ""){
        flag = 1;
    }
    else if(document.zoomform.calender.value ==""){
        flag = 1;
    }
    else if(document.zoomform.start_time.value ==""){
        flag = 1;
    }
    else if(document.zoomform.end_time.value ==""){
        flag = 1;
    }
    console.log(flag);
    if (flag){
        window.alert('必須項目に入力してください。')
        return false;
    }
    else{
        window.alert('ok')
        return true;
     }
}