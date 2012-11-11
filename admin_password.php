<?php
	$old					= htmlspecialchars($_POST["old"]); 
	$new_password	= htmlspecialchars($_POST["new_password"]);
	$new_password2	= htmlspecialchars($_POST["new_password2"]);
	
if($old){
 require_once("SQLconnection.php");
// 建立MySQL資料庫連結
    $link = create_connection();
$sql = "SELECT * FROM employee WHERE usrname='admin'";
$result = mysql_query($sql); // 執行SQL指令
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) {
    $old_password=$rows["password"];
     }
	 
if($old==$old_password &&$new_password==$new_password2 &$new_password!=""){
	$sql = "UPDATE employee SET password='".$new_password."' where usrname='admin'";
	  // 建立MySQL資料庫連結
    $link = create_connection();
	// 執行SQL指令
      mysql_query($sql);
      mysql_close($link);
	  $msg="更新完成，下次請用新密碼登入";
	  }else if ($new_password!=$new_password2){$msg="兩次新密碼不吻合，請再次輸入";}
	  else if ($old!=$old_password){$msg="舊密碼輸入錯誤";}
	  else if ($new_password!=""){$msg="密碼不得為空值";}
	  }
	  ?>
更改後台管理系統密碼<br><br><br>
<form method="POST" action="login.php?which=admin_password">
<b><font color="#FF0000"><?=$msg?></font></b>
<p><span class="pass">請輸入<b>舊</b>密碼 :</span><input type="password" name="old" size="20"></p>

<br>
<span class="pass">請輸入<b>新</b>密碼 :</span><input type="password" name="new_password" size="20"><br>
<br>
<span class="pass">再輸入一次新密碼 :</span><input type="password" name="new_password2" size="20"><br><br>
	<p><input type="submit" value=" 送 出 " name="B1"></p>
</form>
 