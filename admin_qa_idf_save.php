<?php
session_start();  // 啟動Session
 ob_start(); 
if ($_SESSION["login_session"] != true)
   header("Location:index.php");
require_once("SQLconnection.php");
	$id			= htmlspecialchars($_POST["id"]); 
	$type		= htmlspecialchars($_POST["type1"]);
	$question	= htmlspecialchars($_POST["question"]);
	$answer		= htmlspecialchars($_POST["answer"]);


	$sql = "UPDATE qa SET type='".$type."',question='".$question."',answer='".$answer."' where id='".$id."'";
	  // 建立MySQL資料庫連結
    $link = create_connection();
	// 執行SQL指令
      mysql_query($sql);
      mysql_close($link);
	  
	  
	  ?>
更新成功!
請按右上角關閉 或esc  離開畫面
	   