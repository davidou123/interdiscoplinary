<?
header("Content-type: text/html; charset=utf-8");
$filename=null;
$type=null;
$filename=$_GET['filename'];
$type=$_GET['type'];
$which=$_GET['which'];
	require_once("SQLconnection.php");  
	        // 建立SQL字串
	  $sql = "DELETE FROM upload WHERE filename = '$filename'   LIMIT 1";
	  // 建立MySQL資料庫連結
    $link = create_connection();
      // 執行SQL指令
      mysql_query($sql);
      mysql_close($link);
	  echo"<BR>執行刪除完成<BR><BR><BR><BR></b>";
//刪除區----	

	  $filenameBIG5=iconv("utf-8","big5",$filename);
@unlink ("upload/$filenameBIG5");




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="refresh" content="0 ;URL=login.php?which=admin_upload" />
</head>
<body>

<a href="login.php?which=admin_upload">點我回到管理頁面</a>
</body>
</html>