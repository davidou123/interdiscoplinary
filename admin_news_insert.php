<?php
session_start();  // 啟動Session
if ($_POST['title'] != "" ) {
echo "新增完成";
	require_once("SQLconnection.php");
	$link = create_connection();
		$date		=date("Y-m-d");
			$content_person=$_SESSION["usrname"];
	// 建立SQL指令字串
      $sql="INSERT INTO news(title,content,date,content_person)".
           " VALUES('".$title."','".$content."','".$date."','".$content_person."')";
      mysql_query($sql) or die("SQL字串執行錯誤!<br>");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>僑光科技大學 跨領域學程</title>
<!-- TinyMCE -->
<script type="text/javascript" src="js/tinymcec/jscripts/tiny_mce.js"></script>
<script type="text/javascript" src="js/tinymcec/tinymac.js"></script>
<!-- /TinyMCE -->
</head>

<body>

<h3>修改最新消息</h3>
<form method="POST" action="admin_news_insert.php">

標題:<input type="text" name="title" size="40" value="">
	<p><textarea rows="20" name="content" cols="50"></textarea>
	
	<BR>
	<input type="submit" value="送出" name="B3"></p>
</form>

</body>

</html>