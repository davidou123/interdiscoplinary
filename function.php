<?php
function count_page($page,$per)
{
		$link = create_connection();
		$sql = "select count(*) from news";  
		$result = mysql_query($sql); // 執行SQL指令
		$data1 = mysql_fetch_row($result); 

		$pages = ceil($data1[0]/$per); //總頁數
 
  if(!isset($page)){ 
    $page=1; //設定起始頁 
} else { 
    $page = intval($_GET["page"]); //確認頁數只能夠是數值資料 
    $page = ($page > 0) ? $page : 1; //確認頁數大於零 
    $page = ($pages > $page) ? $page : $pages; //確認使用者沒有輸入太神奇的數字 
}
  
  $start = ($page-1)*$per; //每頁起始資料序號
  $count_page[start]=$start;//每頁起始資料序號
  $count_page[pages]=$pages;//總頁數
return $count_page;
 } 
  function getip()
  {
                if (getenv("HTTP_CLIENT_IP"))
                $ip = getenv("HTTP_CLIENT_IP");
                else if(getenv("HTTP_X_FORWARDED_FOR"))
                $ip = getenv("HTTP_X_FORWARDED_FOR");
                else if(getenv("REMOTE_ADDR"))
                $ip = getenv("REMOTE_ADDR");
                else $ip = "Unknow";
				return $ip;
}


function counter()
{
	require_once("SQLconnection.php");
    $link = create_connection();
	$sql = "SELECT * FROM  system";   
	$result = mysql_query($sql); // 執行SQL指令	
	while ($rows = mysql_fetch_array($result, MYSQL_BOTH)) {
	$webconter= $rows['webconter'];
	$todaycounter= $rows['todaycounter'];
	$today= $rows['today'];
	}

if($webconter==""){
	$webconter="1";}
else{

if ($_SESSION["counter"] != true){
	$webconter++;
	$_SESSION["counter"] = true;
	}
}

if($today!=date("Y-m-d")){
	$today=date("Y-m-d");
	$todaycounter="1";
}else{

if ($_SESSION["todaycounter"] != true){
	$todaycounter++;
	$_SESSION["todaycounter"] = true;
	}
}
       // 建立SQL字串
	$sql = "UPDATE  system SET webconter='".$webconter."' ,today='".$today."' ,todaycounter='".$todaycounter."' WHERE ID='system'";
    $link = create_connection();
      mysql_query($sql);
	  $counter_arr[0]=$webconter;
	  $counter_arr[1]=$todaycounter;	  
	  return $counter_arr;
	  }

function check_input($input)//限定input 長度200
	{
	$output =substr( strip_tags(addslashes(trim($input))),0,200);
	return $output;
	}



?>
