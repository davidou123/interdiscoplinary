<?php
//檔案上傳
if ($_FILES["uploadedfile"]["size"]!=0) {

$filename_original=$_FILES['uploadedfile']['name'];
$filename2=rand(100, 999).$filename_original;
$filenameBIG5=iconv("utf-8","big5",$filename2); //因為檔名只能big5 所以要轉碼才能當檔名

move_uploaded_file($_FILES["uploadedfile"]['tmp_name'], "upload/$filenameBIG5");
    echo $_FILES['uploadedfile']['name']." <font face='arial' size='2'><BR>檔案上傳成功 ! 檔案型態：$uploadedfile_type ";
    echo "檔案大小：";
    printf("%.2f",$uploadedfile_size/1024);
    echo "  KB <BR>";
	//print_r($_FILES['uploadedfile']); //可以知道這個陣列有哪些可用的資訊
/*要破除檔案大小限制 設定php.ini的 post_max_size 與 upload_max_filesize*/		


	require_once("SQLconnection.php");
	$link = create_connection();
	$filename=$filename2; // 實際完整檔案名稱  如: 576實習日誌.doc
	$filename_original=explode(".", $filename_original);
	$name=$filename_original[0];//檔案名稱 如:實習日誌
		$date		=date("Y-m-d");
			$content_person=$_SESSION["usrname"];
	// 建立SQL指令字串
      $sql="INSERT INTO upload(name,date,filename)".
           " VALUES('".$name."','".$date."','".$filename."')";
      mysql_query($sql) or die("SQL字串執行錯誤!<br>");


	}
 
$_FILES=null;
$filename2=null;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>上傳範例</title>

</head>

<body>

<div align="center">
	<table border="0" width="70%" >
		<tr><td>
<p align="center"><b><font size="5">檔案上傳</font></b></p>
	<table border="0" width="95%" cellspacing="0" cellpadding="0" id="table1" bgcolor="#F1F7F7">
		<tr><td><b>檔案上傳<br></b></td>		</tr>
		<tr><td style="padding-left: 10px">
			<font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
請選擇你要上傳的檔案即可</font></b></td>
		</tr>
	</table>
	<BR><BR><BR>
	<form method="post" enctype="multipart/form-data" action ="admin_upload_upload.php">


<HR>

<input type = "file" name="uploadedfile" size="50">
<input type = "hidden" name = "max_file_size" value="188743680">

<BR><BR><BR>
<input type="submit" value="送出" name="submit">
</form>

</td>
		</tr>
	</table>
</div>


</body>

</html>
