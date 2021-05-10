<?php 
//年計算
function gengo($seireki)
{  
    $gengo = "明治";
  
if(1912<=$seireki && $seireki<=1925)
  {
    $gengo = "大正";
  
  }
  if(1926<=$seireki && $seireki<=1988)
  {
    $gengo = "昭和";
  }
  if(1989<=$seireki && $seireki<=2019)
  {
    $gengo = "平成";
  }
  if(2020<=$seireki)
  {
    $gengo = "令和";
  }

  return ($gengo);
}
//POST変換
function sanitaize($before)
{
    foreach($before as $key => $value)
        {
            $after[$key] = htmlspecialchars($value,ENT_QUOTES,'UTF-8') ;
        }
    return $after;
}

function pulldown_year()
{
print'<select name="year" id="">';
  print'<option value="2017">2017</option>';
  print'<option value="2018">2018</option>';
  print'<option value="2019">2019</option>';
  print '<option value="2020">2020</option>';
  print '<option value="2021">2020</option>';
print '</select>';
}
function pulldown_month()
{
print '<select name="month" id="">';
  print '<option value="01">01</option>';
  print '<option value="02">02</option>';
  print '<option value="03">03</option>';
  print '<option value="04">04</option>';
  print '<option value="05">05</option>';
  print '<option value="06">06</option>';
  print '<option value="07">07</option>';
  print '<option value="08">08</option>';
print '</select>';
}
function pulldown_day()
{
print '<select name = "day">';
  print '<option value="01">01</option>';
  print '<option value="16">16</option>';
print '</select>';
}
?>
