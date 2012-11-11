<?php
date_default_timezone_set('Asia/Taipei');
  function create_connection()
  {
    $link = mysql_connect("localhost", "root", "0000")   //
      or die("無法建立資料連接<br><br>" . mysql_error());
	mysql_select_db("interdiscoplinary"); // 選資資料庫	
	mysql_query("SET NAMES 'utf8'");	//解決資料庫亂碼問題
    return $link;
  }
?>