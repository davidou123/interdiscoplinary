			<form method="POST" action="index.php" name="qoo">
			<? if($_SESSION["login_session"] != true){?>
			<font color="#999999">帳號 ：</font><input type="text" name="usrname" size="14" value="請輸入帳號" class="input"	onfocus="if (this.value == '請輸入帳號') {this.value = '';}" onblur="if (this.value == '') {this.value = '請輸入帳號';}"  /><br>

				<font color="#999999">密碼 ：</font><input type="password" name="password" size="14"class="input">
<BR><input type="submit" value="送出" name="B1"><BR>
				<?}else{?>
				<font color="#999999">歡迎</font><b><?=$_SESSION["nickname"];?></b>登入系統
				<BR>
				<p align="center" style="margin-top:20px;">
								<a style="cursor: pointer;" onClick="location.href = 'login.php'">
				<img border="0" src="images/login2.gif" width="65" height="25"  alt="回到系統"></a>
								<a style="cursor: pointer;" onClick="location.href = 'loginout.php'">
				<img border="0" src="images/login3.gif" width="65" height="25"  alt="登出"></a></p><?}?>
</form>