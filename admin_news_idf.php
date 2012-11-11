<?php
$id=$_GET["id"];
	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  news  where id='$id' ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
       $id=$rows["id"];
       $title=$rows["title"];
       $content=$rows["content"];
       $date=$rows["date"];
	}
	
  }

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>僑光科技大學跨領域學程</title>
<!-- TinyMCE -->
<script type="text/javascript" src="js/tinymcec/jscripts/tiny_mce.js"></script>
<script type="text/javascript" src="js/tinymcec/tinymac.js"></script>
<!-- /TinyMCE -->
</head>

<body>

<h3>修改最新消息</h3>
<form method="POST" action="admin_news_idf_save.php">
 <input name="id" type="hidden"  value="<?=$id?>"> 
標題:<input type="text" name="title" size="40" value="<?=$title?>">
	<p><textarea rows="20" name="content" cols="50"><?=$content?></textarea>
	
	<BR>
	<input type="submit" value="送出" name="B3"></p>
</form>

</body>

</html>