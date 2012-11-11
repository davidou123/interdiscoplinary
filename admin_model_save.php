<?php
require_once("SQLconnection.php");
	$name	= htmlspecialchars($_POST["name"]); 
	$intro	= ($_POST["intro"]);
	$text		= ($_POST["text"]);


	$sql = "UPDATE inter SET intro='".$intro."',text='".$text."' where name='".$name."'";
	  // 建立MySQL資料庫連結
    $link = create_connection();
	// 執行SQL指令
      mysql_query($sql);
      mysql_close($link);

	  
	  ?>
	  
更新成功!
請選擇左邊選單，繼續編輯