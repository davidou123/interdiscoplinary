<p><img border="0" src="images/news.jpg" width="707" height="37" alt="最新消息"></p><BR>
<div  class="buttomlink">
	<a href='admin_news_insert.php?&keepThis=true&TB_iframe=true&height=630&width=700' class='thickbox'>發布最新消息</a></div>
<BR>
			<table border="0" width="90%" cellspacing="0" cellpadding="0" style="float:left;border-top : 2px solid #C6E7BA;border-bottom : 2px solid #C6E7BA;TEXT-ALIGN: left;">

			<?php
	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  news  ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
echo "<tr class='trclass'>"
					."<td class='news_table'>"
					."<img border='0' src='images/ico_1.gif' width='19' height='11'>".$rows["title"]."</td>"
					."<td class='news_table'>".$rows["date"]."</td>"
					."<td class='news_table'><a  href='admin_news_idf.php?id=".$rows["id"]." &keepThis=true&TB_iframe=true&height=630&width=700' class='thickbox'>修改</a> <a href='admin_news_delconfm.php?which=admin_news&id=".$rows["id"]."'>刪除</a></td></tr>";


					}
	
  }
?>
			</table>	

