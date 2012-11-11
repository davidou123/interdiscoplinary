<?
session_start();  // 啟動Session
 ob_start(); 

 require_once("function.php");

  ?>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> 
<style type="text/css"> 

ul, li {
	margin: 0;
	padding: 0;
	list-style: none;
}

#qaContent {
margin-left:50px;
	width: 500px;
}

#qaContent h3 {
	width: 500px;
	height: 22px;
	text-indent: -9999px;
}

#qaContent h3.qa_group_1 {
	background: url(images/qa_group_1.png) no-repeat;
}

#qaContent h3.qa_group_2 {
	background: url(images/qa_group_2.png) no-repeat;
}

#qaContent ul.accordionPart {
	margin: 10px 10px 50px 30px;
}

#qaContent ul.accordionPart li {
	border-bottom: solid 1px #e3e3e3;
	padding-bottom: 12px;
	margin-top: 12px;
}

#qaContent ul.accordionPart li .qa_title {
	background: url(images/icon_q_a.gif) no-repeat 0px 3px;
	padding-left: 28px;
	color: #1186ec;
	cursor: pointer;TEXT-ALIGN: left;
}

#qaContent ul.accordionPart li .qa_title_on {
	text-decoration: underline;
}

#qaContent ul.accordionPart li .qa_content {
	margin: 6px 0 0;
	background: url(images/icon_q_a.gif) no-repeat 0px -24px;
	padding-left: 28px;
	color: #666;
}
</style> 

<script type="text/javascript"> 
	$(function(){
		// 幫 div.qa_title 加上 hover 及 click 事件
		// 同時把兄弟元素 div.qa_content 隱藏起來
		$('#qaContent ul.accordionPart li div.qa_title').hover(function(){
			$(this).addClass('qa_title_on');
		}, function(){
			$(this).removeClass('qa_title_on');
		}).click(function(){
			// 當點到標題時，若答案是隱藏時則顯示它；反之則隱藏
			$(this).next('div.qa_content').slideToggle();
		}).siblings('div.qa_content').hide();
	});
</script> 

			<BR>常見問題Q&A<BR>
			<a href='admin_qa_insert.php?semester=100&keepThis=true&TB_iframe=true&height=430&width=500' class='thickbox'>新增Q&A</a>
<div id="qaContent"> 
	<h3 class="qa_group_1">基本問題</h3> 
	<ul class="accordionPart"> 
	<?
	  	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  qa  where type='1' ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
       $question=$rows["question"];
       $answer=$rows["answer"];
	   	echo"	<li><div class='qa_title'>".$rows["question"]."<a  href='admin_qa_idf.php?id=".$rows["id"]." &keepThis=true&TB_iframe=true&height=520&width=500' class='thickbox' style='float:right'>修改</a></div> "
			."<div class='qa_content'>".$rows["answer"]."</div> 	</li> ";
	}
	
  }
  ?>
	</ul> 
	<h3 class="qa_group_2">學程修課問題</h3> 
	<ul class="accordionPart"> 
		<?
	  	require_once("SQLconnection.php");
	$link = create_connection();
	// 建立SQL指令字串
	$sql = "SELECT * FROM  qa  where type='2' ";
	$result = mysql_query($sql); // 執行SQL指令
	if (mysql_num_rows($result) != 0) 
	{
  while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) 
  {
	   	echo"	<li><div class='qa_title'>".$rows["question"]." <a  href='admin_qa_idf.php?id=".$rows["id"]." &keepThis=true&TB_iframe=true&height=520&width=500' class='thickbox' style='float:right'>修改</a></div> "
			."<div class='qa_content'>".$rows["answer"]."</div> 	</li> ";
	}
	
  }
  ?>

	</ul> 
	</div>

			
