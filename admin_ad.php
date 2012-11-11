
<a href='admin_ad_upload.php?&keepThis=true&TB_iframe=true&height=330&width=700' class='thickbox'>上 傳 圖 檔</a>
<BR><BR>目前的廣告圖有: <BR><BR>

<?php
if ($handle = opendir("./ad")) {
$i=1;
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
		$file=iconv("big5","utf-8",$file);
			echo"廣告 $i . <span style='float:right;margin-right:30px'><a href='admin_ad_delconfm.php?filename=$file'>刪除</a></span><BR><img src='ad/$file' width='720' height='180' alt='跨領域學程' title='跨領域學程'><BR><BR>";
			$i++;
        }
    }
    closedir($handle);
}
?>