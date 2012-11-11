<?php
session_start();  // 啟動Session
 ob_start(); 
 require_once("function.php");
 $webconter= counter(); //網站計數器
if ($_SESSION["login_session"] != true)
   header("Location:index.php");
  if($_GET['which']){
  $which =$_GET['which'];$edit =$_GET['edit'];}else{$which="admin_news";}
  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>僑光科技大學跨領域學程</title>
<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="js/thickbox.js"></script> 
<link rel="stylesheet" href="thickbox.css" type="text/css" media="screen" />
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
.leftlink{background-image : url(images/icon.png) ;background-repeat : no-repeat;padding-left:35px;padding-bottom:10px;margin:0px 2px 0px 2px ;}
.leftlink a{text-decoration: none;}
.leftlink a:hover{position: relative; top: 1px; left: 1px;}
.pass{display:inline-block;width:150px;}
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
				
			<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=business_service'>商業服務實習學程</a></div>
			<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=rich_people'>財富管理人才學程</a></div>
			<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=global_manage'>全球運籌管理學程</a></div>
			<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=financial'>金融保險理財學程</a></div>
			<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=media'>人文多媒體學程</a></div>
			<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=secretary'>秘書專業學程</a></div>
						<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=teaching_chinese'>華語教學學程</a></div>
						<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=business_design'>商務會展設計學程</a></div>
						<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=business_management'>企業資源管理應用學分學程</a></div>
						<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=national'>國際物流證照學程</a></div>
						<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_model&edit=wisdom'>智慧系統應用學程</a></div>
						<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_qa'>Q&A </a></div>
						<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_upload'>檔案下載 </a></div>
						<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_ad'>首頁廣告 </a></div>
						<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_news'>最新消息 </a></div>
						<div  class="leftlink"onmouseover= 'this.style.backgroundColor= "#EEEEEE " ' onmouseout= 'this.style.backgroundColor= "transparent" ' ><a href='login.php?which=admin_password'>變更密碼 </a></div>
			<Br>

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
<BR>

 
 
 <?require_once($which.".php");?>

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