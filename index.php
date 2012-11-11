<?
session_start();  // 啟動Session
 ob_start(); 
$error="";
 require_once("function.php");
 $webconter= counter(); //網站計數器
if (isset($_POST["usrname"]))
{

$usrname="";
$password="";
$usrname=$_POST["usrname"];
$password=$_POST["password"];
 require_once("SQLconnection.php");


// 建立MySQL資料庫連結
    $link = create_connection();
// 建立SQL指令字串
$sql = "SELECT * FROM employee WHERE password='".$password."' AND usrname='".$usrname."'";
$result = mysql_query($sql); // 執行SQL指令
// 是否有文章
if (mysql_num_rows($result) != 0)
{
//登入成功
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) {
        $_SESSION["login_session"] = true;   //把$_SESSION["login_session"]寫為真 用來判斷是否登入成功
  	  $_SESSION["usrname"]=$usrname;     //紀錄登入者是誰
	  $_SESSION["nickname"]=$rows["nickname"];

	    header("Location:login.php");  //跳轉到系統內
     }
}else{
$error="<b><font size='2' color='#FF0000'>OOPS您輸入錯誤溜</font></b>";//登入失敗
}
  mysql_free_result($result);
  }
  
  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="僑光科技大學 跨領域學程" />
<meta namge="description" content="僑光科技大學 跨領域學程網站。" />
<meta name="author" content="davidou">
<title>僑光科技大學跨領域學程</title>
<style type="text/css">
<!--
body,form,h1,ul {
padding: 0; margin: 0;
}
h1,h2,h3,h4,h5,h6 {
font-weight: normal;
font-size: 100%;
}
.footer{background-image : url(images/footer.png);background-repeat : repeat-x;font-size: 10pt; color:#808080;padding:5px 0px 0px 10px}
.menutable_top{color: #fff;background-repeat : no-repeat;background-image : url(images/memutop.png);background-position :top  left;height :6px;width:196px;margin-bottom:-3px;margin-top:5px}
.menutable_bottom{color: #fff;background-repeat : no-repeat;background-image : url(images/memubottom.png);background-position : bottom left;height :10px;width:196px;}
.menutable{padding-left:5px;width: 196px; background-image : url(images/memucent.png);background-position :  left;margin-bottom:-3px}

.panel{
width: 720px; height: 180px; position: absolute; top: 0px; left: 0px; overflow-x: hidden; overflow-y: hidden; background-color: white; display: none;   }
.galleryview{width:720px; height: 180px;position: relative;  visibility: visible;background-color: white;  }
.news_table{padding:8px 0px 8px  0px;font-size: 10pt; color:#808080;}
  .trclass{background: url(images/line.gif) repeat-x;background-position:bottom;} 
.counter{padding:20px 0px 20px 0px ;  text-align: center;color:#808080;font-size: 10pt;font-weight: bold;}
input.input{
	width:110px;
	padding-left:5px;
	border-style: solid;
	border-width: 1px;
	border-color: #D2D2D2;
	color: #AAA;
}
-->
</style>
	<link rel="stylesheet" href="menu_style.css" type="text/css" />
<!--廣告圖片-->
<script type="text/javascript" src="jquery.js"></script>    
<script type="text/javascript" src="jquery.timers-1.2.js"></script>
<script type="text/javascript" src="jquery.galleryview-1.1.js"></script>
<script type="text/javascript" src="home-page-init.js"></script>
<!--廣告圖片-->
</head>

<body>

<div align="center">
	<table border="0" width="960" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="2">
			<img border="0" src="images/banner.png" width="960" height="187"></td>
		</tr>
		<tr>
			<td colspan="2">
			<?require_once("model_nav.php");?>
			</td>
		</tr>
		<tr>
			<td height="30" width="207" valign="top" bgcolor="#F2F2F2" style="padding: 5px 10px 5px 10px">
			
			<img border="0" src="images/login.png" width="180" height="21" alt="會員登入"><BR>
			<div class="menutable_top" >.</div>
			<div class="menutable"  >

<?require_once("model_login.php");?>
　</div>
			<div class="menutable_bottom">.</div>
			<BR>
			<img border="0" src="images/link.png" width="180" height="21" alt="相關連結"><BR>
			<div class="menutable_top" >.</div>
			<div class="menutable"  >
			<img  border="0" src="images/edugov.png" width="176" height="41" alt="教育部全球資源網">
			<img style="margin-top:7px"border="0" src="images/edugov2.png" width="175" height="41"alt="技職校院課程資源網">
			<img style="margin-top:7px" border="0" src="images/edugov3.png" width="175" height="41"alt="教育部技職司資訊傳播網">
			<img style="margin-top:7px"border="0" src="images/edugov4.png" width="176" height="41"alt="教育部產學做資訊網">
			<img style="margin-top:7px"border="0" src="images/edugov5.png" width="176" height="42"alt="教育部大專畢業生至職場就業資訊網">

</div>
			<div class="menutable_bottom">.</div>	
<BR>


<img border="0" src="images/counter.png" width="180" height="21" alt="計數器"><BR>			
<div class="menutable_top" >.</div>
<div class="menutable counter"  >				
						累計人數: <?=$webconter[0]?><br>今日人數: <?=$webconter[1]?>
												</div>
<div class="menutable_bottom">.</div>	
			<BR><BR><BR>
			</td>
			<td height="30" width="743" valign="top" style="padding-left:10px"><div id="hero-home-slideshow" class="galleryview" >
<?php
if ($handle = opendir("./ad")) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
			echo"<div class='panel' ><img src='ad/$file' width='720' height='180' alt='跨領域學程' title='跨領域學程'></div>";
        }
    }
    closedir($handle);
}
?>

	   </div>
<BR>
<img border="0" src="images/news.jpg" width="707" height="37" alt="最新消息"><br><br>
			<table border="0" width="95%" cellspacing="0" cellpadding="0" style="margin-left:20px;border-top : 3px solid #BCE8F7;border-bottom : 3px solid #BCE8F7;margin-bottom:20px;TEXT-ALIGN: left;">

<?php
 $per = 10; //每頁顯示項目數量 
$count_page= count_page($_GET["page"],10);   // (顯示第幾頁,每頁頁數)
	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  news LIMIT $count_page[start],$per ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
echo "<tr class='trclass'>"
					."<td class='news_table'>"
					."<img border='0' src='images/ico_1.gif' width='19' height='11'><a href='news.php?id=".$rows["id"]."'>".$rows["title"]."</a></td>"
					."<td class='news_table'>".$rows["date"]."</td></tr>";


					}
	
  }
 
?>
			</table>
 
 
 				<div style="width :700px;font-size: 11pt;color:#333333" ><p align="center">
			<?
			  //顯示頁數
			  $page="page: ";
   for($i=1;$i<=$count_page[pages];$i++) {
   
	if(!$_GET["page"]){$_GET["page"]=1;$page="";}  //如果沒有選擇頁面 預設開啟第一頁

   if($i==$_GET["page"]){$page.= "[ $i ]";}else{   //顯示頁數
    $page.= ' <a href="?page='.$i.'">' . $i . '</a> '; }
	
	if($count_page[pages]==1){$page="";}  //如果只有一頁的話 就不要顯示了 等到多頁後在出現
} 
echo $page;
?></p></div>	

			<p><BR><BR><BR>　</td>
		</tr>
		<tr>
			<td colspan="2" class="footer"><p align="center">

			 僑光科技大學, 台灣 40721 台中市西屯區僑光路 100 號<br> &copy; 2011 Overseas Chinese University. All rights reserved. Powered by davidou</p></td>
		</tr>
	</table>
</div>

</body>

</html>