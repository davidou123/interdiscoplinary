<?php
$id=$_GET["id"];
	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  qa  where id='$id' ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
       $id=$rows["id"];
       $type=$rows["type"];
       $question=$rows["question"];
       $answer=$rows["answer"];  
	   
	   if($type==1){$type_echo="<option selected value='1'>基本問題</option>	<option value='2'>學程修課問題</option>";}
	   else{$type_echo="<option  value='1'>基本問題</option>	<option value='2' selected>學程修課問題</option>";}
	}
  }

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>跨領域學程</title>
</head>

<body>

<h3>修改常見問題Q&A</h3>
<form method="POST" action="admin_qa_idf_save.php">
 <input name="id" type="hidden"  value="<?=$id?>"> 
這問題屬於: <select size="1" name="type1">
<?=$type_echo?>
	</select><BR><BR>
問題:<input type="text" name="question" size="60" value="<?=$question?>"><BR>
回答:<BR>
<textarea rows="20" name="answer" cols="55"><?=$answer?></textarea>
	
	<BR>
	<input type="submit" value="送出" name="B3"></p>
</form>

</body>

</html>