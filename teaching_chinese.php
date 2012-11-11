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
  
	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  inter  where name='teaching_chinese' ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
       $intro=$rows["intro"];
       $text=$rows["text"];
	}
	
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>僑光科技大學跨領域學程</title>
	<link rel="stylesheet" href="model.css" type="text/css" />
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
			<td height="30" width="743" valign="top" style="padding-left:10px">
						<table border="0" width="100%" cellspacing="0" cellpadding="0" style="margin-top:10px">
	<tr>
		<td width="160" valign="top" background="images/dot.png"  style="border-right-color : #DCDCDC;border-right-width: 1px; border-right-style: solid;"><img border="0" src="images/people.png" width="138" height="158" style="padding-left:10px"></td>
		<td style="padding:10px">
		<img border="0" src="images/teaching_chinese.png" width="532" height="33" alt="華語教學學程">
		<img border="0" src="images/tem.png" width="171" height="123" align="left">
<BR><BR><p style="letter-spacing: 2pt;line-height: 150%;color:#333;font-size: 11pt;"class="introduction">   
<?=$intro;?></p> </td>
	</tr>
</table>
         <BR><BR>  
<?=$text;?>		 
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