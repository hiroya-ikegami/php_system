<?php
session_start();
session_regenerate_id(true);

if(!isset($_SESSION["login"])){
    print'ログインされていません。<br/>';
    print'<a href="./login/login.html">ログイン画面へ</a><br>';
    print'登録がまだの方<br/>';
    print'<a href="../demosystem/index_html">登録画面へ</a>';
    exit();
}
$message=$_SESSION['login_name']."さんようこそ";

$message=htmlspecialchars($message);
print ($message)
?>

<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitonal//EN">
<html>
<head>
<mate charset=UTF-8">
<title>demo</title>
	<link rel="stylesheet" href="css/demotopstyle.css">
<link rel="stylesheet" href="css/calendar.css">

<script type="text/javascript" src="js/calendar.js"></script>

</head>
<body bgcolor="#bbe2f1">

<div id="page">
<header id="pageTop">

<p class="top">トップ画面</p>

</header>
</div>

<div id="pageBody">
<header id="pageBodyMain">

<table>
<tr>
<td><p class="btn7"><a href="logout.html">ログアウト</a></td>

<td><p class="btn6"><a href="setei.html">設定</a></td>

</tr>
</table>
<br/>
<table>
<tr>

<td class = "left_btn"><p class="btn3"><a href="./schedule/member_schedulelist.php">社員の予定</a>

<p class="btn2"><a href="./schedule/schedule_form.php">予定入力</a>

<p class="btn4"><button id="previous" onclick="previous()"><a >前の月</a></button></td>

<td>
 <div  class="container-calendar">
          <h4 id="monthAndYear"></h4>
          <div class="button-container-calendar">
          </div>
          
          <table class="table-calendar" id="calendar" data-lang="ja">
              <thead id="thead-month"></thead>
              <tbody id="calendar-body"></tbody>
          </table>
          
          <div class="footer-container-calendar">
              <label for="month">日付指定：</label>
              <select id="month" onchange="jump()">
                  <option value=0>1月</option>
                  <option value=1>2月</option>
                  <option value=2>3月</option>
                  <option value=3>4月</option>
                  <option value=4>5月</option>
                  <option value=5>6月</option>
                  <option value=6>7月</option>
                  <option value=7>8月</option>
                  <option value=8>9月</option>
                  <option value=9>10月</option>
                  <option value=10>11月</option>
                  <option value=11>12月</option>
              </select>
              <select id="year" onchange="jump()"></select>
          </div>
    </div>

    <script src="js/calendar.js" type="text/javascript"></script>


</p></td>

<td><p class="h">ZOOM</p>
<p class="btn"><a href="./schedule_zoom/schedulezoom_form.html" >予約</a></p>
<p class="btn1"><a href="./schedule_zoom/demozoom_list.php">予約表</a>
<p class="btn5"><button id="next" onclick="next()"><a>次の月</a></button></td>

</tr>
</table>

</header>
</div>

</body>
</html>