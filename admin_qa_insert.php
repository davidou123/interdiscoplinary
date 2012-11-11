<?php
session_start();  // 啟動Session
if ($_POST['question'] != "" ) {
echo "新增完成";
	require_once("SQLconnection.php");
	$link = create_connection();
	$type	= htmlspecialchars($_POST["type1"]);
	$question	= htmlspecialchars($_POST["question"]);
	$answer			= htmlspecialchars($_POST["answer"]);

	// 建立SQL指令字串
      $sql="INSERT INTO qa(type,question,answer)".
           " VALUES('".$type."','".$question."','".$answer."')";
      mysql_query($sql) or die("SQL字串執行錯誤!<br>");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>跨領域學程</title>
</head>

<body>

<h3>新增Q&A問題</h3>
<form method="POST" action="admin_qa_insert.php">
這問題屬於: <select size="1" name="type1">
<option selected value='1'>基本問題</option>	<option value='2'>學程修課問題</option>
	</select><BR><BR>
問題:<input type="text" name="question" size="60" value="<?=$question?>"><BR>
回答:<BR>
<textarea rows="10" name="answer" cols="55"><?=$answer?></textarea>
	
	
	<BR>
	<input type="submit" value="送出" ></p>
</form>

</body>

</html>
