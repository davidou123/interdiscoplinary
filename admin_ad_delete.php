<?
header("Content-type: text/html; charset=utf-8");
$filename=null;
$type=null;
$filename=$_GET['filename'];
$filenameBIG5=iconv("utf-8","big5",$filename);
@unlink ("ad/$filenameBIG5");




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="refresh" content="0 ;URL=login.php?which=admin_ad" />
</head>
<body>

<a href="login.php?which=admin_ad">點我回到管理頁面</a>
</body>
</html>