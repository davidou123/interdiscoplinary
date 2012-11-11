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

ul, li {
	margin: 0;
	padding: 0;
	list-style: none;
}
#qaContent {
margin-left:50px;
	width: 500px;
}
#qaContent h3 {
	width: 500px;
	height: 22px;
	text-indent: -9999px;
}
#qaContent h3.qa_group_1 {	background: url(images/qa_group_1.png) no-repeat;}
#qaContent h3.qa_group_2 {	background: url(images/qa_group_2.png) no-repeat;}
#qaContent ul.accordionPart {	margin: 10px 10px 50px 30px;}
#qaContent ul.accordionPart li {	border-bottom: solid 1px #e3e3e3;	padding-bottom: 12px;	margin-top: 12px;}
#qaContent ul.accordionPart li .qa_title {
	background: url(images/icon_q_a.gif) no-repeat 0px 3px;
	padding-left: 28px;	color: #1186ec;	cursor: pointer;TEXT-ALIGN: left;}
#qaContent ul.accordionPart li .qa_title_on {	text-decoration: underline;}
#qaContent ul.accordionPart li .qa_content {	margin: 6px 0 0;
	background: url(images/icon_q_a.gif) no-repeat 0px -24px;	padding-left: 28px;	color: #666;}
-->
</style>
	<link rel="stylesheet" href="menu_style.css" type="text/css" />
<!--廣告圖片-->
<script type="text/javascript" src="jquery.js"></script>    
<script type="text/javascript" src="jquery.timers-1.2.js"></script>
<script type="text/javascript" src="jquery.galleryview-1.1.js"></script>
<script type="text/javascript" src="home-page-init.js"></script>
<!--廣告圖片-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> 

<script type="text/javascript"> 
	$(function(){
		// 幫 div.qa_title 加上 hover 及 click 事件
		// 同時把兄弟元素 div.qa_content 隱藏起來
		$('#qaContent ul.accordionPart li div.qa_title').hover(function(){
			$(this).addClass('qa_title_on');
		}, function(){
			$(this).removeClass('qa_title_on');
		}).click(function(){
			// 當點到標題時，若答案是隱藏時則顯示它；反之則隱藏
			$(this).next('div.qa_content').slideToggle();
		}).siblings('div.qa_content').hide();
	});
</script> 

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
			<BR><img border="0" src="images/qa.jpg" width="707" height="37" alt="常見問題Q&A"><BR><BR>
<div id="qaContent"> 
	<h3 class="qa_group_1">基本問題</h3> 
	<ul class="accordionPart"> 
	<?
	  	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  qa  where type='1' ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
       $question=$rows["question"];
       $answer=$rows["answer"];
	   	echo"	<li><div class='qa_title'>".$rows["question"]."</div> "
			."<div class='qa_content'>".$rows["answer"]."</div> 	</li> ";
	}
	
  }
  ?>
	</ul> 
	<h3 class="qa_group_2">學程修課問題</h3> 
	<ul class="accordionPart"> 
		<?
	  	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  qa  where type='2' ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
       $question=$rows["question"];
       $answer=$rows["answer"];
	   	echo"	<li><div class='qa_title'>".$rows["question"]."</div> "
			."<div class='qa_content'>".$rows["answer"]."</div> 	</li> ";
	}
	
  }
  ?>

	</ul> 
</div> 
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