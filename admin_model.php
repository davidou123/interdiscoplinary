 <?
 session_start();  // 啟動Session
 if ($_SESSION["login_session"] != true)
   header("Location:index.php");
   
 $edit =$_GET['edit'];
	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  inter  where name='$edit' ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
       $name=$rows["name"];
       $intro=$rows["intro"];
       $text=$rows["text"];
	}
	
  }
 ?>
 <!-- TinyMCE -->
<script type="text/javascript" src="js/tinymcec/jscripts/tiny_mce.js"></script>
<script type="text/javascript" src="js/tinymcec/tinymac.js"></script>
<!-- /TinyMCE -->

 <h3>修改完畢請按左上角儲存</h3>
<form method="POST" action="login.php?which=admin_model_save">
 <input name="name" type="hidden"  value="<?=$name?>"> 
 		<img border="0" src="images/<?=$edit?>.png" width="532" height="33" alt="">
		<img border="0" src="images/tem.png" width="171" height="123" align="left">
<BR><BR><p style="letter-spacing: 2pt;line-height: 150%;color:#333;font-size: 11pt;"class="introduction">   
<textarea rows="20" name="intro" cols="50"><?=$intro?></textarea><br></p>
剩餘介紹:<br>
	<p><textarea rows="100" name="text" cols="50"><?=$text?></textarea>
	
	<BR>
	<input type="submit" value="送出" name="B3"></p>
</form>