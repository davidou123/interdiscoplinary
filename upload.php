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
.news_table{padding:8px 0px 8px  30px;font-size: 10pt; color:#808080;}
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
			<td height="30" width="743" valign="top" style="padding-left:10px"><BR>
<img border="0" src="images/download.jpg" width="707" height="37" alt="檔案下載"><BR><BR>
<img border="0" src="images/download2.png" width="700" height="130">
						<table border="0" width="90%" cellspacing="0" cellpadding="0" style="border-top : 2px solid #C6E7BA;border-bottom : 2px solid #C6E7BA;margin:0px 0px 0px 13px ;TEXT-ALIGN: left;">
						<tr class='trclass' >
					<td class='news_table'  bgcolor="#EEEEEE">檔案下載
				</td>
					<td class='news_table'  bgcolor="#EEEEEE">上傳日期</td></tr>
	<?
	  	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  upload  ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
echo "<tr class='trclass'>"
					."<td class='news_table'>"
					."<img border='0' src='images/ico_2.png' width='20' height='15'><a href='upload/".$rows["filename"]."'>".$rows["name"]."</a></td>"
					."<td class='news_table'>".$rows["date"]."</td></tr>";
	}
	
  }
  ?>
</table><BR>
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