<?php
require_once("SQLconnection.php");
	$title			= htmlspecialchars($_POST["title"]);
	$content	= $_POST["content"];
	$id			= htmlspecialchars($_POST["id"]); 
	$content_person=$_SESSION["usrname"];
	$date		=date("Y-m-d");
	$sql = "UPDATE news SET title='".$title."',content='".$content."',date='".$date."',content_person='".$content_person."' where id='".$id."'";
	  // 建立MySQL資料庫連結
    $link = create_connection();
	// 執行SQL指令
      mysql_query($sql);
      mysql_close($link);
	  
	  
	  ?>
更新成功!
請按右上角關閉 或esc  離開畫面